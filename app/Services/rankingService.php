<?php

namespace App\Services;

use App\Constants\Common;
use App\Models\Ranking;
use App\Models\User;
use App\Models\TimerHistory;
use Illuminate\Support\Facades\Auth;

class RankingService
{
    public static function rank(){

        //以下でrankingsテーブルへ追加していく
        $user = User::with('profile','image','timerHistory')->findOrFail(Auth::id());

        // fifteen計算用変数
        $fifCountAll = TimerHistory::where('user_id', Auth::id())
            ->where('type', Common::MINUTES['fifteen'])
            ->get()->count();
    
        $fifWinCountAll = TimerHistory::where('user_id', Auth::id())
            ->where('type',  Common::MINUTES['fifteen'])
            ->where('judge', Common::JUDGE['winner'])
            ->get()->count();

        $fifCountMonth = TimerHistory::where('user_id', Auth::id())
            ->whereMonth('created_at', '=', date("m"))
            ->where('type', Common::MINUTES['fifteen'])
            ->get()->count();
    
        $fifWinCountMonth = TimerHistory::where('user_id', Auth::id())
            ->whereMonth('created_at', '=', date("m"))
            ->where('type',  Common::MINUTES['fifteen'])
            ->where('judge', Common::JUDGE['winner'])
            ->get()->count();
        
        $fifCountDay = TimerHistory::where('user_id', Auth::id())
            ->whereDay('created_at',  '=', date("d"))
            ->where('type', Common::MINUTES['fifteen'])
            ->get()->count();
    
        $fifWinCountDay = TimerHistory::where('user_id', Auth::id())
            ->whereDay('created_at',  '=', date("d"))
            ->where('type',  Common::MINUTES['fifteen'])
            ->where('judge', Common::JUDGE['winner'])
            ->get()->count();
        
        // thirty計算用変数
        $thiCountAll = TimerHistory::where('user_id', Auth::id())
            ->where('type',  Common::MINUTES['thirty'])
            ->get()->count();
    
        $thiWinCountAll = TimerHistory::where('user_id', Auth::id())
            ->where('type', Common::MINUTES['thirty'])
            ->where('judge', Common::JUDGE['winner'])
            ->get()->count();
        
        $thiCountMonth = TimerHistory::where('user_id', Auth::id())
            ->whereMonth('created_at', '=', date("m"))
            ->where('type',  Common::MINUTES['thirty'])
            ->get()->count();
    
        $thiWinCountMonth = TimerHistory::where('user_id', Auth::id())
            ->whereMonth('created_at', '=', date("m"))
            ->where('type', Common::MINUTES['thirty'])
            ->where('judge', Common::JUDGE['winner'])
            ->get()->count();
        
        $thiCountDay = TimerHistory::where('user_id', Auth::id())
            ->whereDay('created_at',  '=', date("d"))
            ->where('type',  Common::MINUTES['thirty'])
            ->get()->count();
    
        $thiWinCountDay = TimerHistory::where('user_id', Auth::id())
            ->whereDay('created_at',  '=', date("d"))
            ->where('type', Common::MINUTES['thirty'])
            ->where('judge', Common::JUDGE['winner'])
            ->get()->count();

        //fifteen計算スペース
        $fifAllPer = $fifCountAll == 0 ? '' : round($fifWinCountAll / $fifCountAll, 3) * 100;
        $fifMonthPer = $fifCountMonth == 0 ? '': round($fifWinCountMonth / $fifCountMonth, 3) * 100;
        $fifDayPer = $fifCountDay == 0 ? '' : round($fifWinCountDay / $fifCountDay, 3) * 100;

        //thirty計算スペース
        $thiAllPer = $thiCountAll == 0 ? '' : round($thiWinCountAll / $thiCountAll, 3) * 100;
        $thiMonthPer = $thiCountMonth == 0 ? '' : round($thiWinCountMonth / $thiCountMonth, 3) * 100;
        $thiDayPer = $thiCountDay == 0 ? '' : round($thiWinCountDay / $thiCountDay, 3) * 100;

        
        Ranking::create([
            'user_id' => Auth::id(),
            'fif_all' => $fifAllPer,
            'fif_month' => $fifMonthPer,
            'fif_day' => $fifDayPer,
            'thi_all' => $thiAllPer,
            'thi_month' => $thiMonthPer,
            'thi_day' => $thiDayPer,
        ]);

    }
    
}