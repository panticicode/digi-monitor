<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User; 
use PragmaRX\Countries\Package\Countries;
use App\Http\Requests\Admin\CreateRequest;
use App\Http\Requests\Admin\UpdateRequest;
// use Illuminate\Notifications\Messages\NexmoMessage;

class AdminController extends Controller
{
    public function index()
    {
        $admins = \Auth::user()->members()->paginate(5);

        return view('dashboard.admin.index', [
            'admins' => $admins
        ]);
    }

    public function create()
    {
        return view('dashboard.admin.create');
    }

    public function store(CreateRequest $request, User $admin)
    {
        $admin->fill($request->all());
        $admin->password = \Hash::make('123456');
        $admin->role = User::ROLE_ADMIN;
        $admin->unique_id = md5($request->email);
        $admin->parent_id = \Auth::user()->id;

        $admin->save();

        session()->flash('success', 'You have been created success');
        
        return redirect(route('dashboard.admin.index'));
    }

    public function edit(User $admin)
    {
        return view('dashboard.admin.edit', [
            'admin' => $admin,
        ]);
    }

    public function update(UpdateRequest $request, User $admin)
    {
        $admin->update($request->all());

        session()->flash('success', 'You have been updated success');

        return redirect(route('dashboard.admin.index'));
    }

    public function destroy(User $admin)
    {
        $admin->delete();

        session()->flash('success', 'You have been deleted success');

        return redirect(route('dashboard.admin.index'));
    }

    public function changePW(User $admin)
    {
        request()->validate([
            'password' => 'required|string|min:6|confirmed',
            'old_password' => 'required'
        ]);
   
        if(\Hash::check(request()->old_password, $admin->password)){
            $admin->update(['password' => bcrypt(request()->password)]);

            session()->flash('success', 'You have been change password');
            
            return redirect(route('dashboard.admin.index'));
        } else {
            session()->flash('danger', 'Password is wrong');

            return redirect()->back();
        }
    }

}