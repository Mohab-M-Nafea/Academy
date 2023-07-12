<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
//use Illuminate\Support\Facades\Hash;

class Student extends Authenticatable
{
    use HasFactory, HasUlids, Notifiable;

    protected $fillable = [
        'first_name',
        'last_name',
        'username',
        'email',
        'password',
        'phone',
        'specialization',
        'gender',
        'image',
    ];

    protected $hidden = [
        'password',
        'remember_token'
    ];

    protected $casts = [
        'password' => 'hashed'
    ];

//    protected function password(): Attribute
//    {
//        return Attribute::make(
//            set: fn($value) => is_null($value) ? $this->getAttributeValue('password') : Hash::make($value),
//        );
//    }

    public function courses(): BelongsToMany
    {
        return $this->belongsToMany(Course::class)
            ->withPivot('status')
            ->withTimestamps();
    }
}
