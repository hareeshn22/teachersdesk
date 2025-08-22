<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Lesson extends Model
{
    use HasFactory;
    protected $fillable = ['subject_id', 'name'];

    /**
     * A lesson belongs to a subject.
     */
    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }


}
