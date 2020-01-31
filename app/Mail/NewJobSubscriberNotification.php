<?php

namespace App\Mail;

use App\newsletter;
use App\PostedJob;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewJobSubscriberNotification extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $jobseeker;
    public $job;
    public function __construct(newsletter $jobseeker, PostedJob $job)
    {
        $this->jobseeker = $jobseeker;
        $this->job = $job;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mails.notification.NewJobSubscriber')->from('no-replay@macroword.co.in')->subject("Job-Alert - Openings for ".$this->job->JobTitle);
    }
}
