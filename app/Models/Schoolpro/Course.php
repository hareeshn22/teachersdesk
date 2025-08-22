<?php

namespace App\Models\Schoolpro;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


use App\Models\Schoolpro\Syllabus;

class Course extends Model
{
     protected $connection = 'mysql_schoolpro';
    protected $table = 'courses';

    protected $fillable = [
        'syllabus_id',
        'name',
    ];

    public function syllabus(): BelongsTo
    {
        return $this->belongsTo(Syllabus::class);
    }

    public function subjects(): HasMany
    {
        return $this->hasMany(Subject::class);
    }

    // Cross-DB: a Course has many Lessons in TeachersDesk
    public function lessons(): HasMany
    {
        return $this->hasMany(\App\Models\Lesson::class, 'course_id');
    }

}
