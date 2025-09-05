<?php

namespace App\Models\Schoolpro;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


use App\Models\Schoolpro\Course;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subject extends Model
{
    use HasFactory;

    protected $connection = 'mysql_schoolpro';
    protected $table = 'subjects';

    protected $fillable = [
        'course_id',
        'name',
        'code',
    ];

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    // Cross-DB: a Subject has many Lessons in TeachersDesk
    public function lessons(): HasMany
    {
        return $this->hasMany(\App\Models\Lesson::class, 'subject_id');
    }

}
