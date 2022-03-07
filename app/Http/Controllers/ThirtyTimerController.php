<?php

namespace App\Http\Controllers;

use Throwable;
use App\Mail\MenterMail;
use App\Models\Menter;
use Illuminate\Http\Request;
use App\Models\TimerHistory;
use App\Models\User;
use App\Services\RankingService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ThirtyTimerController extends Controller
{
    public function index()
    {
        // メンター情報の取得
        $menter = Menter::where('user_id', Auth::id())->first();
        if (is_null($menter)) {
            $menter = new Menter();
            $menter->user_id = Auth::id();
            $menter->m_name = '';
            $menter->m_email = '';
        }


        return view('timer.thi-index', compact('menter'));
    }

    public function record(Request $request)
    {

        $is_success = true;
        $mail_success = false;

        try {
            DB::transaction(function () use ($request) {

                //メンターにメール送信
                // dd($request->m_name, $request->m_email, $request->comment, $request->menter_checkbox);
                if (isset($request->menter_checkbox)) {
                    $request->validate([
                        'm_name' => ['required', 'string'],
                        'm_email' => ['required', 'email'],
                        'comment' => ['required', 'string'],
                    ]);

                    //メール送信機能
                }

                TimerHistory::create([
                    'user_id' => Auth::id(),
                    'type' => $request->type,
                    'judge' => $request->judge,
                    'comment' => $request->comment,
                ]);

                RankingService::rank();
            }, 2);
        } catch (Throwable $e) {
            $is_success = false;
            Log::error($e);
            throw $e;
        }

        if($is_success){
            if ($request->menter_checkbox == '1') {
                $request->validate([
                    'm_name' => ['required', 'string'],
                    'm_email' => ['required', 'email'],
                    'comment' => ['required', 'string'],
                ]);
                
                //メール送信機能
                $user = User::findOrFail(Auth::id());
                Mail::to($request->m_email)->send(new MenterMail($user->name, $request->m_name, $request->type, $request->judge, $request->comment));
                $mail_success = true;
            }
        }

        $menter = Menter::where('user_id', Auth::id())->first();

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
