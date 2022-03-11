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
}