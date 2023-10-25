<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserDeleteController extends Controller
{
    public function index(Request $request, User $user)
    {
        // validate password request
        $request->validate([
            'password_delete' => 'required',
        ]);
        if (!auth()->attempt(['email' => $user->email, 'password' => $request->password_delete])) {
            return back()->withErrors(['password_delete' => 'Password is incorrect'])->with('hash', 'delete-user');
        }
        // delete user
        $user->delete();
        return redirect()->route('admin.user.index')->with('success', 'User deleted successfully');
    }
}
