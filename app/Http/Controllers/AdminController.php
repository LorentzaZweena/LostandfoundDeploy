<?php

namespace App\Http\Controllers;
use App\Models\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function users()
    {
        $users = User::latest()->get();

        return view('admin.users', compact('users'));
    }

    public function updateRole(Request $request, User $user)
    {
        $user->update([
            'role' => $request->role
        ]);

        return back()->with('success', 'Role updated');
    }
}
