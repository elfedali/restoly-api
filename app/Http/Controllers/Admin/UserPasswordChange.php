<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class UserPasswordChange extends Controller
{
    
    public function index(Request $request, User $user)
    {
        // validate password request
        $request->validate([
            'password' => 'required|confirmed|min:8',
        ]);

        // update password
        $user->update([
            'password' => bcrypt($request->password),
        ]);

        
        return view('admin.user.show', compact('user'))->with('success', 'Password changed successfully');
    }
    
    
}
