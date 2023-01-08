<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Doctor extends  Authenticatable
{
    use HasFactory,
    Notifiable,
    CanResetPassword;

    protected $guard = 'doctor';

    protected $fillable = [
        'name',
        'email',
        'department',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    // // Relationship with Posts
    // public function Posts(){
    //     return $this->hasMany(Doctor::class,'doctor_id');
    // }

}
