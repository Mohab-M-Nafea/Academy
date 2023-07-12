<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory, HasUlids;

    protected $fillable = [
        'name',
        'image'
    ];

    public function courses(): HasMany
    {
        return $this->hasMany(Course::class);
    }
}
