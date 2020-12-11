<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Request; 

class SendQuery extends Mailable
{
    use Queueable, SerializesModels;
    public $query;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($query)
    {
        $this->query = $query;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(Request $query)
    {
        return $this->subject(__('New Query'))->view('emails.send_query')->with(['query'=>$this->query]);
    }
}