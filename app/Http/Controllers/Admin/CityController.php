<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CityStoreRequest;
use App\Http\Requests\Admin\CityUpdateRequest;
use App\Models\City;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CityController extends Controller
{
    public function index(Request $request): View
    {
        $cities = City::all();

        return view('city.index', compact('cities'));
    }

    public function create(Request $request): View
    {
        return view('city.create');
    }

    public function store(CityStoreRequest $request): RedirectResponse
    {
        $city = City::create($request->validated());

        $request->session()->flash('city.id', $city->id);

        return redirect()->route('city.index');
    }

    public function show(Request $request, City $city): View
    {
        return view('city.show', compact('city'));
    }

    public function edit(Request $request, City $city): View
    {
        return view('city.edit', compact('city'));
    }

    public function update(CityUpdateRequest $request, City $city): RedirectResponse
    {
        $city->update($request->validated());

        $request->session()->flash('city.id', $city->id);

        return redirect()->route('city.index');
    }

    public function destroy(Request $request, City $city): RedirectResponse
    {
        $city->delete();

        return redirect()->route('city.index');
    }
}
