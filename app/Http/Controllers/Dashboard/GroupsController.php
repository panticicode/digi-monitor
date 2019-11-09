<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Groups\CreateRequest;
use App\User;
// use App\Models\GroupUser;
use App\Models\GroupMember;
use App\Models\Group;
use App\Models\Member;
use App\Notifications\Templates\Email as SendEmailNotification;

class GroupsController extends Controller
{
    public function index()
    {
        $groups = \Auth::user()->getGroup()->paginate(5);

        return view('dashboard.groups.index', [
            'groups' => $groups
        ]);
    }

    public function create()
    {
        $users = \Auth::user()->getMembers()->get();
        
        return view('dashboard.groups.create', [
            'members' => $users
        ]);
    }

    public function store(CreateRequest $request, Group $group)
    {
        $group->fill($request->only('name', 'description'));

        $group->user_id = \Auth::user()->id;
        
        $group->save();

        foreach ($request->members as $member) {
            GroupMember::create([
                'member_id' => $member,
                'group_id' => $group->id
            ]);
        }

        session()->flash('success', 'You have been created new group');

        return redirect(route('dashboard.groups.index'));
    }

    public function edit(Group $group)
    {
        $members = \Auth::user()->getMembers()->get();
     
        return view('dashboard.groups.edit', [
            'group' => $group,
            'members' => $members
        ]);
    }

    public function update(CreateRequest $request, Group $group)
    {
        $group->update($request->only('name', 'description'));

        $group->group_member()->delete();
        
        foreach ($request->members as $member) {
            GroupMember::create([
                'member_id' => $member,
                'group_id' => $group->id
            ]);
        }

        session()->flash('success', 'You have been updated group');

        return redirect(route('dashboard.groups.index'));
    }

    public function destroy(Group $group)
    {
        $group->group_member()->delete();

        $group->delete();

        session()->flash('success', 'You have been deleted group');

        return redirect(route('dashboard.groups.index'));
    }

    public function getUser(Request $request)
    {
        $member = Member::find($request->id);

        return view('dashboard.groups.show-member', [
            'member' => $member
        ]);
    }
}