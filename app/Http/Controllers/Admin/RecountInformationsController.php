<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CreateRecountInformationsRequest;
use App\Http\Requests\UpdateRecountInformationsRequest;
use App\Repositories\RecountInformationsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class RecountInformationsController extends AppBaseController
{
    /** @var  RecountInformationsRepository */
    private $recountInformationsRepository;

    public function __construct(RecountInformationsRepository $recountInformationsRepo)
    {
        $this->recountInformationsRepository = $recountInformationsRepo;
    }

    /**
     * Display a listing of the RecountInformations.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->recountInformationsRepository->pushCriteria(new RequestCriteria($request));
        
        $input=$request->all();

        $tools=$this->varifyTools($input);

        //默认的数值
        $recountInformations = $this->defaultSearchState($this->recountInformationsRepository->model());

        $recountInformations=$this->descAndPaginateToShow($recountInformations);

        return view('recount_informations.index')
            ->with('recountInformations', $recountInformations)
            ->with('tools',$tools)
            ->with('input',$input);
    }

    /**
     * Show the form for creating a new RecountInformations.
     *
     * @return Response
     */
    public function create()
    {
        return view('recount_informations.create');
    }

    /**
     * Store a newly created RecountInformations in storage.
     *
     * @param CreateRecountInformationsRequest $request
     *
     * @return Response
     */
    public function store(CreateRecountInformationsRequest $request)
    {
        $input = $request->all();

        $recountInformations = $this->recountInformationsRepository->create($input);

        Flash::success('Recount Informations saved successfully.');

        return redirect(route('recountInformations.index'));
    }

    /**
     * Display the specified RecountInformations.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $recountInformations = $this->recountInformationsRepository->findWithoutFail($id);

        if (empty($recountInformations)) {
            Flash::error('Recount Informations not found');

            return redirect(route('recountInformations.index'));
        }

        return view('recount_informations.show')->with('recountInformations', $recountInformations);
    }

    /**
     * Show the form for editing the specified RecountInformations.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $recountInformations = $this->recountInformationsRepository->findWithoutFail($id);

        if (empty($recountInformations)) {
            Flash::error('Recount Informations not found');

            return redirect(route('recountInformations.index'));
        }

        return view('recount_informations.edit')->with('recountInformations', $recountInformations);
    }

    /**
     * Update the specified RecountInformations in storage.
     *
     * @param  int              $id
     * @param UpdateRecountInformationsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRecountInformationsRequest $request)
    {
        $recountInformations = $this->recountInformationsRepository->findWithoutFail($id);

        if (empty($recountInformations)) {
            Flash::error('Recount Informations not found');

            return redirect(route('recountInformations.index'));
        }

        $recountInformations = $this->recountInformationsRepository->update($request->all(), $id);

        Flash::success('Recount Informations updated successfully.');

        return redirect(route('recountInformations.index'));
    }

    /**
     * Remove the specified RecountInformations from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $recountInformations = $this->recountInformationsRepository->findWithoutFail($id);

        if (empty($recountInformations)) {
            Flash::error('Recount Informations not found');

            return redirect(route('recountInformations.index'));
        }

        $this->recountInformationsRepository->delete($id);

        Flash::success('Recount Informations deleted successfully.');

        return redirect(route('recountInformations.index'));
    }
}
