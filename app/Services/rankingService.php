<?php

namespace App\Services;

use App\Constants\Common;
use App\Models\Ranking;
use App\Models\User;
use App\Models\TimerHistory;
use App\Repository\RankingRepository\RankingRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class RankingService
{
    private $rankingRepository;

    public function __construct(RankingRepositoryInterface $rankingRepository)
    {
        $this->rankingRepository = $rankingRepository;
    }

    public static function rank(){

        //以下でrankingsテーブルへ追加していく

        // fifteen計算用変数
        $fifCountAll = TimerHistory::where('user_id', Auth::id())
            ->whereYear('created_at', '=', date("Y"))
            ->where('type', Common::MINUTES['fifteen'])
            ->get()->count();
    
        $fifWinCountAll = TimerHistory::where('user_id', Auth::id())
            ->whereYear('created_at', '=', date("Y"))
            ->where('type',  Common::MINUTES['fifteen'])
            ->where('judge', Common::JUDGE['winner'])
            ->get()->count();

        $fifCountMonth = TimerHistory::where('user_id', Auth::id())
            ->whereMonth('created_at', '=', date("m"))
            ->where('type', Common::MINUTES['fifteen'])
            ->get()->count();
    
        $fifWinCountMonth = TimerHistory::where('user_id', Auth::id())
            ->whereMonth('created_at', '=', date("m"))
            ->where('type',  Common::MINUTES['fifteen'])
            ->where('judge', Common::JUDGE['winner'])
            ->get()->count();
        
        $fifCountDay = TimerHistory::where('user_id', Auth::id())
            ->whereDay('created_at',  '=', date("d"))
            ->where('type', Common::MINUTES['fifteen'])
            ->get()->count();
    
        $fifWinCountDay = TimerHistory::where('user_id', Auth::id())
            ->whereDay('created_at',  '=', date("d"))
            ->where('type',  Common::MINUTES['fifteen'])
            ->where('judge', Common::JUDGE['winner'])
            ->get()->count();
        
        // thirty計算用変数
        $thiCountAll = TimerHistory::where('user_id', Auth::id())
            ->whereYear('created_at', '=', date("Y"))
            ->where('type',  Common::MINUTES['thirty'])
            ->get()->count();
    
        $thiWinCountAll = TimerHistory::where('user_id', Auth::id())
            ->whereYear('created_at', '=', date("Y"))
            ->where('type', Common::MINUTES['thirty'])
            ->where('judge', Common::JUDGE['winner'])
            ->get()->count();
        
        $thiCountMonth = TimerHistory::where('user_id', Auth::id())
            ->whereMonth('created_at', '=', date("m"))
            ->where('type',  Common::MINUTES['thirty'])
            ->get()->count();
    
        $thiWinCountMonth = TimerHistory::where('user_id', Auth::id())
            ->whereMonth('created_at', '=', date("m"))
            ->where('type', Common::MINUTES['thirty'])
            ->where('judge', Common::JUDGE['winner'])
            ->get()->count();
        
        $thiCountDay = TimerHistory::where('user_id', Auth::id())
            ->whereDay('created_at',  '=', date("d"))
            ->where('type',  Common::MINUTES['thirty'])
            ->get()->count();
    
        $thiWinCountDay = TimerHistory::where('user_id', Auth::id())
            ->whereDay('created_at',  '=', date("d"))
            ->where('type', Common::MINUTES['thirty'])
            ->where('judge', Common::JUDGE['winner'])
            ->get()->count();

        //fifteen計算スペース
        $fifAllPer = $fifCountAll == 0 ? '' : round($fifWinCountAll / $fifCountAll, 3) * 100;
        $fifMonthPer = $fifCountMonth == 0 ? '': round($fifWinCountMonth / $fifCountMonth, 3) * 100;
        $fifDayPer = $fifCountDay == 0 ? '' : round($fifWinCountDay / $fifCountDay, 3) * 100;

        //thirty計算スペース
        $thiAllPer = $thiCountAll == 0 ? '' : round($thiWinCountAll / $thiCountAll, 3) * 100;
        $thiMonthPer = $thiCountMonth == 0 ? '' : round($thiWinCountMonth / $thiCountMonth, 3) * 100;
        $thiDayPer = $thiCountDay == 0 ? '' : round($thiWinCountDay / $thiCountDay, 3) * 100;

        //user_idがテーブルに存在する場合は更新、無い場合は新規作成
        $existedUser = Ranking::where('user_id', Auth::id())->first();

        if(isset($existedUser)){

            $existedUser->fif_all = $fifAllPer;
            $existedUser->fif_month = $fifMonthPer;
            $existedUser->fif_day = $fifDayPer;
            $existedUser->thi_all = $thiAllPer;
            $existedUser->thi_month = $thiMonthPer;
            $existedUser->thi_day = $thiDayPer;
            $existedUser->save();

        } else {

            Ranking::create([
                'user_id' => Auth::id(),
                'fif_all' => $fifAllPer,
                'fif_month' => $fifMonthPer,
                'fif_day' => $fifDayPer,
                'thi_all' => $thiAllPer,
                'thi_month' => $thiMonthPer,
                'thi_day' => $thiDayPer,
            ]);

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