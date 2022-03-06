<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Profile;
use App\Models\Image;

class Ranking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'fif_all',
        'fif_month',
        'fif_day',
        'thi_all',
        'thi_month',
        'thi_day',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function profile()
    {
        return $this->hasOne(Profile::class, 'user_id', 'user_id');
    }

    public function image()
    {
        return $this->hasOne(Image::class, 'user_id', 'user_id');
    }

}
