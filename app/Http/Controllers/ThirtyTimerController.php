<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TimerHistory;
use App\Services\RankingService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Throwable;

class ThirtyTimerController extends Controller
{
    public function index()
    {
        // dd("15分タイマーでやんす");

        return view('timer.thi-index');
    }

    public function record(Request $request)
    {
        try {
            DB::transaction(function () use ($request) {

                TimerHistory::create([
                    'user_id' => Auth::id(),
                    'type' => $request->type,
                    'judge' => $request->judge,
                    'comment' => $request->comment,
                ]);

                RankingService::rank();
            }, 2);
        } catch (Throwable $e) {
            Log::error($e);
            throw $e;
        }

        return view('timer.thi-index');
    }
}
