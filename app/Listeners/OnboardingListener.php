<?php

namespace App\Listeners;

use App\Events\ClubMemberOnboardingStarted;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class OnboardingListener
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
     * @param  \App\Events\ClubMemberOnboardingStarted  $event
     * @return void
     */
    public function handle(ClubMemberOnboardingStarted $event)
    {
        $xx = $event;
    }
}
