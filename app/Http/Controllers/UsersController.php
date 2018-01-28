<?php

namespace Librory\Http\Controllers;

use Librory\Models\User;
use Illuminate\Http\Request;
use Librory\Http\Requests\AddNewMemberRequest;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function allMembers()
    {
        $members = User::members();

        return view('pages.members.all', compact('members'));
    }

    public function addMember()
    {
        return view('pages.members.add');
    }

    public function saveMember(AddNewMemberRequest $request)
    {
        $newMember = User::create($request->except(['_token']));

        return redirect()->route('members.all')
            ->withNotification('Successfully create a new member.');
    }

    public function editMember(User $member)
    {
        return view('pages.members.edit', compact(
            'member'
        ));
    }

    public function updateMember(Request $request, User $member)
    {

    }
}
