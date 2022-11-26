<?php

namespace App\Models\Rv;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClubMembership extends Model
{
    use HasFactory;

    protected $fillable = [
        'club_member_id',
        'department_id',
        'season_id',
        'canteen_team_id',
        'status,'
    ];

    // protected $casts = [
    //     'status' => ClubMembershipStatus::class,
    // ] ;

    public function season()
    {
        return $this->belongsTo(Season::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function canteenteam()
    {
        return $this->belongsTo(CanteenTeam::class);
    }

    public function clubmember()
    {
        return $this->belongsTo(ClubMember::class);
    }

    protected $year = ['season_year'];

    public function getSeasonYearAttribute()
    {
        return $this->season->year;
    }
}
