<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MenterMail extends Mailable
{
    use Queueable, SerializesModels;

    public $username;
    public $m_name;
    public $type;
    public $judge;
    public $comment;
    
    public function __construct($username, $m_name, $type, $judge, $comment)
    {
        $this->username = $username;
        $this->m_name = $m_name;
        $this->type = $type;
        $this->judge = $judge;
        $this->comment = $comment;
    }

    public function build()
    {
        return $this->subject('タイムアタックの結果')
        ->view('emails.menter');
    }
}
