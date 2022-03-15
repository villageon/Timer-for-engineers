<?php

namespace App\Repository\RankingRepository;

use App\Repository\RankingRepository\RankingRepositoryInterface;
use App\Models\Ranking;

class RankingRepository implements RankingRepositoryInterface{
    
    public function getRanking($Sort){
        
        return Ranking::with('user','profile', 'image')
        ->orderBy($Sort , 'desc')
        ->get()->toArray();
    }

    public function getUser($userId){
        return Ranking::where('user_id', $userId)->first();
    }

    public function saveRanking($user, $fifAllPer, $fifMonthPer, $fifDayPer, $thiAllPer, $thiMonthPer, $thiDayPer){
        $user->fif_all = $fifAllPer;
        $user->fif_month = $fifMonthPer;
        $user->fif_day = $fifDayPer;
        $user->thi_all = $thiAllPer;
        $user->thi_month = $thiMonthPer;
        $user->thi_day = $thiDayPer;
        $user->save();
    }

    public function createRanking($userId, $fifAllPer, $fifMonthPer, $fifDayPer, $thiAllPer, $thiMonthPer, $thiDayPer){
        Ranking::create([
            'user_id' => $userId,
            'fif_all' => $fifAllPer,
            'fif_month' => $fifMonthPer,
            'fif_day' => $fifDayPer,
            'thi_all' => $thiAllPer,
            'thi_month' => $thiMonthPer,
            'thi_day' => $thiDayPer,
        ]);
    }
}