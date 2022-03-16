<?php

namespace App\Services;

use App\Models\TimerHistory;
use App\Constants\Common;
use App\Repository\TimerRepository\TimerDayRepositoryInterface;
use App\Repository\TimerRepository\TimerMonthRepositoryInterface;
use App\Repository\TimerRepository\TimerYearRepositoryInterface;

class HistoryService{

    public $timerYearRepository;
    public $timerMonthRepository;
    public $timerDayRepository;

    public function __construct(TimerYearRepositoryInterface $timerYearRepository, TimerMonthRepositoryInterface $timerMonthRepository, TimerDayRepositoryInterface $timerDayRepository)
    {
        $this->timerYearRepository = $timerYearRepository;
        $this->timerMonthRepository = $timerMonthRepository;
        $this->timerDayRepository = $timerDayRepository;
    }

    public function getHistory($date, $userId){

        if($date === 'year'){

            $fifteen = $this->timerYearRepository->getFifteen($userId);
            $fifCount = $this->timerYearRepository->getFifCount($userId);
            $fifWinCount = $this->timerYearRepository->getFifWinCount($userId);
            $fifLoseCount = $this->timerYearRepository->getFifLoseCount($userId);
    
            $thirty = $this->timerYearRepository->getThirty($userId);
            $thiCount = $this->timerYearRepository->getThiCount($userId);
            $thiWinCount = $this->timerYearRepository->getThiWinCount($userId);
            $thiLoseCount = $this->timerYearRepository->getThiLoseCount($userId);
    
        } else if($date === 'month'){
            
            $fifteen = $this->timerMonthRepository->getFifteen($userId);
            $fifCount = $this->timerMonthRepository->getFifCount($userId);
            $fifWinCount = $this->timerMonthRepository->getFifWinCount($userId);
            $fifLoseCount = $this->timerMonthRepository->getFifLoseCount($userId);
    
            $thirty = $this->timerMonthRepository->getThirty($userId);
            $thiCount = $this->timerMonthRepository->getThiCount($userId);
            $thiWinCount = $this->timerMonthRepository->getThiWinCount($userId);
            $thiLoseCount = $this->timerMonthRepository->getThiLoseCount($userId);

        } else if($date === 'day'){

            $fifteen = $this->timerDayRepository->getFifteen($userId);
            $fifCount = $this->timerDayRepository->getFifCount($userId);
            $fifWinCount = $this->timerDayRepository->getFifWinCount($userId);
            $fifLoseCount = $this->timerDayRepository->getFifLoseCount($userId);
    
            $thirty = $this->timerDayRepository->getThirty($userId);
            $thiCount = $this->timerDayRepository->getThiCount($userId);
            $thiWinCount = $this->timerDayRepository->getThiWinCount($userId);
            $thiLoseCount = $this->timerDayRepository->getThiLoseCount($userId);

        }

        return [$date, $fifteen, $fifCount, $fifWinCount, $fifLoseCount, $thirty, $thiCount, $thiWinCount, $thiLoseCount];
    }
}