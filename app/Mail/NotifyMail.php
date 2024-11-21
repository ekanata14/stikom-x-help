<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotifyMail extends Mailable
{
    use Queueable, SerializesModels;

    public $invoice_id;

    /**
     * Create a new message instance.
     *
     * @param array $invoice_id
     */
    public function __construct($invoice_id)
    {
        $this->invoice_id = $invoice_id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Please Upload Your Payment Receipt')
                    ->view('emails.upload-receipt')
                    ->with('invoice_id', $this->invoice_id);
    }
}
