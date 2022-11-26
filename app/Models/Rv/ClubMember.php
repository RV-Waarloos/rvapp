<?php

namespace App\Models\Rv;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Rvwaarloos\Rvwaarloos\Database\Factories\ClubMemberFactory;

class ClubMember extends User
{
    use HasFactory;

    protected $with = ['profile'];

    protected $table = 'users';

    protected static function newFactory()
    {
        return ClubMemberFactory::new();
    }

        /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'password',
    ];

    public function clubmemberships()
    {
        return $this->hasMany(ClubMembership::class);
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    // public function resolveRouteBinding($value, $field=null)
    // {
    //     return $this->find(1);
    // }
}
