<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateAcceptEmergencyServicedAPIRequest;
use App\Http\Requests\API\UpdateAcceptEmergencyServicedAPIRequest;
use App\Models\AcceptEmergencyServiced;
use App\Models\EmergencyServiced;
use App\Repositories\AcceptEmergencyServicedRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Illuminate\Support\Str;
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
        $acceptEmergencyServiceds = $this->acceptEmergencyServicedRepository->authWith(['userRequest', 'emergency']);

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
        $user = auth('api')->user()->id;

//         $available = $request->available - $request->needing;
        $status = 2;
        $requestEmergency = EmergencyServiced::whereId($request->emergency_id)
            ->update(['available' => $requestEmergency->availbale - $request->needing, 'status'=> $status, ]);
        if ($request->hasFile('image')) {
            $file_name = $this->saveFile($request, $user);
            $input = $request->all();

            $acceptEmergencyServiced = new AcceptEmergencyServiced();
            $acceptEmergencyServiced->fill($input);
            $acceptEmergencyServiced->user_id = $user;
            $acceptEmergencyServiced->image = $file_name;
            $acceptEmergencyServiced->save();
            return response()->json([
                "success" => true,
                "need" => $requestEmergency,
                "data" => $acceptEmergencyServiced,
                "message" => "Accept Emergency Serviced saved successfully"]);
        } else {
            $input = $request->all();
            $acceptEmergencyServiced = new AcceptEmergencyServiced();
            $acceptEmergencyServiced->fill($input);
            $acceptEmergencyServiced->user_id = $user;
            $acceptEmergencyServiced->save();
            return response()->json([
                "success" => true,
                "need" => $requestEmergency,
                "data" => $acceptEmergencyServiced,
                "message" => "Accept Emergency Serviced saved successfully"]);
        }

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
     * @return Response
     * @throws \Exception
     *
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

    public function saveFile($request, $userId)
    {
        $random = Str::random(10);
        if ($request->hasfile('image')) {
            $image = $request->file('image');
            $name = $random . 'report_' . $userId . ".jpg";
            $image->move(public_path() . '/report/', $name);
            $name = url("report/$name");

            return $name;
        }
        return false;
    }


    public function saveBase64($request, $userId)
    {
        if ($request->image) {
            $image = $request->image;  // your base64 encoded
            $image = str_replace('data:image/png;base64,', '', $image);
            $image = str_replace(' ', '+', $image);
            $imageName = str::random(10) . '.' . 'jpg';

            \File::put(public_path() . '/report/u_id-' . $userId . $imageName, base64_decode($image));
            $imageName = url("report/$imageName");
            return $imageName;
        } else {
            return false;
        }
    }
}
