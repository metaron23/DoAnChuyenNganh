<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ChangePassMail extends Mailable
{
    use Queueable;
    use SerializesModels;

    public $fullname;
    public $link;

    public function __construct($fullname, $link)
    {
        $this->fullname =   $fullname;
        $this->link     =   $link;
    }

    public function build()
    {
        return $this->subject('Kích hoạt tài khoản')->view('mail.changePass', [
            'link'      =>  $this->link,
            'full_name' =>  $this->fullname,
        ]);
    }
}
