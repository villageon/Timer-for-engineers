<?php

namespace App\Repository\TimerRepository;

use App\Constants\Common;
use App\Models\TimerHistory;
use App\Repository\TimerRepository\TimerDayRepositoryInterface;

class TimerDayRepository implements TimerDayRepositoryInterface{

    public function getFifteen($userId){

        return TimerHistory::where('user_id', $userId)
        ->whereDay('created_at', '=', date("d"))
        ->where('type', Common::MINUTES['fifteen'] )
        ->orderBy('created_at', 'desc')
        ->paginate(3);
    }

    public function getFifCount($userId){

        return TimerHistory::where('user_id', $userId)
        ->whereDay('created_at', '=', date("d"))
        ->where('type', Common::MINUTES['fifteen'])
        ->get()->count();
    }

    public function getFifWinCount($userId){

        return TimerHistory::where('user_id', $userId)
        ->whereDay('created_at', '=', date("d"))
        ->where('type',  Common::MINUTES['fifteen'])
        ->where('judge', Common::JUDGE['winner'])
        ->get()->count();
    }

    public function getFifLoseCount($userId){

        return  TimerHistory::where('user_id', $userId)
        ->whereDay('created_at', '=', date("d"))
        ->where('type', Common::MINUTES['fifteen'])
        ->where('judge', Common::JUDGE['loser'])
        ->get()->count();
    }

    public function getThirty($userId){
        return  TimerHistory::where('user_id', $userId)
        ->whereDay('created_at', '=', date("d"))
        ->where('type',  Common::MINUTES['thirty'])
        ->orderBy('created_at', 'desc')
        ->paginate(3);
    }

    public function getThiCount($userId){

        return TimerHistory::where('user_id', $userId)
        ->whereDay('created_at', '=', date("d"))
        ->where('type',  Common::MINUTES['thirty'])
        ->get()->count();
    }

    public function getThiWinCount($userId){

        return TimerHistory::where('user_id', $userId)
        ->whereDay('created_at', '=', date("d"))
        ->where('type', Common::MINUTES['thirty'])
        ->where('judge', Common::JUDGE['winner'])
        ->get()->count();
    }

    public function getThiLoseCount($userId){

        return  TimerHistory::where('user_id', $userId)
        ->whereDay('created_at', '=', date("d"))
        ->where('type', Common::MINUTES['thirty'])
        ->where('judge', Common::JUDGE['loser'])
        ->get()->count();
    }
}