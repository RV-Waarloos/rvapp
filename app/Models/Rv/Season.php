<?php

namespace App\Models\Rv;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Rvwaarloos\Rvwaarloos\Database\Factories\SeasonFactory;

//  #[
//     LodataIdentifier('seasons'),
//     LodataTypeIdentifier('season'),
//     LodataString(name:'year', source:'year')]
class Season extends Model
{
    use HasFactory;

    protected static function newFactory()
    {
        return SeasonFactory::new();
    }

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    // protected $casts = [
    //     // 'year' => 'datetime:Y',
    // ];

    /**
     * Prepare a date for array / JSON serialization.
     *
     * @param  \DateTimeInterface  $date
     * @return string
     */
    // protected function serializeDate(DateTimeInterface $date)
    // {
    //     return $date->format('Y');
    // }

    public function canteenpermanences()
    {
        return $this->hasMany(CanteenPermanence::class);
    }
}
