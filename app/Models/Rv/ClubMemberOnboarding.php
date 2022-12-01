<?php

namespace App\Models\Rv;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClubMemberOnboarding extends Model
{
    use HasFactory;

    protected $dispatchesEvents = [
        // 'created' => ChirpCreated::class,
    ];

    public function initiator()
    {
        return $this->belongsTo(ClubMember::class,'initiator_id');
    }

    public function subject()
    {
        return $this->belongsTo(ClubMember::class,'subject_id');
    }

    public function department()
    {
        return $this->belongsTo(ClubMember::class,'department_id');
    }
}
