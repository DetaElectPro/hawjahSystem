<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAmbulanceRequest;
use App\Http\Requests\UpdateAmbulanceRequest;
use App\Repositories\AmbulanceRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class AmbulanceController extends AppBaseController
{
    /** @var  AmbulanceRepository */
    private $ambulanceRepository;

    public function __construct(AmbulanceRepository $ambulanceRepo)
    {
        $this->ambulanceRepository = $ambulanceRepo;
    }

    /**
     * Display a listing of the Ambulance.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $ambulances = $this->ambulanceRepository->all();

        return view('ambulances.index')
            ->with('ambulances', $ambulances);
    }

    /**
     * Show the form for creating a new Ambulance.
     *
     * @return Response
     */
    public function create()
    {
        return view('ambulances.create');
    }

    /**
     * Store a newly created Ambulance in storage.
     *
     * @param CreateAmbulanceRequest $request
     *
     * @return Response
     */
    public function store(CreateAmbulanceRequest $request)
    {
        $input = $request->all();

        $ambulance = $this->ambulanceRepository->create($input);

        Flash::success('Ambulance saved successfully.');

        return redirect(route('ambulances.index'));
    }

    /**
     * Display the specified Ambulance.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $ambulance = $this->ambulanceRepository->find($id);

        if (empty($ambulance)) {
            Flash::error('Ambulance not found');

            return redirect(route('ambulances.index'));
        }

        return view('ambulances.show')->with('ambulance', $ambulance);
    }

    /**
     * Show the form for editing the specified Ambulance.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $ambulance = $this->ambulanceRepository->find($id);

        if (empty($ambulance)) {
            Flash::error('Ambulance not found');

            return redirect(route('ambulances.index'));
        }

        return view('ambulances.edit')->with('ambulance', $ambulance);
    }

    /**
     * Update the specified Ambulance in storage.
     *
     * @param int $id
     * @param UpdateAmbulanceRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAmbulanceRequest $request)
    {
        $ambulance = $this->ambulanceRepository->find($id);

        if (empty($ambulance)) {
            Flash::error('Ambulance not found');

            return redirect(route('ambulances.index'));
        }

        $ambulance = $this->ambulanceRepository->update($request->all(), $id);

        Flash::success('Ambulance updated successfully.');

        return redirect(route('ambulances.index'));
    }

    /**
     * Remove the specified Ambulance from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $ambulance = $this->ambulanceRepository->find($id);

        if (empty($ambulance)) {
            Flash::error('Ambulance not found');

            return redirect(route('ambulances.index'));
        }

        $this->ambulanceRepository->delete($id);

        Flash::success('Ambulance deleted successfully.');

        return redirect(route('ambulances.index'));
    }
}
