<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CreateAttachInformationsRequest;
use App\Http\Requests\UpdateAttachInformationsRequest;
use App\Repositories\AttachInformationsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Config;


class AttachInformationsController extends AppBaseController
{
    /** @var  AttachInformationsRepository */
    private $attachInformationsRepository;

    public function __construct(AttachInformationsRepository $attachInformationsRepo)
    {
        $this->attachInformationsRepository = $attachInformationsRepo;
    }

    /**
     * Display a listing of the AttachInformations.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->attachInformationsRepository->pushCriteria(new RequestCriteria($request));

        $input=$request->all();

        $tools=$this->varifyTools($input);

        //默认的数值
        $attachInformations = $this->defaultSearchState($this->attachInformationsRepository->model());

        if(array_key_exists('type',$input) && !empty($input['type']) || array_key_exists('type',$input) && $input['type'] == '0'){
             $attachInformations= $attachInformations->where('type',$input['type']);
        }

        //如果我的选项中带有题目的参数 就模糊查询
        if(array_key_exists('content',$input) && !empty($input['content'])){
             $attachInformations= $attachInformations->where('content','like','%'.$input['content'].'%');
        }

        //查题目
        if(array_key_exists('info_id',$input) && !empty($input['info_id']) || array_key_exists('info_id',$input) && $input['info_id'] == '0'){
             $attachInformations= $attachInformations->where('info_id',$input['info_id']);
        }
        //把ABCD的顺序带上去
        $attachInformations=$attachInformations->orderBy('num','asc');
        //题目
        $infos=app('info')->all();
        //选项
        $select=Config::get('select');

        $attachInformations=$this->descAndPaginateToShow($attachInformations);


        return view('attach_informations.index')
                ->with('attachInformations', $attachInformations)
                ->with('infos',$infos)
                ->with('input',$input)
                ->with('tools',$tools)
                ->with('select',$select);
    }

    /**
     * Show the form for creating a new AttachInformations.
     *
     * @return Response
     */
    public function create()
    {
        //选项
        $select=Config::get('select');
        //题目
        $infos=\App\Models\Informations::all();
        //dd($select);
        return view('attach_informations.create')
                ->with('select',$select)
                ->with('infos',$infos);
    }

    /**
     * Store a newly created AttachInformations in storage.
     *
     * @param CreateAttachInformationsRequest $request
     *
     * @return Response
     */
    public function store(CreateAttachInformationsRequest $request)
    {
        $input = $request->all();

        $input['num']=varifySelectTOSetNum($input['type']);

        $attachInformations = $this->attachInformationsRepository->create($input);


        Flash::success('保存成功');

        return redirect(route('attachInformations.index'));
    }

    /**
     * Display the specified AttachInformations.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $attachInformations = $this->attachInformationsRepository->findWithoutFail($id);

        if (empty($attachInformations)) {
            Flash::error('Attach Informations not found');

            return redirect(route('attachInformations.index'));
        }

        return view('attach_informations.show')->with('attachInformations', $attachInformations);
    }

    /**
     * Show the form for editing the specified AttachInformations.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $attachInformations = $this->attachInformationsRepository->findWithoutFail($id);
        //选项
        $select=Config::get('select');
        //题目
        $infos=\App\Models\Informations::all();

        if (empty($attachInformations)) {
            Flash::error('Attach Informations not found');

            return redirect(route('attachInformations.index'));
        }

        return view('attach_informations.edit')
                ->with('attachInformations', $attachInformations)
                ->with('select',$select)
                ->with('infos',$infos);
    }

    /**
     * Update the specified AttachInformations in storage.
     *
     * @param  int              $id
     * @param UpdateAttachInformationsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAttachInformationsRequest $request)
    {
        $attachInformations = $this->attachInformationsRepository->findWithoutFail($id);

        if (empty($attachInformations)) {
            Flash::error('Attach Informations not found');

            return redirect(route('attachInformations.index'));
        }
        $input=$request->all();
        $input['num']=varifySelectTOSetNum($input['type']);
        $attachInformations = $this->attachInformationsRepository->update($input, $id);

        Flash::success('保存成功');

        return redirect(route('attachInformations.index'));
    }

    /**
     * Remove the specified AttachInformations from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $attachInformations = $this->attachInformationsRepository->findWithoutFail($id);

        if (empty($attachInformations)) {
            Flash::error('Attach Informations not found');

            return redirect(route('attachInformations.index'));
        }

        $this->attachInformationsRepository->delete($id);

        Flash::success('删除成功');

        return redirect(route('attachInformations.index'));
    }
}
