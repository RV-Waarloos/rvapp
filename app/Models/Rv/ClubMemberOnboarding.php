<?php

namespace App\Models\Rv;

use App\Events\ClubMemberOnboardingStarted;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class ClubMemberOnboarding extends Model
{
    use HasFactory;
    use Notifiable;

    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'initiator_id',
        'department_id',
        'status',
    ];

    protected $casts = [
        'status' => OnboardingStatus::class,
    ];

    protected $dispatchesEvents = [
        'created' => ClubMemberOnboardingStarted::class,
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
        return $this->belongsTo(Department::class,'department_id');
    }
}
