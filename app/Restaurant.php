<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\Restaurant as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Restaurant extends Authenticatable
{
    use Notifiable;

    protected $guard = 'restaurant';
    protected $table = 'user';
    
    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
