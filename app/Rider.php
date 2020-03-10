<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\Rider as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Rider extends Authenticatable
{
    use Notifiable;

    protected $guard = 'rider';
    protected $table = 'user';
    
    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
