<?php

namespace App\Repository\HistoryRepository;

use App\Constants\Common;
use App\Repository\HistoryRepository\HistoryRepositoryInterface;
use App\Models\TimerHistory;

class HistoryRepository implements HistoryRepositoryInterface
{

    public function getComment($id, $userId)
    {

        return TimerHistory::where('user_id', $userId)
            ->where('id', $id)
            ->first();
    }

    public function getYearFif($userId)
    {
        return TimerHistory::where('user_id', $userId)
            ->whereYear('created_at', '=', date("Y"))
            ->where('type', Common::MINUTES['fifteen'])
            ->get()->count();
    }

    public function getYearFifWin($userId)
    {
        return TimerHistory::where('user_id', $userId)
            ->whereYear('created_at', '=', date("Y"))
            ->where('type',  Common::MINUTES['fifteen'])
            ->where('judge', Common::JUDGE['winner'])
            ->get()->count();
    }

    public function getMonthFif($userId)
    {
        return TimerHistory::where('user_id', $userId)
            ->whereMonth('created_at', '=', date("m"))
            ->where('type', Common::MINUTES['fifteen'])
            ->get()->count();
    }
    public function getMonthFifWin($userId)
    {
        return TimerHistory::where('user_id', $userId)
            ->whereMonth('created_at', '=', date("m"))
            ->where('type',  Common::MINUTES['fifteen'])
            ->where('judge', Common::JUDGE['winner'])
            ->get()->count();
    }
    public function getDayFif($userId)
    {
        return TimerHistory::where('user_id', $userId)
            ->whereDay('created_at',  '=', date("d"))
            ->where('type', Common::MINUTES['fifteen'])
            ->get()->count();
    }
    public function getDayFifWin($userId)
    {
        return TimerHistory::where('user_id', $userId)
            ->whereDay('created_at',  '=', date("d"))
            ->where('type',  Common::MINUTES['fifteen'])
            ->where('judge', Common::JUDGE['winner'])
            ->get()->count();
    }

    public function getYearThi($userId)
    {
        return TimerHistory::where('user_id', $userId)
            ->whereYear('created_at', '=', date("Y"))
            ->where('type',  Common::MINUTES['thirty'])
            ->get()->count();
    }
    public function getYearThiWin($userId)
    {
        return TimerHistory::where('user_id', $userId)
            ->whereYear('created_at', '=', date("Y"))
            ->where('type', Common::MINUTES['thirty'])
            ->where('judge', Common::JUDGE['winner'])
            ->get()->count();
    }
    public function getMonthThi($userId)
    {
        return TimerHistory::where('user_id', $userId)
            ->whereMonth('created_at', '=', date("m"))
            ->where('type',  Common::MINUTES['thirty'])
            ->get()->count();
    }
    public function getMonthThiWin($userId)
    {
        return TimerHistory::where('user_id', $userId)
            ->whereMonth('created_at', '=', date("m"))
            ->where('type', Common::MINUTES['thirty'])
            ->where('judge', Common::JUDGE['winner'])
            ->get()->count();
    }
    public function getDayThi($userId)
    {
        return TimerHistory::where('user_id', $userId)
            ->whereDay('created_at',  '=', date("d"))
            ->where('type',  Common::MINUTES['thirty'])
            ->get()->count();
    }
    public function getDayThiWin($userId)
    {
        return TimerHistory::where('user_id', $userId)
            ->whereDay('created_at',  '=', date("d"))
            ->where('type', Common::MINUTES['thirty'])
            ->where('judge', Common::JUDGE['winner'])
            ->get()->count();
    }

    public function createHistory($userId, $request)
    {
        TimerHistory::create([
            'user_id' => $userId,
            'type' => $request->type,
            'judge' => $request->judge,
            'comment' => $request->comment,
        ]);
    }
}
