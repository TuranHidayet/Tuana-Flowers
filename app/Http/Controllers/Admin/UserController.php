<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('admin.users.index', compact('users'));
    }

    public function show($id)
    {
        $user = User::findOrFail($id);

        return view('admin.users.show', compact('user'));
    }

    public function makeAdmin($id)
    {
        $user = User::findOrFail($id);

        $user->role = 'admin';
        $user->save();

        return redirect()->back()->with('success', 'Role successfully updated to Admin.');
    }
}


