<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAcceptEmergencyServicedRequest;
use App\Http\Requests\UpdateAcceptEmergencyServicedRequest;
use App\Repositories\AcceptEmergencyServicedRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class AcceptEmergencyServicedController extends AppBaseController
{
    /** @var  AcceptEmergencyServicedRepository */
    private $acceptEmergencyServicedRepository;

    public function __construct(AcceptEmergencyServicedRepository $acceptEmergencyServicedRepo)
    {
        $this->acceptEmergencyServicedRepository = $acceptEmergencyServicedRepo;
    }

    /**
     * Display a listing of the AcceptEmergencyServiced.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $acceptEmergencyServiceds = $this->acceptEmergencyServicedRepository->all();

        return view('accept_emergency_serviceds.index')
            ->with('acceptEmergencyServiceds', $acceptEmergencyServiceds);
    }

    /**
     * Show the form for creating a new AcceptEmergencyServiced.
     *
     * @return Response
     */
    public function create()
    {
        return view('accept_emergency_serviceds.create');
    }

    /**
     * Store a newly created AcceptEmergencyServiced in storage.
     *
     * @param CreateAcceptEmergencyServicedRequest $request
     *
     * @return Response
     */
    public function store(CreateAcceptEmergencyServicedRequest $request)
    {
        $input = $request->all();

        $acceptEmergencyServiced = $this->acceptEmergencyServicedRepository->create($input);

        Flash::success('Accept Emergency Serviced saved successfully.');

        return redirect(route('acceptEmergencyServiceds.index'));
    }

    /**
     * Display the specified AcceptEmergencyServiced.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $acceptEmergencyServiced = $this->acceptEmergencyServicedRepository->find($id);

        if (empty($acceptEmergencyServiced)) {
            Flash::error('Accept Emergency Serviced not found');

            return redirect(route('acceptEmergencyServiceds.index'));
        }

        return view('accept_emergency_serviceds.show')->with('acceptEmergencyServiced', $acceptEmergencyServiced);
    }

    /**
     * Show the form for editing the specified AcceptEmergencyServiced.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $acceptEmergencyServiced = $this->acceptEmergencyServicedRepository->find($id);

        if (empty($acceptEmergencyServiced)) {
            Flash::error('Accept Emergency Serviced not found');

            return redirect(route('acceptEmergencyServiceds.index'));
        }

        return view('accept_emergency_serviceds.edit')->with('acceptEmergencyServiced', $acceptEmergencyServiced);
    }

    /**
     * Update the specified AcceptEmergencyServiced in storage.
     *
     * @param int $id
     * @param UpdateAcceptEmergencyServicedRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAcceptEmergencyServicedRequest $request)
    {
        $acceptEmergencyServiced = $this->acceptEmergencyServicedRepository->find($id);

        if (empty($acceptEmergencyServiced)) {
            Flash::error('Accept Emergency Serviced not found');

            return redirect(route('acceptEmergencyServiceds.index'));
        }

        $acceptEmergencyServiced = $this->acceptEmergencyServicedRepository->update($request->all(), $id);

        Flash::success('Accept Emergency Serviced updated successfully.');

        return redirect(route('acceptEmergencyServiceds.index'));
    }

    /**
     * Remove the specified AcceptEmergencyServiced from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $acceptEmergencyServiced = $this->acceptEmergencyServicedRepository->find($id);

        if (empty($acceptEmergencyServiced)) {
            Flash::error('Accept Emergency Serviced not found');

            return redirect(route('acceptEmergencyServiceds.index'));
        }

        $this->acceptEmergencyServicedRepository->delete($id);

        Flash::success('Accept Emergency Serviced deleted successfully.');

        return redirect(route('acceptEmergencyServiceds.index'));
    }
}
