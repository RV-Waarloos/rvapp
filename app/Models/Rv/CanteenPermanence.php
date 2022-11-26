<?php

namespace App\Models\Rv;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CanteenPermanence extends Model
{
    use HasFactory;

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
        return $this->belongsTo(CanteenTeam::class,'canteen_team_id');
    }

    public function getJaarAttribute(): string
    {
        return $this->season->year;
    }

    public function jsonSerializeForCanteenCalendar()
    {
        return [
            'Id' => $this->id,
            'Subject' => $this->department->name,
            'StartTime' => $this->date . 'T09:30:00.000Z',
            'EndTime' => $this->date . 'T12:30:00.000Z',
            // 'isAllDay' => true,
            // 'team' => $this->canteenteam->name,
        ];
    }

}
