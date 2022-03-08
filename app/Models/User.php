<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Profile;
use App\Models\TimerHistory;
use App\Models\Image;
use App\Models\Ranking;
use App\Models\Menter;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];
  
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function profile(){
        return $this->hasOne(Profile::class, 'user_id');
    }

    public function timerHistory(){
        return $this->hasMany(TimerHistory::class, 'user_id');
    }

    public function image(){
        return $this->hasOne(Image::class, 'user_id');
    }

    public function ranking(){
        return $this->hasOne(Ranking::class, 'user_id');
    }

    public function menter(){
        return $this->hasOne(Menter::class, 'user_id');
    }
}
