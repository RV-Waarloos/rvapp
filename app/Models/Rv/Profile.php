<?php

namespace App\Models\Rv;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Rvwaarloos\Rvwaarloos\Database\Factories\ProfileFactory;

class Profile extends Model
{
    use HasFactory;

    protected static function newFactory()
    {
        return ProfileFactory::new();
    }

    protected $fillable = [
        'club_member_id',
    ];

    public function clubmember()
    {
        return $this->belongsTo(ClubMember::class);
    }
}
