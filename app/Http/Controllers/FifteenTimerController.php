<?php

namespace App\Http\Controllers;

use Throwable;
use App\Models\Menter;
use App\Models\TimerHistory;
use App\Models\User;
use App\Jobs\SendMenterMail;
use App\Services\MenterService;
use App\Services\RankingService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class FifteenTimerController extends Controller
{

    public function index(MenterService $menterService)
    {
        // メンター情報の取得
        $menter = $menterService->updateMenter(Auth::id());

        return view('timer.fif-index', compact('menter'));
    }

    public function record(Request $request)
    {
        $is_success = true;
        $mail_success = false;

        try {
            DB::transaction(function () use ($request) {

                // dd($request->m_name, $request->m_email, $request->comment, $request->menter_checkbox);
                
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
                
                // //メールを同期的に送信
                // $user = User::findOrFail(Auth::id());
                // Mail::to($request->m_email)->send(new MenterMail($user->name, $request->m_name, $request->type, $request->judge, $request->comment));
                // $mail_success = true;

                //メールを非同期に送信
                $user = User::findOrFail(Auth::id());
                SendMenterMail::dispatch($user, $request->all());
                $mail_success = true;

            }
        }

        $menter = Menter::where('user_id', Auth::id())->first();

        if ($is_success && $mail_success) {
            return redirect()->route('fif-timer.index')
                ->with(compact('menter'))
                ->with(
                    [
                        'message' => '結果を記録し、メンターにメールを送信しました。',
                        'status' => 'info',
                    ],
                );
        } else if($is_success && !$mail_success){
            return redirect()->route('fif-timer.index')
                ->with(compact('menter'))
                ->with(
                    [
                        'message' => '結果を記録しました。',
                        'status' => 'info',
                    ],
                );
            } else if(!$is_success || !$mail_success){
                return redirect()->route('fif-timer.index')
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
