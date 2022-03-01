<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimerHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'type',
        'judge',
        'comment',
    ];
}
