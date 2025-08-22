<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $fillable = ['stream_id', 'name', 'code'];

    /**
     * A course belongs to a stream.
     */
    public function stream()
    {
        return $this->belongsTo(Stream::class);
    }

    /**
     * A course has many subjects.
     */
    public function subjects()
    {
        return $this->hasMany(Subject::class);
    }

}
