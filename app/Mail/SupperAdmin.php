<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;

class SupperAdmin extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($params)
    {
        $this->user = $params;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->user = $this->user->getMembers()->whereMonth('date_of_birth', '=', date('m', strtotime('+1 month')))->get();
        
        if (count($this->user)) {
            return $this->subject('The member have birthdate on '. date('Y-m', strtotime('+1 month')))
            ->markdown('dashboard.emails.admin', [
                'date' => date('Y-m', strtotime('+1 month')),
                'params' => $this->user
            ]);
        } 
    }
}