<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ActiveCustomerMail extends Mailable
{
    use Queueable, SerializesModels;

    public $fullname;
    public $link;

    public function __construct($fullname, $link)
    {
        $this->fullname =   $fullname;
        $this->link     =   $link;
    }

    public function build()
    {
        return $this->subject('Kích hoạt tài khoản')->view('mail.index',[
            'link'      =>  $this->link,
            'full_name' =>  $this->fullname,
        ]);
    }
}
