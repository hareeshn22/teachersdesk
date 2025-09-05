<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;


class ApiClient extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'token_hash',
    ];

    /**
     * Check if a plain token matches the stored hash.
     */
    public function matchesToken(string $plainToken): bool
    {
        return Hash::check($plainToken, $this->token_hash);
    }

    /**
     * Scope to find by name (e.g. 'Schoolpro', 'Studentpro').
     */
    public function scopeByName($query, string $name)
    {
        return $query->where('name', $name);
    }


}
