<?php

namespace App\Http\Controllers;

use App\Models\TimerHistory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TimerController extends Controller
{
    public function history(){
        $fif = TimerHistory::where('user_id', Auth::id())
        ->where('type','1')
        ->get();

        $thi = TimerHistory::where('user_id', Auth::id())
        ->where('type','2')
        ->get();

        // dd($fif , $thi);

        return view('timer.history', compact('fif', 'thi'));

    }
}
