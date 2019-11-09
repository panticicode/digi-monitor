<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Http\Requests\Members\UpdateMemberRequest;

class HrController extends Controller
{
    public function index()
    {
        $members = \Auth::user()->members()->paginate(5);
      
        return view('dashboard.hr.index', [
            'members' => $members
        ]);
    }

    public function edit(User $hr)
    {
        return view('dashboard.hr.edit', [
            'member' => $hr
        ]);
    }

    public function update(UpdateMemberRequest $request, User $hr)
    {
        $hr->update($request->only('name', 'phone', 'birth_date'));

        session()->flash('success', 'You have been change profile of '.$hr->name);

        return redirect(route('dashboard.hr.index'));
    }

    public function destroy(User $hr)
    {  
        $hr->delete();

        session()->flash('success', 'You have been deleted Member');
        
        return redirect(route('dashboard.hr.index'));
    }

    public function changePW(User $hr)
    {
        request()->validate([
            'password' => 'required|string|min:6|confirmed',
            'old_password' => 'required'
        ]);

        if(\Hash::check(request()->old_password, $hr->password)){
            $hr->update(['password' => bcrypt(request()->password)]);

            session()->flash('success', 'You have been change password');
            
            return redirect()->back();
        } else {
            session()->flash('danger', 'Password is wrong');

            return redirect()->back();
        }
    } 
	public function show(){
		//
	}
	 public function send(){
		 return "Helloexit";
	}
}