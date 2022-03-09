<?php

namespace App\Mail;

use App\Models\NewFashion;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewFashions extends Mailable
{
    use Queueable, SerializesModels;

    public $newfashion;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(NewFashion $newfashion)
    {
        $this->newfashion = $newfashion;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        
        return $this->subject('Rosé Shop')
                    ->view('viewfashion.new-mail');
    }
}
