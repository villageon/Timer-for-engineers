<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Ranking;
use App\Repository\HistoryRepository\HistoryRepositoryInterface;
use App\Services\HistoryService;

class TimerController extends Controller
{
    public $historyService;
    public $historyRepository;

    public function __construct(HistoryService $historyService, HistoryRepositoryInterface $historyRepository)
    {
        $this->historyService = $historyService;
        $this->historyRepository = $historyRepository;
    }

    public function history(Request $request){

        $date = $request->input('date') ?? 'year';
        list($date, $fifteen, $fifCount, $fifWinCount, $fifLoseCount, $thirty, $thiCount, $thiWinCount, $thiLoseCount) = $this->historyService->getHistory($date, Auth::id());

        return view('timer.history', compact('date', 'fifteen', 'fifCount', 'fifWinCount', 'fifLoseCount', 'thirty', 'thiCount', 'thiWinCount','thiLoseCount'));
    }

    public function detail($id){

        $CommentDetail = $this->historyRepository->getComment($id, Auth::id());

        // dd($CommentDetail);

        return view('timer.detail', compact('CommentDetail'));

    }

    public function rank(Request $request){

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

        $fifData = Ranking::with('user','profile', 'image')
        ->orderBy( $fifSort , 'desc')
        ->get()->toArray();

        $thiData = Ranking::with('user','profile', 'image')
        ->orderBy( $thiSort, 'desc')
        ->get()->toArray();

        $fifOneToThree = array_slice($fifData, 0, 3);
        $fifFourToTwelve = array_slice($fifData, 3, 7);

        $thiOneToThree = array_slice($thiData, 0, 3);
        $thiFourToTwelve = array_slice($thiData, 3, 7);



        return view('timer.rank', compact('date', 'fifOneToThree', 'fifFourToTwelve', 'thiOneToThree', 'thiFourToTwelve'));
    }

    public function show($id){

        $user = User::with('profile','image','timerHistory', 'menter')->findOrFail($id);

        if($id == Auth::id()){
            return view('user.profile', compact('user'));
        }
            return view('timer.other-profile', compact('user'));

    }
}
