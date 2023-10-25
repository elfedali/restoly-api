<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserEmailChangeController extends Controller
{
    public function index(Request $request , User $user)
    {
        // validate email request
        $request->validate([
            'email' => 'required|email|unique:users,email'.$user->id,
            'password_edit' => 'required',
        ]);
        // check password of $user is correct and then update email
        if (!auth()->attempt(['email' => $user->email, 'password' => $request->password_edit])) {
            return back()->withErrors(['password_edit' => 'Password is incorrect'])->with('hash', 'change-email');
        }
        if ($user->email == $request->email) {
            return back()->withErrors(['email' => 'Email is same as old email'])->with('hash', 'change-email');
        }

        // update email
        $user->update([
            'email' => $request->email, 
        ]);
        // add #password_edit to url
        return view('admin.user.show', compact('user'))
        ->with('success', 'Email changed successfully')
        ->with('hash', 'change-email');
    }
}
