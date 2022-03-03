<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TimerHistory;
use Illuminate\Support\Facades\Auth;

class FifteenTimerController extends Controller
{
   
    public function index()
    {
        // dd("15分タイマーでやんす");

        return view('timer.fif-index');
    }

    public function record(Request $request)
    {
        // dd($request);

        TimerHistory::create([
            'user_id' => Auth::id(),
            'type' => $request->type,
            'judge' => $request->judge,
            'comment' => $request->comment,
        ]);

       

        return view('timer.fif-index');
    }

}
