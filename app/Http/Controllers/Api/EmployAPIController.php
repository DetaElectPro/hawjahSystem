<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateEmployAPIRequest;
use App\Http\Requests\API\UpdateEmployAPIRequest;
use App\Models\Employ;
use App\Repositories\EmployRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;
use Str;

/**
 * Class EmployController
 * @package App\Http\Controllers\API
 */
class EmployAPIController extends AppBaseController
{
    /** @var  EmployRepository */
    private $employRepository;

    public function __construct(EmployRepository $employRepo)
    {
        $this->employRepository = $employRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/employs",
     *      summary="Get a listing of the Employs.",
     *      tags={"Employ"},
     *      description="Get all Employs",
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
     *                  @SWG\Items(ref="#/definitions/Employ")
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
        $employs = $this->employRepository->with(['medical_board', 'user']);

        return $this->sendResponse($employs->toArray(), 'Employs retrieved successfully');
    }

    /**
     * @param CreateEmployAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/employs",
     *      summary="Store a newly created Employ in storage",
     *      tags={"Employ"},
     *      description="Store Employ",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Employ that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Employ")
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
     *                  ref="#/definitions/Employ"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateEmployAPIRequest $request)
    {

        $user = auth('api')->user()->id;
        $file_name = $this->saveFile($request, $user);
        $employ = new Employ($request->all());
        $employ->cv = $file_name;
        $employ->user_id = $user;
        $employ->save();
        $userStatus = $employ->user()->update(['status' => 2]);

        if (isset($employ)) {
            return response()->json(['employ' => $employ, 'statusUpdate' => $userStatus, 'status' => 2]);
        } else {
            return response()->json(["error" => "no data found", $employ]);
        }

//        $input = $request->all();
//
//        $employ = $this->employRepository->create($input);
//
//        return $this->sendResponse($employ->toArray(), 'Employ saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/employs/{id}",
     *      summary="Display the specified Employ",
     *      tags={"Employ"},
     *      description="Get Employ",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Employ",
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
     *                  ref="#/definitions/Employ"
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
        /** @var Employ $employ */
        $employ = $this->employRepository->find($id);

        if (empty($employ)) {
            return $this->sendError('Employ not found');
        }

        return $this->sendResponse($employ->toArray(), 'Employ retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateEmployAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/employs/{id}",
     *      summary="Update the specified Employ in storage",
     *      tags={"Employ"},
     *      description="Update Employ",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Employ",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Employ that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Employ")
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
     *                  ref="#/definitions/Employ"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateEmployAPIRequest $request)
    {
        $input = $request->all();

        /** @var Employ $employ */
        $employ = $this->employRepository->find($id);

        if (empty($employ)) {
            return $this->sendError('Employ not found');
        }

        $employ = $this->employRepository->update($input, $id);

        return $this->sendResponse($employ->toArray(), 'Employ updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/employs/{id}",
     *      summary="Remove the specified Employ from storage",
     *      tags={"Employ"},
     *      description="Delete Employ",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Employ",
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
        /** @var Employ $employ */
        $employ = $this->employRepository->find($id);

        if (empty($employ)) {
            return $this->sendError('Employ not found');
        }

        $employ->delete();

        return $this->sendResponse($id, 'Employ deleted successfully');
    }


    public function saveFile($request, $userId)
    {
        $random = Str::random(10);
        if ($request->hasfile('cv')) {
            $image = $request->file('cv');
            $name = $random . 'cv_' . $userId . ".pdf";
            $image->move(public_path() . '/cv/', $name);
            $name = url("cv/$name");

            return $name;
        }
        return false;
    }
}
