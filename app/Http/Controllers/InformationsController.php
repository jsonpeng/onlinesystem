<?php

namespace App\Http\Controllers;

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
        $informations = $this->informationsRepository->all();

        return view('informations.index')
            ->with('informations', $informations);
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
