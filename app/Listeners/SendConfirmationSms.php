<?php

namespace App\Listeners;

use App\Events\MembershipAccepted;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendConfirmationSms
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Handle the event.
     *
     * @param  MembershipAccepted  $event
     * @return void
     */
    public function handle(MembershipAccepted $event)
    {
        send_message($event->member->mobile_no, $event->message);
    }
}
