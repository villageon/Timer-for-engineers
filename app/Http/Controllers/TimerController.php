<?php

namespace App\Http\Controllers;

use App\Services\HistoryService;
use App\Services\RankingService;
use App\Repository\HistoryRepository\HistoryRepositoryInterface;
use App\Repository\UserRepository\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TimerController extends Controller
{
    private $userRepository;
    
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function history(Request $request, HistoryService $historyService){

        $date = $request->input('date') ?? 'year';
        list($date, $fifteen, $fifCount, $fifWinCount, $fifLoseCount, $thirty, $thiCount, $thiWinCount, $thiLoseCount) = $historyService->getHistory($date, Auth::id());

        return view('timer.history', compact('date', 'fifteen', 'fifCount', 'fifWinCount', 'fifLoseCount', 'thirty', 'thiCount', 'thiWinCount','thiLoseCount'));
    }

    public function detail($id, HistoryRepositoryInterface $historyRepository){

        $CommentDetail = $historyRepository->getComment($id, Auth::id());

        return view('timer.detail', compact('CommentDetail'));

    }

    public function rank(Request $request,  RankingService $rankingService){

        list($date, $fifOneToThree, $fifFourToTwelve, $thiOneToThree, $thiFourToTwelve) = $rankingService->sort($request);

        return view('timer.rank', compact('date', 'fifOneToThree', 'fifFourToTwelve', 'thiOneToThree', 'thiFourToTwelve'));
    }

    public function show($id){

        $user = $this->userRepository->getUser($id);

        if($id == Auth::id()){
            return view('user.profile', compact('user'));
        }
            return view('timer.other-profile', compact('user'));

    }
}
