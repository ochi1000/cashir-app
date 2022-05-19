<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Agent extends Authenticatable
{
    use Notifiable;

    protected $guard = 'agent';
    protected $fillable = ['name', 'email', 'password'];
    protected $hidden = ['password'];
}
