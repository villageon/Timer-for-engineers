<?php

namespace App\Services;

use Throwable;
use App\Models\TimerHistory;
use App\Models\User;
use App\Jobs\SendMenterMail;
use App\Repository\HistoryRepository\HistoryRepositoryInterface;
use App\Repository\MenterRepository\MenterRepositoryInterface;
use App\Repository\UserRepository\UserRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TimerService
{
    private $rankingService;
    private $menterRepository;
    private $historyRepository;

    public function __construct(RankingService $rankingService, MenterRepositoryInterface $menterRepository,  HistoryRepositoryInterface $historyRepository, UserRepositoryInterface $userRepository)
    {
        $this->rankingService = $rankingService;
        $this->menterRepository = $menterRepository;
        $this->historyRepository = $historyRepository;
        $this->userRepository = $userRepository;
    }

    public function timer($request)
    {
        $is_success = true;
        $mail_success = false;

        try {
            DB::transaction(function () use ($request) {

                $this->historyRepository->createHistory(Auth::id(), $request);
                $this->rankingService->rank();

            }, 2);
        } catch (Throwable $e) {

            $is_success = false;
            Log::error($e);
            throw $e;
        }

        if ($is_success) {
            if ($request->menter_checkbox == '1') {
                $request->validate([
                    'm_name' => ['required', 'string'],
                    'm_email' => ['required', 'email'],
                    'comment' => ['required', 'string'],
                ]);

                //メールを非同期に送信
                $user = $this->userRepository->getUser(Auth::id());
                SendMenterMail::dispatch($user, $request->all());
                $mail_success = true;
            }
        }

        $menter = $this->menterRepository->getMenter(Auth::id());

        return [$is_success, $mail_success, $menter];

    }
}
