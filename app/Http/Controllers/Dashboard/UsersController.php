<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Users\CreateRequest;
use App\Http\Requests\Users\UpdateRequest;
use App\User;
use App\Notifications\Users\EmailNotification as SendEmailNotification;

class UsersController extends Controller
{
    public function index()
    {
        // $user = \Auth::user();

        // try {
        //     $response = $user->charge(55);
        // } catch (Exception $e) {
          
        // }
      
        // dd($response);
            
        $users = \Auth::user()->members()
                            ->orderBy('created_at', 'DESC')
                            ->paginate(5);

        return view('dashboard.users.index', [
            'users' => $users
        ]);
    }

    public function create()
    {
        return view('dashboard.users.create');
    }

    public function store(CreateRequest $request, User $user)
    {
        $user->fill($request->all());
        $user->password = \Hash::make('123456');
        $user->role = User::ROLE_MEMBER;
        $user->unique_id = md5($request->email);
        $user->parent_id = \Auth::user()->id;

        $user->save();

        session()->flash('success', 'You have been created success');
        
        return redirect(route('dashboard.users.index'));
    }

    public function edit(User $user)
    {
        return view('dashboard.users.edit', [
            'user' => $user
        ]);
    }

    public function update(UpdateRequest $request, User $user)
    {
        $user->update($request->all());

        session()->flash('success', 'You have been updated success');

        return redirect(route('dashboard.users.index'));
    }

    public function destroy(User $user)
    {
        $user->delete();

        session()->flash('success', 'You have been deleted success');

        return redirect(route('dashboard.users.index'));
    }

    public function changePW(User $user)
    {
        request()->validate([
            'password' => 'required|string|min:6|confirmed',
            'old_password' => 'required'
        ]);
    
        if(\Hash::check(request()->old_password, $user->password)){
            $user->update(['password' => bcrypt(request()->password)]);

            session()->flash('success', 'You have been change password');
            
            return redirect(route('dashboard.users.index'));
        } else {
            session()->flash('danger', 'Password is wrong');

            return redirect()->back();
        }
    }

    public function sendMail(User $user)
    {
        // $user->notify(new SendEmailNotification());

        session()->flash('success', 'You have been send email for ' . $user->name . ' success');

        return redirect()->back();
    }
}