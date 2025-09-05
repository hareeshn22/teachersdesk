<?php

namespace App\Models\Schoolpro;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

use App\Models\schoolpro\Course;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Syllabus extends Model
{
    use HasFactory;

    protected $connection = 'mysql_schoolpro';
    protected $table = 'syllabi';

    protected $fillable = [
        'title',
        'description',
    ];

    public function courses(): HasMany
    {
        return $this->hasMany(Course::class);
    }

}
