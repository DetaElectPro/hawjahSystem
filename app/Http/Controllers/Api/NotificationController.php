<?php

namespace App\Http\Controllers\API;

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
        $registatoin_ids =
            [
                $request->fcm_registration_id,
                "ex9YPApCHSw:APA91bHR7ojUuXkr3rNg0EpsxqxidnBd5gjzuW8VFhaCfK0Tji4M2gocH1xhCsIyipt2WdVYhL2n2oaPkfPzjOno-CGsqJwVHU7MyB-GTvHN6wiMVtlUCWNRs7LqEWlcu7fT5rzxoi1L"
            ];
        $message = ['title' => "Hi this is Test Message", 'body' => 'Message body'];
        //Google cloud messaging GCM-API url
        $url = 'https://fcm.googleapis.com/fcm/send';
        $fields = ['registration_ids' => $registatoin_ids, 'data' => ['message' => $message]];

        // Update your Google Cloud Messaging API Key
        //define("GOOGLE_API_KEY", "AIzaSyCCwa8O4IeMG-r_M9EJI_ZqyybIawbufgg");
        define("GOOGLE_API_KEY", env('FCM_SERVER_KEY'));

        $headers = [
            'Authorization: key=' . GOOGLE_API_KEY,
            'Content-Type: application/json'];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        $result = curl_exec($ch);
        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }
        curl_close($ch);
        return $result;
    }

    public function usersB()
    {
        return $user = User::where('fcm_registration_id', '!=', '')
            ->get('fcm_registration_id');
    }
}
