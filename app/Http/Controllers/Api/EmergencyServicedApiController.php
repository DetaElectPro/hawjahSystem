<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateEmergencyServicesAPIRequest;
use App\Models\EmergencyServices;
use App\Repositories\EmergencyServiceRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class EmergencyServicedApiController
 * @package App\Http\Controllers\API
 */
class EmergencyServicedApiController extends AppBaseController
{
    /** @var  EmergencyServiceRepository */
    private $emergencyServiceRepository;

    public function __construct(EmergencyServiceRepository $emergencyServiceRepo)
    {
        $this->emergencyServiceRepository = $emergencyServiceRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/emergencyServices",
     *      summary="Get a listing of the EmergencyServices.",
     *      tags={"EmergencyServices"},
     *      description="Get all emergencyServices",
     *      produces={"application/json"},
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="array",
     *                  @SWG\Items(ref="#/definitions/EmergencyServices")
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function index(Request $request)
    {
        $emergencyServices = $this->emergencyServiceRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($emergencyServices->toArray(), 'Emergency Services retrieved successfully');
    }

    /**
     * @param CreateEmergencyServicesAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/emergencyServices",
     *      summary="Store a newly created EmergencyServices in storage",
     *      tags={"EmergencyServices"},
     *      description="Store EmergencyServices",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="EmergencyServices that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/EmergencyServices")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/EmergencyServices"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateEmergencyServicesAPIRequest $request)
    {
        $input = $request->all();

        $EmergencyServices = $this->emergencyServiceRepository->create($input);

        return $this->sendResponse($EmergencyServices->toArray(), 'Emergency Services saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/emergencyServices/{id}",
     *      summary="Display the specified EmergencyServices",
     *      tags={"EmergencyServices"},
     *      description="Get EmergencyServices",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of EmergencyServices",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/EmergencyServices"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function show($id)
    {
        /** @var EmergencyServices $EmergencyServices */
        $EmergencyServices = $this->emergencyServiceRepository->find($id);

        if (empty($EmergencyServices)) {
            return $this->sendError('Emergency Services not found');
        }

        return $this->sendResponse($EmergencyServices->toArray(), 'Emergency Services retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateEmergencyServicesAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/emergencyServices/{id}",
     *      summary="Update the specified EmergencyServices in storage",
     *      tags={"EmergencyServices"},
     *      description="Update EmergencyServices",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of EmergencyServices",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="EmergencyServices that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/EmergencyServices")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/EmergencyServices"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateEmergencyServicesAPIRequest $request)
    {
        $input = $request->all();

        /** @var EmergencyServices $EmergencyServices */
        $emergencyServices = $this->emergencyServiceRepository->find($id);

        if (empty($emergencyServices)) {
            return $this->sendError('Emergency Services not found');
        }

        $emergencyServices = $this->emergencyServiceRepository->update($input, $id);

        return $this->sendResponse($emergencyServices->toArray(), 'Emergency Services updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @throws \Exception
     * @SWG\Delete(
     *      path="/emergencyServices/{id}",
     *      summary="Remove the specified EmergencyServices from storage",
     *      tags={"EmergencyServices"},
     *      description="Delete EmergencyServices",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of EmergencyServices",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="string"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function destroy($id)
    {
        /** @var EmergencyServices $EmergencyServices */
        $emergencyServices = $this->emergencyServiceRepository->find($id);

        if (empty($emergencyServices)) {
            return $this->sendError('Emergency Services not found');
        }

        $emergencyServices->delete();

        return $this->sendResponse($id, 'Emergency Services deleted successfully');
    }
}
