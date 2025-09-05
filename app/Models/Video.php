<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Video extends Model
{
    use HasFactory;

    protected $table = 'videos';

    protected $fillable = [
        'topic_id',
        'video_link',
    ];

    public function topic(): BelongsTo
    {
        return $this->belongsTo(Topic::class);
    }

}
