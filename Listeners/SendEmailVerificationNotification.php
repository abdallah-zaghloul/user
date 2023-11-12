<?php

namespace Modules\User\Listeners;

use Modules\User\Events\WebRegistered;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendEmailVerificationNotification
{
    /**
     * Handle the event.
     *
     * @param WebRegistered $event
     * @return void
     */
    public function handle(WebRegistered $event): void
    {
        if ($event->user instanceof MustVerifyEmail && ! $event->user->hasVerifiedEmail()) {
            $event->user->sendEmailVerificationNotification();
        }
    }
}
