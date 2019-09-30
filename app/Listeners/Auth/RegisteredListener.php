<?php

namespace App\Listeners\Auth;

use App\Models\Auth\User\User;
use App\Notifications\Admin\NewUser;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class RegisteredListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  Registered $event
     * @return void
     */
    public function handle(Registered $event)
    {
        try {
    //         if ($event->role == 'doctors') {
    //             DeliveryProfile::create([
    //                 'user_id' => $event->user->id
    //             ]);
    //         } else if ($event->role == 'owner') {
    //             Store::create([
    //                 'owner_id' => $event->user->id
    //             ]);
    //         }

            event(new PostRegistration($event->user, $event->role));
        } catch (\Exception $ex) {
            Log::error('Exception occurred', [$ex->getMessage(), $ex->getTraceAsString()]);
        }
    }
}
