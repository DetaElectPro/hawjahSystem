<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEmergencyServicedRequest;
use App\Http\Requests\UpdateEmergencyServicedRequest;
use App\Repositories\EmergencyServicedRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class EmergencyServicedController extends AppBaseController
{
    /** @var  EmergencyServicedRepository */
    private $emergencyServicedRepository;

    public function __construct(EmergencyServicedRepository $emergencyServicedRepo)
    {
        $this->emergencyServicedRepository = $emergencyServicedRepo;
    }

    /**
     * Display a listing of the EmergencyServiced.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $emergencyServiceds = $this->emergencyServicedRepository->all();

        return view('emergency_serviceds.index')
            ->with('emergencyServiceds', $emergencyServiceds);
    }

    /**
     * Show the form for creating a new EmergencyServiced.
     *
     * @return Response
     */
    public function create()
    {
        return view('emergency_serviceds.create');
    }

    /**
     * Store a newly created EmergencyServiced in storage.
     *
     * @param CreateEmergencyServicedRequest $request
     *
     * @return Response
     */
    public function store(CreateEmergencyServicedRequest $request)
    {
        $input = $request->all();

        $emergencyServiced = $this->emergencyServicedRepository->create($input);

        Flash::success('Emergency Serviced saved successfully.');

        return redirect(route('emergencyServiceds.index'));
    }

    /**
     * Display the specified EmergencyServiced.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $emergencyServiced = $this->emergencyServicedRepository->find($id);

        if (empty($emergencyServiced)) {
            Flash::error('Emergency Serviced not found');

            return redirect(route('emergencyServiceds.index'));
        }

        return view('emergency_serviceds.show')->with('emergencyServiced', $emergencyServiced);
    }

    /**
     * Show the form for editing the specified EmergencyServiced.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $emergencyServiced = $this->emergencyServicedRepository->find($id);

        if (empty($emergencyServiced)) {
            Flash::error('Emergency Serviced not found');

            return redirect(route('emergencyServiceds.index'));
        }

        return view('emergency_serviceds.edit')->with('emergencyServiced', $emergencyServiced);
    }

    /**
     * Update the specified EmergencyServiced in storage.
     *
     * @param int $id
     * @param UpdateEmergencyServicedRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEmergencyServicedRequest $request)
    {
        $emergencyServiced = $this->emergencyServicedRepository->find($id);

        if (empty($emergencyServiced)) {
            Flash::error('Emergency Serviced not found');

            return redirect(route('emergencyServiceds.index'));
        }

        $emergencyServiced = $this->emergencyServicedRepository->update($request->all(), $id);

        Flash::success('Emergency Serviced updated successfully.');

        return redirect(route('emergencyServiceds.index'));
    }

    /**
     * Remove the specified EmergencyServiced from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $emergencyServiced = $this->emergencyServicedRepository->find($id);

        if (empty($emergencyServiced)) {
            Flash::error('Emergency Serviced not found');

            return redirect(route('emergencyServiceds.index'));
        }

        $this->emergencyServicedRepository->delete($id);

        Flash::success('Emergency Serviced deleted successfully.');

        return redirect(route('emergencyServiceds.index'));
    }
}
