<?php

namespace App\Http\Controllers\API;

use App\FcmHelper;
use App\User;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;


class NotificationController extends AppBaseController
{

    /**
     * Sending Message From FCM For Android
     * @param Request $request
     * @return bool|string
     */
    function send_android_fcm(Request $request)
    {
        $result = new FcmHelper();
        return $result->send_android_fcm($request);

    }

    public function usersB()
    {
        return $user = User::where('fcm_registration_id', '!=', '')
            ->get('fcm_registration_id');
    }
}
