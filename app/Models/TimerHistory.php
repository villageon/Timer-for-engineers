<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class TimerHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'type',
        'judge',
        'comment',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
