<?php

namespace App\Http\Controllers;

use App\Models\TimerHistory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Constants\Common;

class TimerController extends Controller
{
    public function history(){
        $fifteen = TimerHistory::where('user_id', Auth::id())
        ->where('type', Common::MINUTES['fifteen'] )
        ->paginate(5);

        $fifCount = TimerHistory::where('user_id', Auth::id())
        ->where('type', Common::MINUTES['fifteen'])
        ->get()->count();

        $fifWinCount = TimerHistory::where('user_id', Auth::id())
        ->where('type',  Common::MINUTES['fifteen'])
        ->where('judge', Common::JUDGE['winner'])
        ->get()->count();

        $fifLoseCount = TimerHistory::where('user_id', Auth::id())
        ->where('type', Common::MINUTES['fifteen'])
        ->where('judge', Common::JUDGE['loser'])
        ->get()->count();

        $thirty = TimerHistory::where('user_id', Auth::id())
        ->where('type',  Common::MINUTES['thirty'])
        ->paginate(5);

        $thiCount = TimerHistory::where('user_id', Auth::id())
        ->where('type',  Common::MINUTES['thirty'])
        ->get()->count();

        $thiWinCount = TimerHistory::where('user_id', Auth::id())
        ->where('type', Common::MINUTES['thirty'])
        ->where('judge', Common::JUDGE['winner'])
        ->get()->count();

        $thiLoseCount = TimerHistory::where('user_id', Auth::id())
        ->where('type', Common::MINUTES['thirty'])
        ->where('judge', Common::JUDGE['loser'])
        ->get()->count();

        // dd($fif , $thi);

        return view('timer.history', compact('fifteen', 'fifCount', 'fifWinCount', 'fifLoseCount', 'thirty', 'thiCount', 'thiWinCount','thiLoseCount'));

    }
}
