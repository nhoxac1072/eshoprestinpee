<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;

use Illuminate\Queue\SerializesModels;

class BillOrderMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($re)
    {
        $this->data = $re;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Thanks for buying')->markdown('mail_template',['data'=>$this->data]);
    }
}
