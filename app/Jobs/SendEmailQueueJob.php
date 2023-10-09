<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\SendEmailQueueDemo;
use Mail;

class SendEmailQueueJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $details;



    /**

     * Create a new job instance.

     */

    public function __construct($details)

    {

        $this->details = $details;

    }



    /**

     * Execute the job.

     */

    public function handle(): void

    {

        $email = new SendEmailQueueDemo();

        Mail::to($this->details['email'])->send($email);

    }

}
