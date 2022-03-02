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

            $total = 'all';

            $fifteen = TimerHistory::where('user_id', Auth::id())
            ->where('type', Common::MINUTES['fifteen'] )
            ->paginate(3);
    
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
            ->paginate(3);
    
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
    
            return view('timer.history', compact('total','fifteen', 'fifCount', 'fifWinCount', 'fifLoseCount', 'thirty', 'thiCount', 'thiWinCount','thiLoseCount'));
        }



    public function total(Request $request){
        if($request->total == 'month'){

            $total = 'month';

            $fifteen = TimerHistory::where('user_id', Auth::id())
            ->whereMonth('created_at', date("m"))
            ->where('type', Common::MINUTES['fifteen'] )
            ->paginate(3);
    
            $fifCount = TimerHistory::where('user_id', Auth::id())
            ->whereMonth('created_at', date("m"))
            ->where('type', Common::MINUTES['fifteen'])
            ->get()->count();
    
            $fifWinCount = TimerHistory::where('user_id', Auth::id())
            ->whereMonth('created_at', date("m"))
            ->where('type',  Common::MINUTES['fifteen'])
            ->where('judge', Common::JUDGE['winner'])
            ->get()->count();
    
            $fifLoseCount = TimerHistory::where('user_id', Auth::id())
            ->whereMonth('created_at', date("m"))
            ->where('type', Common::MINUTES['fifteen'])
            ->where('judge', Common::JUDGE['loser'])
            ->get()->count();
    
            $thirty = TimerHistory::where('user_id', Auth::id())
            ->whereMonth('created_at', date("m"))
            ->where('type',  Common::MINUTES['thirty'])
            ->paginate(3);
    
            $thiCount = TimerHistory::where('user_id', Auth::id())
            ->whereMonth('created_at', date("m"))
            ->where('type',  Common::MINUTES['thirty'])
            ->get()->count();
    
            $thiWinCount = TimerHistory::where('user_id', Auth::id())
            ->whereMonth('created_at', date("m"))
            ->where('type', Common::MINUTES['thirty'])
            ->where('judge', Common::JUDGE['winner'])
            ->get()->count();
    
            $thiLoseCount = TimerHistory::where('user_id', Auth::id())
            ->whereMonth('created_at', 3)
            ->where('type', Common::MINUTES['thirty'])
            ->where('judge', Common::JUDGE['loser'])
            ->get()->count();

            } elseif($request->total == 'day') {

                $total = 'day';

                $fifteen = TimerHistory::where('user_id', Auth::id())
                ->whereMonth('created_at', date("d"))
                ->where('type', Common::MINUTES['fifteen'] )
                ->paginate(3);
        
                $fifCount = TimerHistory::where('user_id', Auth::id())
                ->whereMonth('created_at', date("d"))
                ->where('type', Common::MINUTES['fifteen'])
                ->get()->count();
        
                $fifWinCount = TimerHistory::where('user_id', Auth::id())
                ->whereMonth('created_at', date("d"))
                ->where('type',  Common::MINUTES['fifteen'])
                ->where('judge', Common::JUDGE['winner'])
                ->get()->count();
        
                $fifLoseCount = TimerHistory::where('user_id', Auth::id())
                ->whereMonth('created_at', date("d"))
                ->where('type', Common::MINUTES['fifteen'])
                ->where('judge', Common::JUDGE['loser'])
                ->get()->count();
        
                $thirty = TimerHistory::where('user_id', Auth::id())
                ->whereMonth('created_at', date("d"))
                ->where('type',  Common::MINUTES['thirty'])
                ->paginate(3);
        
                $thiCount = TimerHistory::where('user_id', Auth::id())
                ->whereMonth('created_at', date("d"))
                ->where('type',  Common::MINUTES['thirty'])
                ->get()->count();
        
                $thiWinCount = TimerHistory::where('user_id', Auth::id())
                ->whereMonth('created_at', date("d"))
                ->where('type', Common::MINUTES['thirty'])
                ->where('judge', Common::JUDGE['winner'])
                ->get()->count();
        
                $thiLoseCount = TimerHistory::where('user_id', Auth::id())
                ->whereMonth('created_at', date("d"))
                ->where('type', Common::MINUTES['thirty'])
                ->where('judge', Common::JUDGE['loser'])
                ->get()->count();
    
            } 

        return view('timer.history', compact('total','fifteen', 'fifCount', 'fifWinCount', 'fifLoseCount', 'thirty', 'thiCount', 'thiWinCount','thiLoseCount'));

    }

    public function detail($id){
        $CommentDetail = TimerHistory::where('user_id', Auth::id())
        ->where('id', $id )
        ->first();

        // dd($CommentDetail);

        return view('timer.detail', compact('CommentDetail'));

    }
}
