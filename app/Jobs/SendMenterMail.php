<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\MenterMail;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class SendMenterMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $user;
    public $inputs;
    
    public function __construct(User $user, array $inputs)
    {
        $this->user = $user;
        $this->inputs = $inputs;
    }

    public function handle()
    {
        //メール送信機能
        Mail::to($this->inputs['m_email'])
        ->send(new MenterMail($this->user->name, $this->inputs['m_name'], $this->inputs['type'], $this->inputs['judge'], $this->inputs['comment']));
    }
}
