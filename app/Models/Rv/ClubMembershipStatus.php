<?php

namespace App\Models\Rv;

use Ramsey\Uuid\Type\Integer;

enum ClubMembershipStatus: int {
    case Pending = 0;
    case Active = 1;
    case Inactive = 2;
    case Rejected = 3;
}
