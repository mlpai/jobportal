<?php

namespace App\Mail;

use App\newsletter as AppNewsletter;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class newsletter extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $email;
    public function __construct(AppNewsletter $news)
    {
        $this->email = $news->email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.newsletter')->from('no-replay@macroword.co.in')->subject("Thanks for Susbcribing our Newsletter");
    }
}
