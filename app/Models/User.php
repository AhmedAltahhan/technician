<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements HasMedia
{
    use HasApiTokens, HasFactory, Notifiable,  InteractsWithMedia, HasRoles;

    protected $fillable =
    [
        'name',
        'mobile',
        'email',
        'password',
        'city',
        'bank_name',
        'number_of_statement',
        'location',
        'type',
    ];

    public function publicServices()
    {
        return $this->belongsToMany(PublicService::class);
    }

    public function subServices()
    {
        return $this->belongsToMany(SubService::class);
    }

     /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
}
