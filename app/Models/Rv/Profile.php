<?php

namespace App\Models\Rv;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Rvwaarloos\Rvwaarloos\Database\Factories\ProfileFactory;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\MediaCollections\File;

class Profile extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected static function newFactory()
    {
        return ProfileFactory::new();
    }

    protected $fillable = [
        'club_member_id', 'city', 'birthdate', 'streetandnumber', 'zipcode', 'phone',
    ];

    public function clubmember()
    {
        return $this->belongsTo(ClubMember::class);
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this
            ->addMediaConversion('preview')
            ->fit(Manipulations::FIT_CROP, 300, 300)
            ->nonQueued();
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('avatar')
            ->acceptsFile(function (File $file) {
                return ($file->mimeType === 'image/jpeg') | ($file->mimeType === 'image/png');
            })
            ->singleFile();
    }
}
