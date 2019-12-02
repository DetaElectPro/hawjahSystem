<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;


class RequestSpecialistNotification extends Notification
{
    use Queueable;
    private $details;

    /**
     * Create a new notification instance.
     *
     * @param $details
     */
    public function __construct($details)
    {
        $this->details = $details;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
    }



    /**
     * return a single player-id
     * @return string
     */
//    public function routeNotificationForOneSignal()
//    {
//        return 'ONE_SIGNAL_PLAYER_ID';
//    }
   
    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     * @return array
     */
//    public function toArray($notifiable)
//    {
//        return [
//            //
//        ];
//    }
}
