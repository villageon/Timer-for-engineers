<?php

namespace App\Http\Controllers;

use App\Models\TimerHistory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Constants\Common;
use App\Models\Ranking;

class TimerController extends Controller
{

    public function history(Request $request){

        $date = $request->input('date') ?? 'year';

        if($date === 'year'){

            $fifteen = TimerHistory::where('user_id', Auth::id())
            ->whereYear('created_at', '=', date("Y"))
            ->where('type', Common::MINUTES['fifteen'] )
            ->orderBy('created_at', 'desc')
            ->paginate(3);
    
            $fifCount = TimerHistory::where('user_id', Auth::id())
            ->whereYear('created_at', '=', date("Y"))
            ->where('type', Common::MINUTES['fifteen'])
            ->get()->count();
    
            $fifWinCount = TimerHistory::where('user_id', Auth::id())
            ->whereYear('created_at', '=', date("Y"))
            ->where('type',  Common::MINUTES['fifteen'])
            ->where('judge', Common::JUDGE['winner'])
            ->get()->count();
    
            $fifLoseCount = TimerHistory::where('user_id', Auth::id())
            ->whereYear('created_at', '=', date("Y"))
            ->where('type', Common::MINUTES['fifteen'])
            ->where('judge', Common::JUDGE['loser'])
            ->get()->count();
    
            $thirty = TimerHistory::where('user_id', Auth::id())
            ->whereYear('created_at', '=', date("Y"))
            ->where('type',  Common::MINUTES['thirty'])
            ->orderBy('created_at', 'desc')
            ->paginate(3);
    
            $thiCount = TimerHistory::where('user_id', Auth::id())
            ->whereYear('created_at', '=', date("Y"))
            ->where('type',  Common::MINUTES['thirty'])
            ->get()->count();
    
            $thiWinCount = TimerHistory::where('user_id', Auth::id())
            ->whereYear('created_at', '=', date("Y"))
            ->where('type', Common::MINUTES['thirty'])
            ->where('judge', Common::JUDGE['winner'])
            ->get()->count();
    
            $thiLoseCount = TimerHistory::where('user_id', Auth::id())
            ->whereYear('created_at', '=', date("Y"))
            ->where('type', Common::MINUTES['thirty'])
            ->where('judge', Common::JUDGE['loser'])
            ->get()->count();
    
        } else if($date === 'month'){
            
            $fifteen = TimerHistory::where('user_id', Auth::id())
            ->whereMonth('created_at', '=', date("m"))
            ->where('type', Common::MINUTES['fifteen'] )
            ->orderBy('created_at', 'desc')
            ->paginate(3);
    
            $fifCount = TimerHistory::where('user_id', Auth::id())
            ->whereMonth('created_at', '=', date("m"))
            ->where('type', Common::MINUTES['fifteen'])
            ->get()->count();
    
            $fifWinCount = TimerHistory::where('user_id', Auth::id())
            ->whereMonth('created_at', '=', date("m"))
            ->where('type',  Common::MINUTES['fifteen'])
            ->where('judge', Common::JUDGE['winner'])
            ->get()->count();
    
            $fifLoseCount = TimerHistory::where('user_id', Auth::id())
            ->whereMonth('created_at', '=', date("m"))
            ->where('type', Common::MINUTES['fifteen'])
            ->where('judge', Common::JUDGE['loser'])
            ->get()->count();
    
            $thirty = TimerHistory::where('user_id', Auth::id())
            ->whereMonth('created_at', '=', date("m"))
            ->where('type',  Common::MINUTES['thirty'])
            ->orderBy('created_at', 'desc')
            ->paginate(3);
    
            $thiCount = TimerHistory::where('user_id', Auth::id())
            ->whereMonth('created_at', '=', date("m"))
            ->where('type',  Common::MINUTES['thirty'])
            ->get()->count();
    
            $thiWinCount = TimerHistory::where('user_id', Auth::id())
            ->whereMonth('created_at', '=', date("m"))
            ->where('type', Common::MINUTES['thirty'])
            ->where('judge', Common::JUDGE['winner'])
            ->get()->count();
    
            $thiLoseCount = TimerHistory::where('user_id', Auth::id())
            ->whereMonth('created_at', '=', date("m"))
            ->where('type', Common::MINUTES['thirty'])
            ->where('judge', Common::JUDGE['loser'])
            ->get()->count();

        } else if($date === 'day'){

            $fifteen = TimerHistory::where('user_id', Auth::id())
            ->whereDay('created_at', '=', date("d"))
            ->where('type', Common::MINUTES['fifteen'] )
            ->orderBy('created_at', 'desc')
            ->paginate(3);
    
            $fifCount = TimerHistory::where('user_id', Auth::id())
            ->whereDay('created_at', '=', date("d"))
            ->where('type', Common::MINUTES['fifteen'])
            ->get()->count();
    
            $fifWinCount = TimerHistory::where('user_id', Auth::id())
            ->whereDay('created_at', '=', date("d"))
            ->where('type',  Common::MINUTES['fifteen'])
            ->where('judge', Common::JUDGE['winner'])
            ->get()->count();
    
            $fifLoseCount = TimerHistory::where('user_id', Auth::id())
            ->whereDay('created_at', '=', date("d"))
            ->where('type', Common::MINUTES['fifteen'])
            ->where('judge', Common::JUDGE['loser'])
            ->get()->count();
    
            $thirty = TimerHistory::where('user_id', Auth::id())
            ->whereDay('created_at', '=', date("d"))
            ->where('type',  Common::MINUTES['thirty'])
            ->orderBy('created_at', 'desc')
            ->paginate(3);
    
            $thiCount = TimerHistory::where('user_id', Auth::id())
            ->whereDay('created_at', '=', date("d"))
            ->where('type',  Common::MINUTES['thirty'])
            ->get()->count();
    
            $thiWinCount = TimerHistory::where('user_id', Auth::id())
            ->whereDay('created_at', '=', date("d"))
            ->where('type', Common::MINUTES['thirty'])
            ->where('judge', Common::JUDGE['winner'])
            ->get()->count();
    
            $thiLoseCount = TimerHistory::where('user_id', Auth::id())
            ->whereDay('created_at', '=', date("d"))
            ->where('type', Common::MINUTES['thirty'])
            ->where('judge', Common::JUDGE['loser'])
            ->get()->count();

        }

       
        // dd($fif , $thi);

        return view('timer.history', compact('date', 'fifteen', 'fifCount', 'fifWinCount', 'fifLoseCount', 'thirty', 'thiCount', 'thiWinCount','thiLoseCount'));
    }

    public function detail($id){
        $CommentDetail = TimerHistory::where('user_id', Auth::id())
        ->where('id', $id )
        ->first();

        // dd($CommentDetail);

        return view('timer.detail', compact('CommentDetail'));

    }

    public function rank(Request $request){

        $date = $request->input('date') ?? 'year';

        if($date === 'year'){
            $fifSort = 'fif_all';
            $thiSort = 'thi_all';
        } else if($date === 'month'){
            $fifSort = 'fif_month';
            $thiSort = 'thi_month';
        } else if($date === 'day'){
            $fifSort = 'fif_day';
            $thiSort = 'thi_day';
        }

        $fifData = Ranking::with('user','profile', 'image')
        ->orderBy( $fifSort , 'desc')
        ->get()->toArray();

        $thiData = Ranking::with('user','profile', 'image')
        ->orderBy( $thiSort, 'desc')
        ->get()->toArray();

        $fifOneToThree = array_slice($fifData, 0, 3);
        $fifFourToTwelve = array_slice($fifData, 3, 7);

        $thiOneToThree = array_slice($thiData, 0, 3);
        $thiFourToTwelve = array_slice($thiData, 3, 7);



        return view('timer.rank', compact('date', 'fifOneToThree', 'fifFourToTwelve', 'thiOneToThree', 'thiFourToTwelve'));
    }

    public function show($id){

        $user = User::with('profile','image','timerHistory', 'menter')->findOrFail($id);

        if($id == Auth::id()){
            return view('user.profile', compact('user'));
        }
            return view('timer.other-profile', compact('user'));

    }
}
