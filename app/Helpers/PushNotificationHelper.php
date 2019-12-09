<?php

/**
 * Created by PhpStorm.
 * User: ELteyab
 * Date: 09/12/19
 * Time: 14:23 PM
 */

namespace App\Helpers;

use Illuminate\Support\Facades\Log;
use LaravelFCM\Facades\FCM;
use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;

class PushNotificationHelper
{
    static function send($token, $title, $body, $data)
    {
        try {
            $data['title'] = $title;
            $data['body'] = $body;

            Log::info('Push notification - ' . $token, $data);

            $optionBuilder = new OptionsBuilder();
            $optionBuilder->setTimeToLive(60 * 20);

            $notificationBuilder = new PayloadNotificationBuilder($title);
            $notificationBuilder->setBody($body)
                ->setSound('default');

            $dataBuilder = new PayloadDataBuilder();
            $dataBuilder->addData($data);

            $option = $optionBuilder->build();
            $notification = $notificationBuilder->build();
            $data = $dataBuilder->build();

            if ($token) {
                Log::info('Push notification', ['Sending...', $token, $data]);
                FCM::sendTo($token, $option, null, $data);
            }
        } catch (\Exception $ex) {
            Log::info('Unable to send Push notification', [$token, $data]);
        }
    }
}
