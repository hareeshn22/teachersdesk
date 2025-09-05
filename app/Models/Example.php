<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;


class Example extends Model implements HasMedia
{
    // use HasFactory;
    use InteractsWithMedia;


    // Optional: define conversions for images
    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->fit('crop', 300, 300)
            ->nonQueued();

        $this->addMediaConversion('web')
            ->width(1024)
            ->height(768)
            ->sharpen(10);
    }

    protected $table = 'examples';

    protected $fillable = [
        'topic_id',
        'extract',
        'content',
    ];

    public function topic(): BelongsTo
    {
        return $this->belongsTo(Topic::class);
    }


}
