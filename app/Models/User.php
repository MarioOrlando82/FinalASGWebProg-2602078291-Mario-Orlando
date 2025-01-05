<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'gender',
        'fields_of_work',
        'linkedin_username',
        'mobile_number',
        'registration_price',
        'coins',
        'visible',
        'profile_photo',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'fields_of_work' => 'array',
        'visible' => 'boolean',
    ];

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function wishlists()
    {
        return $this->hasMany(Wishlist::class);
    }

    public function fieldsOfWork()
    {
        return $this->belongsToMany(FieldOfWork::class, 'user_field_of_works');
    }


    public function avatars()
    {
        return $this->belongsToMany(Avatar::class, 'user_avatars')
                    ->withPivot('sender_id')
                    ->withTimestamps();
    }

}
