<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

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
        return $this->belongsTo(Ranking::class);
    }
}
