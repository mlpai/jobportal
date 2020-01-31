<?php

namespace App\Mail;

use App\Jobseeker;
use App\PostedJob;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewJobNotification extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $jobseeker;
    public $job;
    public function __construct(Jobseeker $jobseeker, PostedJob $job)
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
        return $this->markdown('mails.notification.NewJob')->from('no-replay@macroword.co.in')->subject("Job-Alert - Openings for ".$this->job->JobTitle);
    }
}
