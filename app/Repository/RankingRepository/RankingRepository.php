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

    public function saveRanking($existedUser, $fifAllPer, $fifMonthPer, $fifDayPer, $thiAllPer, $thiMonthPer, $thiDayPer){
        return $existedUser->fif_all = $fifAllPer;
        $existedUser->fif_month = $fifMonthPer;
        $existedUser->fif_day = $fifDayPer;
        $existedUser->thi_all = $thiAllPer;
        $existedUser->thi_month = $thiMonthPer;
        $existedUser->thi_day = $thiDayPer;
        $existedUser->save();
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