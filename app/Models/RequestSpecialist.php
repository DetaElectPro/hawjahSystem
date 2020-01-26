<?php

namespace App\Models;

use App\FcmHelper;
use App\Helpers\PushNotificationHelper;
use App\Http\Controllers\Api\AcceptRequestApiController;
use App\User;
use Eloquent;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\DatabaseNotificationCollection;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;

/**
 * App\Models\RequestSpecialist
 *
 * @property-read MedicalSpecialty $specialties
 * @property-read User $user
 * @method static Builder|RequestSpecialist newModelQuery()
 * @method static Builder|RequestSpecialist newQuery()
 * @method static Builder|RequestSpecialist query()
 * @mixin Eloquent
 * @property int $id
 * @property string $name
 * @property string $address
 * @property string $price
 * @property string $start_time
 * @property string $end_time
 * @property int $medical_id
 * @property int $user_id
 * @property string $status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|RequestSpecialist whereAddress($value)
 * @method static Builder|RequestSpecialist whereCreatedAt($value)
 * @method static Builder|RequestSpecialist whereEndTime($value)
 * @method static Builder|RequestSpecialist whereId($value)
 * @method static Builder|RequestSpecialist whereMedicalId($value)
 * @method static Builder|RequestSpecialist whereName($value)
 * @method static Builder|RequestSpecialist wherePrice($value)
 * @method static Builder|RequestSpecialist whereStartTime($value)
 * @method static Builder|RequestSpecialist whereUpdatedAt($value)
 * @method static Builder|RequestSpecialist whereUserId($value)
 * @method static Builder|RequestSpecialist whereStatus($value)
 * @property-read AcceptRequest $acceptRequest
 * @property float|null $latitude
 * @property float|null $longitude
 * @property-read DatabaseNotificationCollection|DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static Builder|RequestSpecialist whereLatitude($value)
 * @method static Builder|RequestSpecialist whereLongitude($value)
 */
class RequestSpecialist extends Model
{
    protected $fillable = ['name', 'address', 'start_time', 'end_time', 'hours', 'price', 'latitude', 'longitude', 'medical_id', 'status', 'user_id'];

    use Notifiable;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function specialties()
    {
        return $this->belongsTo(MedicalSpecialty::class, 'medical_id');
    }

    public function acceptRequest()
    {
        return $this->hasOne(AcceptRequest::class, 'request_id');
    }

    public function AcceptRequestMM()
    {
        return $this->belongsToMany(AcceptRequest::class, 'request_specialist_accept_request');
    }
//    public function doctor(){
//        return $this->belongsTo(Us)
//    }

    /*
     * @param statuse
     * have value from 1to 6
     * where 1 = new request by admin
     * and 2 accept by user
     * and 3 accept user by admin
     * and 4 cancel request by admin
     * and 5 cancel request by user
     * and 6 is accept request that is don
     * */


    public function acceptRequestByUser($requestId, $userID)
    {

        $requestSpecialistData = RequestSpecialist::whereId($requestId)->whereStatus(1)->with('user')->first();
        $requestSpecialist = RequestSpecialist::whereId($requestId)->whereStatus(1)->update(['status' => 2]);
        if ($requestSpecialist == 1) {
            $acceptRequest = new AcceptRequest();
            $acceptRequest->user_id = $userID;
            $acceptRequest->notes = '__';
            $acceptRequest->request_id = $requestId;
            $acceptRequest = $acceptRequest->save();
            $data = [
                'fcm_registration_id' => $requestSpecialistData->user->fcm_registration_id,
                'title' => "accept request",
                "message" => "You have received new message from: " . $requestSpecialistData->user->name
            ];
            $this->fcm_send($data);
            return ['accept' => true, 'request' => true, 'acceptRequest' => $acceptRequest];
        } else {
            return ['accept' => false, 'request' => false, 'message' => $requestSpecialist];
        }
    }

    public function acceptRequestByAdmin($requestId)
    {
        $resultData = RequestSpecialist::whereId($requestId)->whereStatus(2)->with('user')->first();
        $result = RequestSpecialist::whereId($requestId)->whereStatus(2)->update(['status' => 3]);
        if ($result == 1) {
            PushNotificationHelper::send($resultData->user->fcm_registration_id,
                'Request update', 'You have received new message from ', ["name" => $resultData->user->name]);
            return ['accept' => true, 'request' => true];
        } else {
            return ['accept' => false, 'request' => false, 'message' => $result];
        }

    }


    /**
     * @param $requestId
     * @return AcceptRequest|array|bool|Builder|mixed|null
     * @throws Exception
     */
    public function cancelRequestByAdmin($requestId)
    {
        $acceptRequest = AcceptRequest::whereRequestId($requestId);
        $acceptRequest = $acceptRequest->delete();
        if ($acceptRequest) {
            $requestSpecialist = RequestSpecialist::whereId($requestId)->update(['status' => 4]);
//            PushNotificationHelper::send($resultData->user->fcm_registration_id,
//                'Request update', 'You have received new message from ', ["name" => $resultData->user->name]);
            return ['accept' => true, 'request' => true];

        } else {
            return ['accept' => false, 'request' => false];
        }

    }

    /**
     * @param $requestId
     * @return array
     * @throws Exception
     */
    public function cancelRequestByUser($requestId)
    {
        $acceptRequest = AcceptRequest::whereRequestId($requestId);
        $acceptRequest = $acceptRequest->delete();
        if ($acceptRequest) {
            RequestSpecialist::whereId($requestId)->whereStatus(2)->update(['status' => 1]);
            return ['accept' => true, 'request' => true];

        } else {
            return ['accept' => false, 'request' => false];
        }

    }

    public function acceptRequestAndDone($requestId, $request)
    {
        $acceptRequest = AcceptRequest::whereRequestId($requestId)
            ->update([
                'notes' => $request->notes,
                'recommendation' => $request->recommendation,
                'rating' => $request->rating
            ]);
        if ($acceptRequest) {
            $requestSpecialist = RequestSpecialist::whereId($requestId)->whereStatus(3)->update(['status' => 6]);
            return ['accept' => true, 'request' => true];

        } else {
            return ['accept' => false, 'request' => false];
        }

    }

    private function fcm_send($data)
    {
        $result = new FcmHelper();
        return $result->send_android_fcm($data);
    }

}
