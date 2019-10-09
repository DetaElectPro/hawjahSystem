<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateAcceptEmergencyServicedAPIRequest;
use App\Http\Requests\API\UpdateAcceptEmergencyServicedAPIRequest;
use App\Models\AcceptEmergencyServiced;
use App\Repositories\AcceptEmergencyServicedRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class AcceptEmergencyServicedController
 * @package App\Http\Controllers\API
 */

class AcceptEmergencyServicedAPIController extends AppBaseController
{
    /** @var  AcceptEmergencyServicedRepository */
    private $acceptEmergencyServicedRepository;

    public function __construct(AcceptEmergencyServicedRepository $acceptEmergencyServicedRepo)
    {
        $this->acceptEmergencyServicedRepository = $acceptEmergencyServicedRepo;
    }

    /**
     * Display a listing of the AcceptEmergencyServiced.
     * GET|HEAD /acceptEmergencyServiceds
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $acceptEmergencyServiceds = $this->acceptEmergencyServicedRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($acceptEmergencyServiceds->toArray(), 'Accept Emergency Serviceds retrieved successfully');
    }

    /**
     * Store a newly created AcceptEmergencyServiced in storage.
     * POST /acceptEmergencyServiceds
     *
     * @param CreateAcceptEmergencyServicedAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateAcceptEmergencyServicedAPIRequest $request)
    {
        $input = $request->all();

        $acceptEmergencyServiced = $this->acceptEmergencyServicedRepository->create($input);

        return $this->sendResponse($acceptEmergencyServiced->toArray(), 'Accept Emergency Serviced saved successfully');
    }

    /**
     * Display the specified AcceptEmergencyServiced.
     * GET|HEAD /acceptEmergencyServiceds/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var AcceptEmergencyServiced $acceptEmergencyServiced */
        $acceptEmergencyServiced = $this->acceptEmergencyServicedRepository->find($id);

        if (empty($acceptEmergencyServiced)) {
            return $this->sendError('Accept Emergency Serviced not found');
        }

        return $this->sendResponse($acceptEmergencyServiced->toArray(), 'Accept Emergency Serviced retrieved successfully');
    }

    /**
     * Update the specified AcceptEmergencyServiced in storage.
     * PUT/PATCH /acceptEmergencyServiceds/{id}
     *
     * @param int $id
     * @param UpdateAcceptEmergencyServicedAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAcceptEmergencyServicedAPIRequest $request)
    {
        $input = $request->all();

        /** @var AcceptEmergencyServiced $acceptEmergencyServiced */
        $acceptEmergencyServiced = $this->acceptEmergencyServicedRepository->find($id);

        if (empty($acceptEmergencyServiced)) {
            return $this->sendError('Accept Emergency Serviced not found');
        }

        $acceptEmergencyServiced = $this->acceptEmergencyServicedRepository->update($input, $id);

        return $this->sendResponse($acceptEmergencyServiced->toArray(), 'AcceptEmergencyServiced updated successfully');
    }

    /**
     * Remove the specified AcceptEmergencyServiced from storage.
     * DELETE /acceptEmergencyServiceds/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var AcceptEmergencyServiced $acceptEmergencyServiced */
        $acceptEmergencyServiced = $this->acceptEmergencyServicedRepository->find($id);

        if (empty($acceptEmergencyServiced)) {
            return $this->sendError('Accept Emergency Serviced not found');
        }

        $acceptEmergencyServiced->delete();

        return $this->sendResponse($id, 'Accept Emergency Serviced deleted successfully');
    }
}
