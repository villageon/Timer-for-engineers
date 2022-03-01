<?php

namespace App\Http\Controllers;

use App\Models\TimerHistory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TimerController extends Controller
{
    public function history(){
        $fifteen = TimerHistory::where('user_id', Auth::id())
        ->where('type','1')
        ->paginate(5);

        $fifCount = TimerHistory::where('user_id', Auth::id())
        ->where('type','1')
        ->get()->count();

        $fifWinCount = TimerHistory::where('user_id', Auth::id())
        ->where('type','1')
        ->where('judge', '1')
        ->get()->count();

        $fifLoseCount = TimerHistory::where('user_id', Auth::id())
        ->where('type','1')
        ->where('judge', '2')
        ->get()->count();

        $thirty = TimerHistory::where('user_id', Auth::id())
        ->where('type','2')
        ->paginate(5);

        $thiCount = TimerHistory::where('user_id', Auth::id())
        ->where('type','2')
        ->get()->count();

        $thiWinCount = TimerHistory::where('user_id', Auth::id())
        ->where('type','2')
        ->where('judge', '1')
        ->get()->count();

        $thiLoseCount = TimerHistory::where('user_id', Auth::id())
        ->where('type','2')
        ->where('judge', '2')
        ->get()->count();

        // dd($fif , $thi);

        return view('timer.history', compact('fifteen', 'fifCount', 'fifWinCount', 'fifLoseCount', 'thirty', 'thiCount', 'thiWinCount','thiLoseCount'));

    }
}
