<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CreateInformationsRequest;
use App\Http\Requests\UpdateInformationsRequest;
use App\Repositories\InformationsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class InformationsController extends AppBaseController
{
    /** @var  InformationsRepository */
    private $informationsRepository;

    public function __construct(InformationsRepository $informationsRepo)
    {
        $this->informationsRepository = $informationsRepo;
    }

    /**
     * Display a listing of the Informations.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->informationsRepository->pushCriteria(new RequestCriteria($request));

        $input=$request->all();

        $tools=$this->varifyTools($input);

        //默认的数值
        $informations = $this->defaultSearchState($this->informationsRepository->model());

        //如果我的选项中带有题目的参数 就模糊查询
        if(array_key_exists('title',$input) && !empty($input['title'])){
             $informations= $informations->where('title','like','%'.$input['title'].'%');
        }

        if(array_key_exists('type',$input) && !empty($input['type']) || array_key_exists('type',$input) && $input['type'] == '0'){
             $informations= $informations->where('type',$input['type']);
        }


        $informations=$this->descAndPaginateToShow($informations);

        return view('informations.index')
                ->with('informations', $informations)
                ->with('input',$input)
                ->with('tools',$tools);
    }

    /**
     * Show the form for creating a new Informations.
     *
     * @return Response
     */
    public function create()
    {
        return view('informations.create');
    }

    /**
     * Store a newly created Informations in storage.
     *
     * @param CreateInformationsRequest $request
     *
     * @return Response
     */
    public function store(CreateInformationsRequest $request)
    {
        $input = $request->all();

        $informations = $this->informationsRepository->create($input);

        Flash::success('Informations saved successfully.');

        return redirect(route('informations.index'));
    }

    /**
     * Display the specified Informations.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $informations = $this->informationsRepository->findWithoutFail($id);

        if (empty($informations)) {
            Flash::error('Informations not found');

            return redirect(route('informations.index'));
        }

        return view('informations.show')->with('informations', $informations);
    }

    /**
     * Show the form for editing the specified Informations.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $informations = $this->informationsRepository->findWithoutFail($id);

        if (empty($informations)) {
            Flash::error('Informations not found');

            return redirect(route('informations.index'));
        }

        return view('informations.edit')->with('informations', $informations);
    }

    /**
     * Update the specified Informations in storage.
     *
     * @param  int              $id
     * @param UpdateInformationsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateInformationsRequest $request)
    {
        $informations = $this->informationsRepository->findWithoutFail($id);

        if (empty($informations)) {
            Flash::error('Informations not found');

            return redirect(route('informations.index'));
        }

        $informations = $this->informationsRepository->update($request->all(), $id);

        Flash::success('Informations updated successfully.');

        return redirect(route('informations.index'));
    }

    /**
     * Remove the specified Informations from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $informations = $this->informationsRepository->findWithoutFail($id);

        if (empty($informations)) {
            Flash::error('Informations not found');

            return redirect(route('informations.index'));
        }

        $this->informationsRepository->delete($id);

        Flash::success('Informations deleted successfully.');

        return redirect(route('informations.index'));
    }
}
