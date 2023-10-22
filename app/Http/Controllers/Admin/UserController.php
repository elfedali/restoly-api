<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserStoreRequest;
use App\Http\Requests\Admin\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(Request $request): View
    {
        $users = User::all()->sortByDesc('id');

        return view('admin.user.index', compact('users'));
    }

    public function store(UserStoreRequest $request): RedirectResponse
    {
        $user = new User($request->validated());
        $user->password = bcrypt($request->password);
        $user->role = User::ROLE_USER;
        $user->save();

        return redirect()->route('admin.user.index')->with('success', 'User created successfully.');
    }

    public function show(Request $request, User $user): View
    {
        return view('admin.user.show', compact('user'));
    }


    public function update(UserUpdateRequest $request, User $user): RedirectResponse
    {
        $user->update($request->validated());


        return redirect()->route('admin.user.show', $user->id)->with('success', 'User updated successfully.');
    }

    public function destroy(Request $request, User $user): RedirectResponse
    {
        $user->delete();

        return redirect()->route('admin.user.index')->with('success', 'User deleted successfully.');
    }
}
