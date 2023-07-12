<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Teacher extends Model
{
    use HasFactory, HasUlids;

    protected $fillable = [
        'first_name',
        'last_name',
        'phone',
        'gender',
        'specialization',
        'image',
    ];

    public function courses(): HasMany
    {
        return $this->hasMany(Course::class);
    }
}
