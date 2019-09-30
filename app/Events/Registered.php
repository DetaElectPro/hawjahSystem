<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;
use PhpParser\Node\Scalar\String_;

class Registered
{
    use SerializesModels;

    /**
     * The authenticated user.
     *
     * @var \Illuminate\Contracts\Auth\Authenticatable
     */
    public $user;

    /**
     * Role assigned to new user
     *
     * @var string
     */
    public $role;

    /**
     * Create a new event instance.
     *
     * @param  \Illuminate\Contracts\Auth\Authenticatable  $user
     * @param  string
     * @return void
     */
    public function __construct($user, $role)
    {
        $this->user = $user;
        $this->role = $role;
    }
}


// namespace App\Events;

// use Illuminate\Broadcasting\Channel;
// use Illuminate\Queue\SerializesModels;
// use Illuminate\Broadcasting\PrivateChannel;
// use Illuminate\Broadcasting\PresenceChannel;
// use Illuminate\Foundation\Events\Dispatchable;
// use Illuminate\Broadcasting\InteractsWithSockets;
// use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

// class Registered
// {
//     use Dispatchable, InteractsWithSockets, SerializesModels;

//     /**
//      * Create a new event instance.
//      *
//      * @return void
//      */
//     public function __construct()
//     {
//         //
//     }

//     /**
//      * Get the channels the event should broadcast on.
//      *
//      * @return \Illuminate\Broadcasting\Channel|array
//      */
//     public function broadcastOn()
//     {
//         return new PrivateChannel('channel-name');
//     }

// }
