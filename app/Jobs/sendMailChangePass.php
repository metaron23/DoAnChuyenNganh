<?php

namespace App\Jobs;

use App\Mail\ChangePassMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class sendMailChangePass implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    private $fullname;
    private $link;
    private $mail_to;

    public function __construct($fullname, $link, $mail_to)
    {
        $this->fullname =   $fullname;
        $this->link     =   $link;
        $this->mail_to  =   $mail_to;
    }

    public function handle()
    {
        Mail::to($this->mail_to)->send(new ChangePassMail($this->fullname, $this->link));
    }
}
