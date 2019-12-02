<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
//use NotificationChannels\OneSignal\OneSignalButton;
use NotificationChannels\OneSignal\OneSignalChannel;
use NotificationChannels\OneSignal\OneSignalMessage;
//use NOneSignalWebButton;
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
        return [OneSignalChannel::class];
    }

    /**
     * @param $notifiable
     * @return OneSignalMessage
     */
    public function toOneSignal($notifiable)
    {
        OneSignalMessage::create()
            ->subject('New Request')
            ->body("New Request from  {$notifiable->name}")
            ->button(
                OneSignalButton::create()
                    ->text("Open")
//                    ->icon('button icon')
            );
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
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
//    public function toMail($notifiable)
//    {
//        return (new MailMessage)
//                    ->line('The introduction to the notification.')
//                    ->action('Notification Action', url('/'))
//                    ->line('Thank you for using our application!');
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
