<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class QRCodeMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user_id;

    /**
     * Create a new message instance.
     *
     * @param array $user_id
     */
    public function __construct($user_id)
    {
        $this->user_id = $user_id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Your QR Code')
                    ->view('emails.qr-code')
                    ->with('user_id', $this->user_id);
    }
}
