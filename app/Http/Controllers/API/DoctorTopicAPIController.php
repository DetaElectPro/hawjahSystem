<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\AppBaseController;
use App\Models\DoctorTopic;
use App\Repositories\DoctorTopicRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DoctorTopicAPIController extends AppBaseController
{
    /** @var  DoctorTopicRepository */
    private $doctorTopicRepository;

    public function __construct(DoctorTopicRepository $doctorTopicRep)
    {
        $this->doctorTopicRepository = $doctorTopicRep;
    }


    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $doctorTopic = $this->doctorTopicRepository->withPaginate(10, 'doctor');
        return $this->sendResponse($doctorTopic->toArray(), 'Doctor Topic retrieved successfully');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $doctorTopic = $this->doctorTopicRepository->createApi($input);

        return $this->sendResponse($doctorTopic->toArray(), 'Doctor Topic saved successfully');

    }


    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        /** @var DoctorTopic $doctorTopic */
        $doctorTopic = $this->doctorTopicRepository->findWith($id, ['user']);

        if (empty($doctorTopic)) {
            return $this->sendError('Doctor Topic not found');
        }

        return $this->sendResponse($doctorTopic->toArray(), 'Doctor Topic retrieved successfully');

    }


    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();

        /** @var DoctorTopic $doctorTopic */
        $doctorTopic = $this->doctorTopicRepository->find($id);

        if (empty($doctorTopic)) {
            return $this->sendError('Doctor Topic not found');
        }

        $doctorTopic = $this->doctorTopicRepository->update($input, $id);

        return $this->sendResponse($doctorTopic->toArray(), 'DoctorTopic updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     * @throws Exception
     */
    public function destroy($id)
    {
        /** @var DoctorTopic $doctorTopic */
        $doctorTopic = $this->doctorTopicRepository->find($id);

        if (empty($doctorTopic)) {
            return $this->sendError('Doctor Topic not found');
        }

        $doctorTopic->delete();

        return $this->sendSuccess('Doctor Topic deleted successfully');
    }
}
