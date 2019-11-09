<?php

namespace App\Mail\Templates;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendSmsEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {  
        return $this->from('DigiMonitor@mail.com', 'Digi-Monitor')
			->subject($this->data['subject'])
            ->markdown('dashboard.emails.send-waiting')
            ->with([
                'name'    => $this->data['name'],
				'subject' => $this->data['subject'],
				'content' => $this->data['content'],
                'link'    => 'https://srcadmin.org.za',
            ]);            
			
			
			
			
				
    }
}
