<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ConfirmMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($array)
    {
        $this->data = $array;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $data = $this->data;
        return $this->from('chiragkhatri02@gmail.com',$data['title'])->replyTo($data['aemail'],$data['title'])->view('mail.confirm-templete',compact('data'))->subject('Thank You for Your Enquiry');
    }
}
