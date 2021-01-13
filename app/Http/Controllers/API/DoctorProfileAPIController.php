<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\AppBaseController;
use App\Models\DoctorProfile;
use App\Repositories\DoctorProfileRepository;
use Illuminate\Http\Request;

class DoctorProfileAPIController extends AppBaseController
{

    /** @var  DoctorProfileRepository */
    private $doctorProfileRepository;

    public function __construct(DoctorProfileRepository $doctorProfileRepo)
    {
        $this->doctorProfileRepository = $doctorProfileRepo;
    }

    /**
     * Display a listing of the Employ.
     * GET|HEAD /doctor_profile
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $doctorProfiles = $this->doctorProfileRepository->withPaginate(30, ['user']);

        return $this->sendResponse($doctorProfiles->toArray(), 'Doctor Profiles retrieved successfully');
    }

    /**
     * Store a newly created Employ in storage.
     * POST /doctor_profile
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

//        $doctor = new DoctorProfile();
//        $doctor->fill($input);
//        $doctor->save();
//        return $doctor;
        $doctorProfile = $this->doctorProfileRepository->create($request);
        return $this->sendResponse($doctorProfile->toArray(), 'Doctor Profile saved successfully');
    }

    /**
     * Display the specified Employ.
     * GET|HEAD /doctor_profile/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var DoctorProfile $doctorProfile */
        $doctorProfile = $this->doctorProfileRepository->find($id);

        if (empty($doctorProfile)) {
            return $this->sendError('Doctor Profile not found');
        }

        return $this->sendResponse($doctorProfile->toArray(), 'Doctor Profile retrieved successfully');
    }

    /**
     * Update the specified Employ in storage.
     * PUT/PATCH /doctor_profile/{id}
     *
     * @param int $id
     * @param Request $request
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        $input = $request->all();

        /** @var DoctorProfile $doctorProfile */
        $doctorProfile = $this->doctorProfileRepository->find($id);

        if (empty($doctorProfile)) {
            return $this->sendError('Doctor Profile not found');
        }

        $doctorProfile = $this->doctorProfileRepository->update($input, $id);

        return $this->sendResponse($doctorProfile->toArray(), 'Doctor Profile updated successfully');
    }

    /**
     * Remove the specified Employ from storage.
     * DELETE /doctor_profile/{id}
     *
     * @param int $id
     *
     * @return Response
     * @throws \Exception
     *
     */
    public function destroy($id)
    {
        /** @var DoctorProfile $doctorProfile */
        $doctorProfile = $this->doctorProfileRepository->find($id);

        if (empty($doctorProfile)) {
            return $this->sendError('Doctor Profile not found');
        }

        $doctorProfile->delete();

        return $this->sendSuccess('Doctor Profile deleted successfully');
    }

}
