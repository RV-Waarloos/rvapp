<?php

namespace App\Models\Rv;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClubMemberWithMembership extends Model
{
    use HasFactory;

    public $table = 'clubmemberoverview';

    protected $casts = [
        'membershipstatus' => ClubMembershipStatus::class,
    ];
}
