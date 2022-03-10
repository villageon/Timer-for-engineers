<?php

namespace App\Providers;

use App\Repository\HistoryRepository\HistoryRepository;
use App\Repository\HistoryRepository\HistoryRepositoryInterface;
use Illuminate\Support\ServiceProvider;
use App\Repository\UserRepository\UserRepositoryInterface;
use App\Repository\UserRepository\UserRepository;
use App\Repository\MenterRepository\MenterRepositoryInterface;
use App\Repository\MenterRepository\MenterRepository;
use App\Repository\RankingRepository\RankingRepository;
use App\Repository\RankingRepository\RankingRepositoryInterface;
use App\Repository\TimerRepository\TimerDayRepository;
use App\Repository\TimerRepository\TimerDayRepositoryInterface;
use App\Repository\TimerRepository\TimerMonthRepository;
use App\Repository\TimerRepository\TimerMonthRepositoryInterface;
use App\Repository\TimerRepository\TimerYearRepository;
use App\Repository\TimerRepository\TimerYearRepositoryInterface;
use App\Services\HistoryService;

class RepositoryServiceProvider extends ServiceProvider
{
   
    public function register()
    {
        $this->app->bind(
            UserRepositoryInterface::class, UserRepository::class
        );

        $this->app->bind(
            MenterRepositoryInterface::class, MenterRepository::class
        );

        $this->app->bind(
            TimerYearRepositoryInterface::class, TimerYearRepository::class
        );

        $this->app->bind(
            TimerMonthRepositoryInterface::class, TimerMonthRepository::class
        );

        $this->app->bind(
            TimerDayRepositoryInterface::class, TimerDayRepository::class
        );

        $this->app->bind(
            HistoryRepositoryInterface::class, HistoryRepository::class
        );

        $this->app->bind(
            RankingRepositoryInterface::class, RankingRepository::class
        );

        $this->app->bind(
            'HistoryService', HistoryService::class
        );
    }

    
    public function boot()
    {
        //
    }
}