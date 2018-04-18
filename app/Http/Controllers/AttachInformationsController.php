<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAttachInformationsRequest;
use App\Http\Requests\UpdateAttachInformationsRequest;
use App\Repositories\AttachInformationsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

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
        $attachInformations = $this->attachInformationsRepository->all();

        return view('attach_informations.index')
            ->with('attachInformations', $attachInformations);
    }

    /**
     * Show the form for creating a new AttachInformations.
     *
     * @return Response
     */
    public function create()
    {
        return view('attach_informations.create');
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

        $attachInformations = $this->attachInformationsRepository->create($input);

        Flash::success('Attach Informations saved successfully.');

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

        if (empty($attachInformations)) {
            Flash::error('Attach Informations not found');

            return redirect(route('attachInformations.index'));
        }

        return view('attach_informations.edit')->with('attachInformations', $attachInformations);
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

        $attachInformations = $this->attachInformationsRepository->update($request->all(), $id);

        Flash::success('Attach Informations updated successfully.');

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

        Flash::success('Attach Informations deleted successfully.');

        return redirect(route('attachInformations.index'));
    }
}
