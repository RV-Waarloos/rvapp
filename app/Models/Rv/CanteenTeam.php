<?php

namespace App\Models\Rv;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CanteenTeam extends Model
{
    use HasFactory;

    public function canteenpermanences()
    {
        return $this->hasMany(CanteenPermanence::class);
    }

    // public function season()
    // {
    //     return $this->belongsTo(Season::class);
    // }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

}
