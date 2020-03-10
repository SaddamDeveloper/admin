<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\Branch as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Branch extends Authenticatable
{
    use Notifiable;

    protected $guard = 'branch';
    protected $table = 'user';
    
    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
