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

    public function history(){

            $total = 'year';

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

            // dd($fif , $thi);
    
            return view('timer.history', compact('total','fifteen', 'fifCount', 'fifWinCount', 'fifLoseCount', 'thirty', 'thiCount', 'thiWinCount','thiLoseCount'));
        }



    public function total(Request $request){
        if($request->total == 'month'){

            $total = 'month';

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

            } elseif($request->total == 'day') {

                $total = 'day';

                $fifteen = TimerHistory::where('user_id', Auth::id())
                ->whereDay('created_at',  '=', date("d"))
                ->where('type', Common::MINUTES['fifteen'] )
                ->orderBy('created_at', 'desc')
                ->paginate(3);
        
                $fifCount = TimerHistory::where('user_id', Auth::id())
                ->whereDay('created_at',  '=', date("d"))
                ->where('type', Common::MINUTES['fifteen'])
                ->get()->count();
        
                $fifWinCount = TimerHistory::where('user_id', Auth::id())
                ->whereDay('created_at',  '=', date("d"))
                ->where('type',  Common::MINUTES['fifteen'])
                ->where('judge', Common::JUDGE['winner'])
                ->get()->count();
        
                $fifLoseCount = TimerHistory::where('user_id', Auth::id())
                ->whereDay('created_at',  '=', date("d"))
                ->where('type', Common::MINUTES['fifteen'])
                ->where('judge', Common::JUDGE['loser'])
                ->get()->count();
        
                $thirty = TimerHistory::where('user_id', Auth::id())
                ->whereDay('created_at',  '=', date("d"))
                ->where('type',  Common::MINUTES['thirty'])
                ->orderBy('created_at', 'desc')
                ->paginate(3);
        
                $thiCount = TimerHistory::where('user_id', Auth::id())
                ->whereDay('created_at',  '=', date("d"))
                ->where('type',  Common::MINUTES['thirty'])
                ->get()->count();
        
                $thiWinCount = TimerHistory::where('user_id', Auth::id())
                ->whereDay('created_at',  '=', date("d"))
                ->where('type', Common::MINUTES['thirty'])
                ->where('judge', Common::JUDGE['winner'])
                ->get()->count();
        
                $thiLoseCount = TimerHistory::where('user_id', Auth::id())
                ->whereDay('created_at',  '=', date("d"))
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

    public function rank(){

        $date = 'year';

        $fifData = Ranking::with('user','profile', 'image')
        ->orderBy('fif_all', 'desc')
        ->get()->toArray();

        $thiData = Ranking::with('user','profile', 'image')
        ->orderBy('thi_all', 'desc')
        ->get()->toArray();

        $fifOneToThree = array_slice($fifData, 0, 3);
        $fifFourToTwelve = array_slice($fifData, 3, 9);

        $thiOneToThree = array_slice($thiData, 0, 3);
        $thiFourToTwelve = array_slice($thiData, 3, 9);   

        return view('timer.rank', compact('date', 'fifOneToThree', 'fifFourToTwelve', 'thiOneToThree', 'thiFourToTwelve'));
    }

    public function rankDate(Request $request){

        if($request->date === 'month'){

            $date = 'month';

            $fifData = Ranking::with('user','profile', 'image')
            ->orderBy('fif_month', 'desc')
            ->get()->toArray();
    
            $thiData = Ranking::with('user','profile', 'image')
            ->orderBy('thi_month', 'desc')
            ->get()->toArray();
    
            $fifOneToThree = array_slice($fifData, 0, 3);
            $fifFourToTwelve = array_slice($fifData, 3, 9);
    
            $thiOneToThree = array_slice($thiData, 0, 3);
            $thiFourToTwelve = array_slice($thiData, 3, 9);

        } elseif($request->date === 'day'){

            $date = 'day';

            $fifData = Ranking::with('user','profile', 'image')
            ->orderBy('fif_day', 'desc')
            ->get()->toArray();
    
            $thiData = Ranking::with('user','profile', 'image')
            ->orderBy('thi_day', 'desc')
            ->get()->toArray();
    
            $fifOneToThree = array_slice($fifData, 0, 3);
            $fifFourToTwelve = array_slice($fifData, 3, 9);
    
            $thiOneToThree = array_slice($thiData, 0, 3);
            $thiFourToTwelve = array_slice($thiData, 3, 9);  
            
        }


        return view('timer.rank', compact('date', 'fifOneToThree', 'fifFourToTwelve', 'thiOneToThree', 'thiFourToTwelve'));
    }
}
