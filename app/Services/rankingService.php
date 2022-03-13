<?php

namespace App\Services;

use App\Models\Ranking;
use App\Repository\HistoryRepository\HistoryRepositoryInterface;
use App\Repository\RankingRepository\RankingRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class RankingService
{
    private $rankingRepository;
    private $historyRepository;

    public function __construct(RankingRepositoryInterface $rankingRepository, HistoryRepositoryInterface $historyRepository)
    {
        $this->rankingRepository = $rankingRepository;
        $this->historyRepository = $historyRepository;
    }

    public function rank(){

        //以下でrankingsテーブルへ追加していく

        // fifteen計算用変数
        $fifCountAll = $this->historyRepository->getYearFif(Auth::id());
        $fifWinCountAll = $this->historyRepository->getYearFifWin(Auth::id());
        $fifCountMonth = $this->historyRepository-> getMonthFif(Auth::id());
        $fifWinCountMonth = $this->historyRepository->getMonthFifWin(Auth::id());
        $fifCountDay = $this->historyRepository->getDayFif(Auth::id());
        $fifWinCountDay = $this->historyRepository->getDayFifWin(Auth::id());
        
        // thirty計算用変数
        $thiCountAll = $this->historyRepository->getYearThi(Auth::id());
        $thiWinCountAll = $this->historyRepository->getYearThiWin(Auth::id());
        $thiCountMonth = $this->historyRepository->getMonthThi(Auth::id());
        $thiWinCountMonth = $this->historyRepository->getMonthThiWin(Auth::id());
        $thiCountDay = $this->historyRepository->getDayThi(Auth::id());
        $thiWinCountDay = $this->historyRepository->getDayThiWin(Auth::id());
    
        //fifteen計算スペース
        $fifAllPer = $fifCountAll == 0 ? '' : round($fifWinCountAll / $fifCountAll, 3) * 100;
        $fifMonthPer = $fifCountMonth == 0 ? '': round($fifWinCountMonth / $fifCountMonth, 3) * 100;
        $fifDayPer = $fifCountDay == 0 ? '' : round($fifWinCountDay / $fifCountDay, 3) * 100;

        //thirty計算スペース
        $thiAllPer = $thiCountAll == 0 ? '' : round($thiWinCountAll / $thiCountAll, 3) * 100;
        $thiMonthPer = $thiCountMonth == 0 ? '' : round($thiWinCountMonth / $thiCountMonth, 3) * 100;
        $thiDayPer = $thiCountDay == 0 ? '' : round($thiWinCountDay / $thiCountDay, 3) * 100;

        //user_idがテーブルに存在する場合は更新、無い場合は新規作成
        $existedUser = $this->rankingRepository->getUser(Auth::id());

        if(isset($existedUser)){

            $this->rankingRepository->saveRanking($existedUser, $fifAllPer, $fifMonthPer, $fifDayPer, $thiAllPer, $thiMonthPer, $thiDayPer);

        } else {

            $this->rankingRepository->createRanking(Auth::id(), $fifAllPer, $fifMonthPer, $fifDayPer, $thiAllPer, $thiMonthPer, $thiDayPer);

        }

    }

    public function sort($request){
        
        $date = $request->input('date') ?? 'year';

        if($date === 'year'){
            $fifSort = 'fif_all';
            $thiSort = 'thi_all';
        } else if($date === 'month'){
            $fifSort = 'fif_month';
            $thiSort = 'thi_month';
        } else if($date === 'day'){
            $fifSort = 'fif_day';
            $thiSort = 'thi_day';
        }

        $fifData = $this->rankingRepository->getRanking($fifSort);
        $thiData = $this->rankingRepository->getRanking($thiSort);

        $fifOneToThree = array_slice($fifData, 0, 3);
        $fifFourToTwelve = array_slice($fifData, 3, 7);

        $thiOneToThree = array_slice($thiData, 0, 3);
        $thiFourToTwelve = array_slice($thiData, 3, 7);

        return [$date, $fifOneToThree, $fifFourToTwelve, $thiOneToThree, $thiFourToTwelve];
    }
    
}