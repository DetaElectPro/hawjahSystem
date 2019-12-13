<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePharmacyAPIRequest;
use App\Http\Requests\API\UpdatePharmacyAPIRequest;
use App\Models\Pharmacy;
use App\Repositories\PharmacyRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class PharmacyController
 * @package App\Http\Controllers\API
 */

class PharmacyAPIController extends AppBaseController
{
    /** @var  PharmacyRepository */
    private $pharmacyRepository;

    public function __construct(PharmacyRepository $pharmacyRepo)
    {
        $this->pharmacyRepository = $pharmacyRepo;
    }

    /**
     * Display a listing of the Pharmacy.
     * GET|HEAD /pharmacies
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $pharmacies = $this->pharmacyRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($pharmacies->toArray(), 'Pharmacies retrieved successfully');
    }

    /**
     * Store a newly created Pharmacy in storage.
     * POST /pharmacies
     *
     * @param CreatePharmacyAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatePharmacyAPIRequest $request)
    {
        $input = $request->all();

        $pharmacy = $this->pharmacyRepository->createApi($input);

        return $this->sendResponse($pharmacy->toArray(), 'Pharmacy saved successfully');
    }

    /**
     * Display the specified Pharmacy.
     * GET|HEAD /pharmacies/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Pharmacy $pharmacy */
        $pharmacy = $this->pharmacyRepository->find($id);

        if (empty($pharmacy)) {
            return $this->sendError('Pharmacy not found');
        }

        return $this->sendResponse($pharmacy->toArray(), 'Pharmacy retrieved successfully');
    }

    /**
     * Update the specified Pharmacy in storage.
     * PUT/PATCH /pharmacies/{id}
     *
     * @param int $id
     * @param UpdatePharmacyAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePharmacyAPIRequest $request)
    {
        $input = $request->all();

        /** @var Pharmacy $pharmacy */
        $pharmacy = $this->pharmacyRepository->find($id);

        if (empty($pharmacy)) {
            return $this->sendError('Pharmacy not found');
        }

        $pharmacy = $this->pharmacyRepository->update($input, $id);

        return $this->sendResponse($pharmacy->toArray(), 'Pharmacy updated successfully');
    }

    /**
     * Remove the specified Pharmacy from storage.
     * DELETE /pharmacies/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Pharmacy $pharmacy */
        $pharmacy = $this->pharmacyRepository->find($id);

        if (empty($pharmacy)) {
            return $this->sendError('Pharmacy not found');
        }

        $pharmacy->delete();

        return $this->sendResponse($id, 'Pharmacy deleted successfully');
    }
}
