<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Model
{
    protected $fillable = [
        'name',
        'email',
        'password',
        'code',
        'active'
    ];
    use HasFactory;



























    
protected $guard = 'admin'; 
    protected $hidden = [
        'password',
        'remember_token',
    ];
    
}
