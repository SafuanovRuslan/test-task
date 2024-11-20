<?php

namespace App\Listeners;

use App\Events\UserCreated;
use App\Models\User\UserServiceFacade;
use Illuminate\Contracts\Queue\ShouldQueue;

class UpdateUserCache implements ShouldQueue
{
    /**
     * Handle the event.
     */
    public function handle(UserCreated $event): void
    {
        UserServiceFacade::updateUserCache($event->id, $event->email);
    }
}
