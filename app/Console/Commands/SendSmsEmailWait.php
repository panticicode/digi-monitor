<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Campaign;
use App\Notifications\Templates\Email as SendEmailNotification;
use App\Mail\Templates\SendSmsEmail;

class SendSmsEmailWait extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:process';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send sms or email waiting';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $basic  = new \Nexmo\Client\Credentials\Basic(env('NEXMO_KEY'),env('NEXMO_SECRET'));
        $client = new \Nexmo\Client($basic);

        $campaigns = Campaign::all();

        foreach ($campaigns as $campaign) {
            $members = $campaign->getGroupmember();
            $template = $campaign->getTemplate;
        
            if(!$campaign->is_send) {
                $count = 0;
                if($campaign->now == now() || $campaign->now > now()) {
                    if($campaign->getTemplate->type == 'sms') {
                        foreach ($members->get() as $member) {
                            if($member->getMember->phone) {
                                $count += 1;
                            }
                        }
                        if($count*0.025*100 == $campaign->total) {
                            foreach ($members->get() as $member) {

                                $phoneUtil = \libphonenumber\PhoneNumberUtil::getInstance();
    
                                try {
                                    $swissNumberProto = $phoneUtil->parse($member->getMember->phone, $member->getMember->country);
                                } catch (\libphonenumber\NumberParseException $e) {
                                }
                              
                                try {  
                                    $message = $client->message()->send([
                                        'to' => $phoneUtil->format($swissNumberProto, \libphonenumber\PhoneNumberFormat::E164),
                                        'from' => 'DIGI_MONITOR',
                                        'text' => $template->content
                                    ]);
                                } catch(\Exception $e) {
                                }
                            }
                     
                            $campaign->is_send = true;
                            $campaign->update();
                        } else {
                            $campaign->delete();
                        }
                    }
                    if($campaign->getTemplate->type == 'email') {
                        foreach ($members->get() as $member) {
                            try {  
                                \Mail::to($member->getMember->email)
                                ->later(now()->addMinutes(10), new SendSmsEmail($template));
                            } catch(\Exception $e) {
                            }
                        }
        
                        $campaign->is_send = true;
                        $campaign->update();
                    }
                }
            }
        }
    }
}