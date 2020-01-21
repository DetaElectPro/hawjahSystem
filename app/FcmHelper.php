<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FcmHelper extends Model
{
    /**
     * Sending Message From FCM For Android
     * @param $data
     * @return bool|string
     */
    function send_android_fcm($data)
    {
        $registatoin_ids = [$data->fcm_registration_id];
        $message = ['title' => $data->title, 'body' => $data->message];
        //Google cloud messaging GCM-API url
        $url = 'https://fcm.googleapis.com/fcm/send';
        $fields = ['registration_ids' => $registatoin_ids, 'data' => ['message' => $message]];

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
}
