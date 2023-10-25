<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserStoreRequest;
use App\Http\Requests\Admin\UserUpdateRequest;
use App\Models\User;
use Dotenv\Parser\Value;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Database\Eloquent\Builder;

class UserController extends Controller
{
    public function index(Request $request): View
    {

        // spatie/laravel-query-builder 


        $users = QueryBuilder::for(User::class)
            ->allowedFilters([
                AllowedFilter::callback('username', function (Builder $query, $value) {
                    // username (first_name, last_name, username)
                    return $query->where(function ($q) use ($value) {
                        $q->where('username', 'LIKE', "%$value%")
                            ->orWhere('first_name', 'LIKE', "%$value%")
                            ->orWhere('last_name', 'LIKE', "%$value%");
                    });
                }),
                AllowedFilter::callback('status', function (Builder $query, $value) {
                    // status (active, inactive)
                    if ($value === 'active') {
                        return $query->where('is_active', true);
                    }
                    if ($value === 'inactive') {
                        return $query->where('is_active', false);
                    }
                }),
                AllowedFilter::callback('role', function (Builder $query, $value) {
                    // role (admin, user)
                    if ($value === 'admin') {
                        return $query->where('is_admin', true);
                    }
                    if ($value === 'user') {
                        return $query->where('is_admin', false);
                    }
                }),
                AllowedFilter::callback('has_restaurant', function (Builder $query, $value) {
                    // has_restaurant (yes, no)
                    if ($value === 'yes') {
                        return $query->whereHas('restaurants');
                    }
                    if ($value === 'no') {
                        return $query->whereDoesntHave('restaurants');
                    }
                }),
            ])
            ->get();


        return view('admin.user.index', compact('users'));
    }

    public function create(Request $request): View
    {
        return view('admin.user.create');
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
