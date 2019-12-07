<?php

use GuzzleHttp\Client;

class FirebaseDoctor
{

    /**
     * Sending push message to single user by Firebase Registration ID
     * @param $to
     * @param $message
     *
     * @return bool|string
     */
    public function send($to, $message)
    {

        $fields = array(
            'to' => $to,
            'data' => $message,
        );

        return $this->sendPushNotification($fields);
    }


    /**
     * Sending message to a topic by topic name
     * @param $to
     * @param $message
     *
     * @return bool|string
     */
    public function sendToTopic($to, $message)
    {
        $fields = array(
            'to' => '/topics/' . $to,
            'data' => $message,
        );

        return $this->sendPushNotification($fields);
    }


    /**
     * Sending push message to multiple users by firebase registration ids
     * @param $registration_ids
     * @param $message
     *
     * @return bool|string
     */
    public function sendMultiple($registration_ids, $message)
    {
        $fields = array(
            'to' => $registration_ids,
            'data' => $message,
        );

        return $this->sendPushNotification($fields);
    }

    /**
     * CURL request to firebase servers
     * @param $fields
     *
     * @return bool|string
     */
    private function sendPushNotification($fields)
    {

        // Set POST variables
        $url = 'https://fcm.googleapis.com/fcm/send';

        $client = new Client();

        $result = $client->post($url, [
            'json' =>
                $fields
            ,
            'headers' => [
                'Authorization' => 'key=' . env('FCM_LEGACY_KEY_DOCTORS'),
                'Content-Type' => 'application/json',
            ],
        ]);


        return json_decode($result->getBody(), true);

    }
}