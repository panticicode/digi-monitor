<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Campaigns\SendRequest;
use App\Notifications\Templates\Email as SendEmailNotification;
use App\Models\Group;
use App\Models\Template;
use App\Models\Campaign;
use App\Models\Member;
use App\Mail\Templates\SendSmsEmail;
use Illuminate\Support\Facades\Mail;
//use CMText\TextClient;
class CampaignController extends Controller
{
    public function index()
    {
        $campaigns = \Auth::user()->getCampaigns()->OrderBy('now', 'desc')->paginate(5);
        
        return view('dashboard.campaigns.index', [
            'campaigns' => $campaigns
        ]);
    }

    public function getTemplate(Request $request)
    {
        $templates = \Auth::user()->templates()->where('type', $request->type)->get();
        
        return view('dashboard.campaigns.show-template', [
            'templates' => $templates,
            'type' => $request->type
        ]);
    }

    public function destroy(Campaign $campaign)
    {
        if (!$campaign->is_send) {
            if ($campaign->getTemplate->type == 'sms') {
                \Auth::user()->update(['balance' => \Auth::user()->balance += $campaign->total]);
            }
        }
        
        $campaign->delete();

        session()->flash('success', 'You have been deleted campaign');

        return redirect(route('dashboard.campaigns.index'));
    }

    public function send(SendRequest $request)
    {
		// $basic  = new \Nexmo\Client\Credentials\Basic('fb2a7912', 'Td4YCIWdlmhK1S4X');
        // $client = new \Nexmo\Client($basic);
		//$client = new TextClient('0E845632-C291-4892-B664-0E49C81E888D');
        $campaign = new Campaign;

        $group = \Auth::user()->groups()->findOrFail($request->group_id);
		$members = $group->members()->where('phone', '!=', '')->get();
        $template = \Auth::user()->templates()->findOrFail($request->template_id);
		//$members = $group->members();
        $campaign->template_id = $request->template_id;
        $campaign->group_id = $request->group_id;
        $campaign->user_id = \Auth::user()->id;
        $campaign->now = date_format(now(), 'Y-m-d H:m:s');
        $campaign->is_send = true;

        if ($request->current == 'now') {
            if ($request->type == 'sms') {
                if($members->count() * 0.025 > \Auth::user()->balance) {
                    session()->flash('danger', 'Your balance it not enough');
        
                    return redirect(route('dashboard.send.showTemplate'));
                }

                \Auth::user()->update(['balance' => \Auth::user()->balance -= $members->count() * 0.025*100]);

                foreach ($members as $member) {
                    $phoneUtil = \libphonenumber\PhoneNumberUtil::getInstance();
                    try {  
                        try {
                            $swissNumberProto = $phoneUtil->parse($member->phone, $member->country);
                        } catch (\libphonenumber\NumberParseException $e) {
                        }
                        // $message = $client->message()->send([
                            // 'to' => $phoneUtil->format($swissNumberProto, \libphonenumber\PhoneNumberFormat::E164),
                            // 'from' => 'DIGI_MONITOR',
                            // 'text' => $template->content
                        // ]);
						// return $member->phone;
  								
							require('send_sms.php');					
						// $result = $client->SendMessage('Message_Text', 'CM.com', [ $member->phone ], 'Your_Reference');
					//return $phoneUtil->format($swissNumberProto, \libphonenumber\PhoneNumberFormat::E164);
                    } catch(\Exception $e) {

                     }
                }
				
                // $campaign->total = $members->count() * 0.025*100;
                // $campaign->save();

                // session()->flash('success', 'You have been send sms for group');

                // return redirect(route('dashboard.campaigns.index'));
            } 

            if ($request->type == 'email') {
				
                foreach ($members as $member) {
					return $members->email;
                    // try {
						// $data = [ 
						// 'name'    => $template->name,
						// 'subject' => $template->subject,
						// 'content' => $template->content
						// ];
						//Mail::to($members)->send(new SendSmsEmail($data));

						// return $member->email++;
                    // } catch(\Exception $e) {
                    // }
                }
                // $campaign->save();

                // session()->flash('success', 'You have been send email for group');
                
                // return redirect(route('dashboard.campaigns.index')); 
            }
        }

        if ($request->current == 'later') { 
            if ($request->type == 'sms') {
                if($members->count() * 0.025 > \Auth::user()->balance) {
                    session()->flash('danger', 'Your balance it not enough');
        
                    return redirect(route('dashboard.send.showTemplate'));
                }

                \Auth::user()->update(['balance' => \Auth::user()->balance -= $members->count() * 0.025*100]);

                $campaign->total = $members->count() * 0.025*100;
            }
            
            $campaign->is_send = false;
            $campaign->now = $request->date.' '.$request->time.':00';
            
            $campaign->save();

            session()->flash('success', 'You have been send email for group');
            
            return redirect(route('dashboard.campaigns.index'));
        }
    }
	
	
	//Send SMS
// $SMS = new send; 
// $ProductToken="0E845632-C291-4892-B664-0E49C81E888D";//token you get in email
// $Tariff=0; $Sender="123456789"; //your no
// $Recipient="00381645909568"; $Body=$template->content;
// $XMLtoSend = $SMS->CreateMessage($ProductToken, $Sender, $Recipient, $Tariff, $Body); 
// $return=$SMS->SendMessage('http://gateway.cmdirect.nl/cmdirect/gateway.ashx', $XMLtoSend); 
// echo $return;
	
	
    public function send_to_all()
    {
		
        $members = Member :: pluck('email')->toArray();
		$templates = \Auth::user()->templates()->get();
		$campaign = new Campaign;
		foreach($templates as $template)
		{
			try {
				$data = [ 
				'name'    => $template->name,
				'subject' => $template->subject,
				'content' => $template->content
				];
				 //Mail::to($members)->send(new SendSmsEmail($data));
				 return $members;
			} catch(\Exception $e) {
			}	
		}
		 
		// $campaign->save();

		// session()->flash('success', 'You have been send email to All Members');
		
		// return redirect(route('dashboard.campaigns.index')); 
            
       
    }
}
