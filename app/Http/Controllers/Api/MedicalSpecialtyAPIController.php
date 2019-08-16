<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateMedicalSpecialtyAPIRequest;
use App\Http\Requests\API\UpdateMedicalSpecialtyAPIRequest;
use App\Models\MedicalSpecialty;
use App\Repositories\MedicalSpecialtyRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class MedicalSpecialtyController
 * @package App\Http\Controllers\API
 */

class MedicalSpecialtyAPIController extends AppBaseController
{
    /** @var  MedicalSpecialtyRepository */
    private $medicalSpecialtyRepository;

    public function __construct(MedicalSpecialtyRepository $medicalSpecialtyRepo)
    {
        $this->medicalSpecialtyRepository = $medicalSpecialtyRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/medicalSpecialties",
     *      summary="Get a listing of the MedicalSpecialties.",
     *      tags={"MedicalSpecialty"},
     *      description="Get all MedicalSpecialties",
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
     *                  @SWG\Items(ref="#/definitions/MedicalSpecialty")
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
        $medicalSpecialties = $this->medicalSpecialtyRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($medicalSpecialties->toArray(), 'Medical Specialties retrieved successfully');
    }

    /**
     * @param CreateMedicalSpecialtyAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/medicalSpecialties",
     *      summary="Store a newly created MedicalSpecialty in storage",
     *      tags={"MedicalSpecialty"},
     *      description="Store MedicalSpecialty",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="MedicalSpecialty that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/MedicalSpecialty")
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
     *                  ref="#/definitions/MedicalSpecialty"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateMedicalSpecialtyAPIRequest $request)
    {
        $input = $request->all();

        $medicalSpecialty = $this->medicalSpecialtyRepository->create($input);

        return $this->sendResponse($medicalSpecialty->toArray(), 'Medical Specialty saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/medicalSpecialties/{id}",
     *      summary="Display the specified MedicalSpecialty",
     *      tags={"MedicalSpecialty"},
     *      description="Get MedicalSpecialty",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of MedicalSpecialty",
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
     *                  ref="#/definitions/MedicalSpecialty"
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
        /** @var MedicalSpecialty $medicalSpecialty */
        $medicalSpecialty = $this->medicalSpecialtyRepository->find($id);

        if (empty($medicalSpecialty)) {
            return $this->sendError('Medical Specialty not found');
        }

        return $this->sendResponse($medicalSpecialty->toArray(), 'Medical Specialty retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateMedicalSpecialtyAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/medicalSpecialties/{id}",
     *      summary="Update the specified MedicalSpecialty in storage",
     *      tags={"MedicalSpecialty"},
     *      description="Update MedicalSpecialty",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of MedicalSpecialty",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="MedicalSpecialty that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/MedicalSpecialty")
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
     *                  ref="#/definitions/MedicalSpecialty"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateMedicalSpecialtyAPIRequest $request)
    {
        $input = $request->all();

        /** @var MedicalSpecialty $medicalSpecialty */
        $medicalSpecialty = $this->medicalSpecialtyRepository->find($id);

        if (empty($medicalSpecialty)) {
            return $this->sendError('Medical Specialty not found');
        }

        $medicalSpecialty = $this->medicalSpecialtyRepository->update($input, $id);

        return $this->sendResponse($medicalSpecialty->toArray(), 'MedicalSpecialty updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/medicalSpecialties/{id}",
     *      summary="Remove the specified MedicalSpecialty from storage",
     *      tags={"MedicalSpecialty"},
     *      description="Delete MedicalSpecialty",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of MedicalSpecialty",
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
        /** @var MedicalSpecialty $medicalSpecialty */
        $medicalSpecialty = $this->medicalSpecialtyRepository->find($id);

        if (empty($medicalSpecialty)) {
            return $this->sendError('Medical Specialty not found');
        }

        $medicalSpecialty->delete();

        return $this->sendResponse($id, 'Medical Specialty deleted successfully');
    }
}
