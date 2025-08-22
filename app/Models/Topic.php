<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Topic extends Model
{
    use HasFactory;
    protected $table = 'topics';

    protected $fillable = [
        'lesson_id',
        'name',
        // 'description',
        'parent_id'
    ];

    public function lesson(): BelongsTo
    {
        return $this->belongsTo(Lesson::class);
    }

    public function materials(): HasMany
    {
        return $this->hasMany(Material::class);
    }

    public function examples(): HasMany
    {
        return $this->hasMany(Example::class);
    }

    public function videos(): HasMany
    {
        return $this->hasMany(Video::class);
    }

}
