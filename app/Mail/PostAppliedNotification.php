<?php

namespace App\Mail;

use App\Jobseeker;
use App\PostedJob;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PostAppliedNotification extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $post;
    public $jobseeker;
    public function __construct(PostedJob $post, Jobseeker $jobseeker)
    {
        $this->post = $post;
        $this->jobseeker = $jobseeker;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.PostAppliedNotification')->from('no-replay@macroword.co.in')->subject($this->jobseeker->name." Applied for ".$this->post->JobTitle);
    }
}
