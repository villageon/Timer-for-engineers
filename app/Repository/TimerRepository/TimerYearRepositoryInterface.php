<?php

namespace App\Repository\TimerRepository;

interface TimerYearRepositoryInterface{
    
    public function getFifteen($userId);
    public function getFifCount($userId);
    public function getFifWinCount($userId);
    public function getFifLoseCount($userId);

    public function getThirty($userId);
    public function getThiCount($userId);
    public function getThiWinCount($userId);
    public function getThiLoseCount($userId);
}