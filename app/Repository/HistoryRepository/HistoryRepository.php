<?php

namespace App\Repository\HistoryRepository;

use App\Repository\HistoryRepository\HistoryRepositoryInterface;
use App\Models\TimerHistory;

class HistoryRepository implements HistoryRepositoryInterface{
    
    public function getComment($id, $userId){

        return TimerHistory::where('user_id', $userId)
        ->where('id', $id )
        ->first();
    }
    
}