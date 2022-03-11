<?php

namespace App\Repository\RankingRepository;

interface RankingRepositoryInterface{
    
    public function getRanking($Sort);
    public function getUser($userId);
    public function saveRanking($existedUser, $fifAllPer, $fifMonthPer, $fifDayPer, $thiAllPer, $thiMonthPer, $thiDayPer);
    public function createRanking($userId, $fifAllPer, $fifMonthPer, $fifDayPer, $thiAllPer, $thiMonthPer, $thiDayPer);
}