<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Course extends Model
{
    use HasFactory, HasUlids;

    protected $fillable = [
        'name',
        'small_description',
        'description',
        'price',
        'image',
        'category_id',
        'teacher_id',
    ];

    public function teacher(): BelongsTo
    {
        return $this->belongsTo(Teacher::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function student(): BelongsToMany
    {
        return $this->belongsToMany(Student::class)
            ->withPivot('status')
            ->withTimestamps();
    }

    public function price(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $value ? '$' . number_format($value) : 'Free'
        );
    }
}
