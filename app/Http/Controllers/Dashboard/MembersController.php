<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PragmaRX\Countries\Package\Countries;
use App\Http\Requests\Members\CreateRequest;
use App\Http\Requests\Members\UpdateRequest;
use App\Models\Member;

class MembersController extends Controller
{
    public function index()
    {
        $members = \Auth::user()->getMembers()->paginate(5);

        return view('dashboard.members.index', [
            'members' => $members
        ]);
    }

    public function create()
    {
        $countries = new Countries();
        $countries = $countries->all()->pluck('name.common','postal');
		
        return view('dashboard.members.create', [
            'countries' => $countries
        ]);
    }

    public function store(CreateRequest $request, Member $member)
    {
        if ($request->phone) {
            $phoneUtil = \libphonenumber\PhoneNumberUtil::getInstance();
            try {
                $swissNumberProto = $phoneUtil->parse($request->phone, $request->area_code);
            } catch (\libphonenumber\NumberParseException $e) {
            }

            $isValid = $phoneUtil->isValidNumber($swissNumberProto);
            
            if (!$isValid) {
                session()->flash('danger', 'Phone of country is wrong');
    
                return redirect()->back();
            }

            $member->country = $request->area_code;
            $member->phone  = $swissNumberProto->getnationalNumber();
        }
      
        $params = $request->only(
			'full_name', 'date_of_birth', 'gender', 'phone', 'email', 'nationality', 
			'address', 'suburb', 'employment', 'occupation', 'tither', 'weekly_tither',
			'monthly_tither', 'marital_status', 'weeding_date', 'born_again', 'baptized',
			'tongues?' ,'sunday_attendance', 'bible_study', 'tuesday_service', 'friday_prayers',
			'night_vigil', 'pregnant', 'delivery_date'
		);
        $member->fill($params);
        $member->is_admin = \Auth::user()->id;

        $member->save();
        
        session()->flash('success', 'You have been created members');

        return redirect(route('dashboard.members.index'));
    }

    public function edit(Member $member)
    {
        $countries = new Countries();
        $countries = $countries->all()->pluck('name.common','postal');

        return view('dashboard.members.edit', [
            'member' => $member,
            'countries' => $countries
        ]);
    }
    public function show(){
	      $members = Member :: pluck('email')->toArray();
	      //return $members;
     }
    public function update(Member $member, UpdateRequest $request)
    {
        $params = $request->only('full_name','gender', 'email', 'date_of_birth', 'address', 'location');

        if($request->phone) {
            $phoneUtil = \libphonenumber\PhoneNumberUtil::getInstance();
            try {
                $swissNumberProto = $phoneUtil->parse($request->phone, $request->area_code);
            } catch (\libphonenumber\NumberParseException $e) {
            }
            $isValid = $phoneUtil->isValidNumber($swissNumberProto);
            if (!$isValid) {
                session()->flash('danger', 'Phone of country is wrong');
				
                return redirect()->back();
            }

            $params['phone'] = $swissNumberProto->getnationalNumber();
            $params['country'] = $request->area_code;

        }

        $member->update($params);

        session()->flash('success', 'You have been updated members');

        return redirect(route('dashboard.members.index'));
    }

    public function destroy(Member $member)
    {
        $member->delete();

        session()->flash('success', 'You have been deleted members');

        return redirect(route('dashboard.members.index'));
    }
}
