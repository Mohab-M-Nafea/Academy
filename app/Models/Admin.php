<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

class Admin extends Authenticatable
{
    use HasFactory, HasUlids;

    protected $fillable = [
        'first_name',
        'last_name',
        'username',
        'email',
        'password',
        'image',
    ];

    protected $hidden = [
        'password'
    ];

    protected $casts = [
        'password' => 'hashed'
    ];

//    public function password(): Attribute
//    {
//        return Attribute::make(
//            set: fn($value) => empty($value) ? $this->getAttributeValue('password') : Hash::make($value),
//        );
//    }
}
