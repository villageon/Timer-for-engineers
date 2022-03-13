<?php

namespace App\Http\Controllers;

use App\Services\MenterService;
use App\Services\TimerService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ThirtyTimerController extends Controller
{
    private $menterService;

    public function __construct(MenterService $menterService)
    {
        $this->menterService = $menterService;
    }

    public function index()
    {
        // メンター情報の取得
        $menter = $this->menterService->updateMenter(Auth::id());

        return view('timer.thi-index', compact('menter'));
    }

    public function record(Request $request, TimerService $timerService)
    {
        list($is_success, $mail_success, $menter) = $timerService->timer($request);

        if ($is_success && $mail_success) {
            return redirect()->route('thi-timer.index')
                ->with(compact('menter'))
                ->with(
                    [
                        'message' => '結果を記録し、メンターにメールを送信しました。',
                        'status' => 'info',
                    ],
                );
        } else if($is_success && !$mail_success){
            return redirect()->route('thi-timer.index')
                ->with(compact('menter'))
                ->with(
                    [
                        'message' => '結果を記録しました。',
                        'status' => 'info',
                    ],
                );
            } else if(!$is_success || !$mail_success){
                return redirect()->route('thi-timer.index')
                    ->with(compact('menter'))
                    ->with(
                        [
                            'message' => '結果を記録できませんでした。',
                            'status' => 'alert',
                        ],
                    );
            }
    }
}
