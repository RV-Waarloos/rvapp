<?php

namespace App\Models\Rv;


enum OnboardingStatus: string {
    case WaitStart = 'Wacht op start';
    case WaitRegistration = 'Wacht op registratie';
    case Registered = 'Geregistreerd';
    case Cancelled = 'Afgebroken';
}
