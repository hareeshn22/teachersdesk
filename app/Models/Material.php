<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Material extends Model implements HasMedia
{
    // use HasFactory;
    use InteractsWithMedia;

    protected $fillable = ['topic_id', 'extract', 'content',];

    // Optional: define conversions for images
    public function registerMediaConversions(Media $media = null): void
    {
        // $this->addMediaConversion('thumb')
        //     ->fit('crop', 300, 300)
        //     ->nonQueued();

        // $this->addMediaConversion('web')
        //     ->width(1024)
        //     ->height(768)
        //     ->sharpen(10);

        if ($media && $media->mime_type !== 'image/gif') {
            $this->addMediaConversion('thumb')
                ->width(300)
                ->height(300)
                ->quality(70)
                ->sharpen(10);
        }

    }


    public function topic(): BelongsTo
    {
        return $this->belongsTo(Topic::class);
    }

}
