<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateMedicalFieldAPIRequest;
use App\Http\Requests\API\UpdateMedicalFieldAPIRequest;
use App\Models\MedicalField;
use App\Repositories\MedicalFieldRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class MedicalFieldController
 * @package App\Http\Controllers\API
 */

class MedicalFieldAPIController extends AppBaseController
{
    /** @var  MedicalFieldRepository */
    private $medicalFieldRepository;

    public function __construct(MedicalFieldRepository $medicalFieldRepo)
    {
        $this->medicalFieldRepository = $medicalFieldRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/medicalFields",
     *      summary="Get a listing of the MedicalFields.",
     *      tags={"MedicalField"},
     *      description="Get all MedicalFields",
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
     *                  @SWG\Items(ref="#/definitions/MedicalField")
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
        $medicalFields = $this->medicalFieldRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );
        $medicalFields = $this->medicalFieldRepository->with('medical');

        return $this->sendResponse($medicalFields->toArray(), 'Medical Fields retrieved successfully');
    }

    /**
     * @param CreateMedicalFieldAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/medicalFields",
     *      summary="Store a newly created MedicalField in storage",
     *      tags={"MedicalField"},
     *      description="Store MedicalField",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="MedicalField that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/MedicalField")
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
     *                  ref="#/definitions/MedicalField"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateMedicalFieldAPIRequest $request)
    {
        $input = $request->all();

        $medicalField = $this->medicalFieldRepository->create($input);

        return $this->sendResponse($medicalField->toArray(), 'Medical Field saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/medicalFields/{id}",
     *      summary="Display the specified MedicalField",
     *      tags={"MedicalField"},
     *      description="Get MedicalField",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of MedicalField",
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
     *                  ref="#/definitions/MedicalField"
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
        /** @var MedicalField $medicalField */
        $medicalField = $this->medicalFieldRepository->find($id);

        if (empty($medicalField)) {
            return $this->sendError('Medical Field not found');
        }

        return $this->sendResponse($medicalField->toArray(), 'Medical Field retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateMedicalFieldAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/medicalFields/{id}",
     *      summary="Update the specified MedicalField in storage",
     *      tags={"MedicalField"},
     *      description="Update MedicalField",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of MedicalField",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="MedicalField that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/MedicalField")
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
     *                  ref="#/definitions/MedicalField"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateMedicalFieldAPIRequest $request)
    {
        $input = $request->all();

        /** @var MedicalField $medicalField */
        $medicalField = $this->medicalFieldRepository->find($id);

        if (empty($medicalField)) {
            return $this->sendError('Medical Field not found');
        }

        $medicalField = $this->medicalFieldRepository->update($input, $id);

        return $this->sendResponse($medicalField->toArray(), 'MedicalField updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/medicalFields/{id}",
     *      summary="Remove the specified MedicalField from storage",
     *      tags={"MedicalField"},
     *      description="Delete MedicalField",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of MedicalField",
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
        /** @var MedicalField $medicalField */
        $medicalField = $this->medicalFieldRepository->find($id);

        if (empty($medicalField)) {
            return $this->sendError('Medical Field not found');
        }

        $medicalField->delete();

        return $this->sendResponse($id, 'Medical Field deleted successfully');
    }
}
