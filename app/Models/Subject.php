<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

     protected $fillable = ['course_id', 'name', 'code'];

    /**
     * A subject belongs to a course.
     */
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    /**
     * A subject has many lessons.
     */
    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }

}
