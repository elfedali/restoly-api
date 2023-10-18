<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\RestaurantStoreRequest;
use App\Http\Requests\Admin\RestaurantUpdateRequest;
use App\Models\Restaurant;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RestaurantController extends Controller
{
    public function index(Request $request): View
    {
        $restaurants = Restaurant::all();

        return view('restaurant.index', compact('restaurants'));
    }

    public function create(Request $request): View
    {
        return view('restaurant.create');
    }

    public function store(RestaurantStoreRequest $request): RedirectResponse
    {
        $restaurant = Restaurant::create($request->validated());

        $request->session()->flash('restaurant.id', $restaurant->id);

        return redirect()->route('restaurant.index');
    }

    public function show(Request $request, Restaurant $restaurant): View
    {
        return view('restaurant.show', compact('restaurant'));
    }

    public function edit(Request $request, Restaurant $restaurant): View
    {
        return view('restaurant.edit', compact('restaurant'));
    }

    public function update(RestaurantUpdateRequest $request, Restaurant $restaurant): RedirectResponse
    {
        $restaurant->update($request->validated());

        $request->session()->flash('restaurant.id', $restaurant->id);

        return redirect()->route('restaurant.index');
    }

    public function destroy(Request $request, Restaurant $restaurant): RedirectResponse
    {
        $restaurant->delete();

        return redirect()->route('restaurant.index');
    }
}
