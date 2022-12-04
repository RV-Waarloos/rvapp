<?php

namespace App\Listeners;

use App\Events\ClubMemberOnboardingStarted;
use App\Notifications\RegisterMyAccountNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class OnboardingEventSubscriber
{
    public function handleClubMemberOnboardingStarted(ClubMemberOnboardingStarted $event)
    {
        $event->onboarding->notify(new RegisterMyAccountNotification($event->onboarding));
    }

    public function subscribe($events)
    {
        $events->listen(
            ClubMemberOnboardingStarted::class,
            [OnboardingEventSubscriber::class, 'handleClubMemberOnboardingStarted']
        );
    }
}
