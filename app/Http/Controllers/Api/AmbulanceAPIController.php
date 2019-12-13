<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateAmbulanceAPIRequest;
use App\Http\Requests\API\UpdateAmbulanceAPIRequest;
use App\Models\Ambulance;
use App\Repositories\AmbulanceRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class AmbulanceController
 * @package App\Http\Controllers\API
 */

class AmbulanceAPIController extends AppBaseController
{
    /** @var  AmbulanceRepository */
    private $ambulanceRepository;

    public function __construct(AmbulanceRepository $ambulanceRepo)
    {
        $this->ambulanceRepository = $ambulanceRepo;
    }

    /**
     * Display a listing of the Ambulance.
     * GET|HEAD /ambulances
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $ambulances = $this->ambulanceRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($ambulances->toArray(), 'Ambulances retrieved successfully');
    }

    /**
     * Store a newly created Ambulance in storage.
     * POST /ambulances
     *
     * @param CreateAmbulanceAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateAmbulanceAPIRequest $request)
    {
        $input = $request->all();

        $ambulance = $this->ambulanceRepository->createApi($input);

        return $this->sendResponse($ambulance->toArray(), 'Ambulance saved successfully');
    }

    /**
     * Display the specified Ambulance.
     * GET|HEAD /ambulances/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Ambulance $ambulance */
        $ambulance = $this->ambulanceRepository->find($id);

        if (empty($ambulance)) {
            return $this->sendError('Ambulance not found');
        }

        return $this->sendResponse($ambulance->toArray(), 'Ambulance retrieved successfully');
    }

    /**
     * Update the specified Ambulance in storage.
     * PUT/PATCH /ambulances/{id}
     *
     * @param int $id
     * @param UpdateAmbulanceAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAmbulanceAPIRequest $request)
    {
        $input = $request->all();

        /** @var Ambulance $ambulance */
        $ambulance = $this->ambulanceRepository->find($id);

        if (empty($ambulance)) {
            return $this->sendError('Ambulance not found');
        }

        $ambulance = $this->ambulanceRepository->update($input, $id);

        return $this->sendResponse($ambulance->toArray(), 'Ambulance updated successfully');
    }

    /**
     * Remove the specified Ambulance from storage.
     * DELETE /ambulances/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Ambulance $ambulance */
        $ambulance = $this->ambulanceRepository->find($id);

        if (empty($ambulance)) {
            return $this->sendError('Ambulance not found');
        }

        $ambulance->delete();

        return $this->sendSuccess('Ambulance deleted successfully');
    }
}
