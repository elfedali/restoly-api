<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DistrictStoreRequest;
use App\Http\Requests\Admin\DistrictUpdateRequest;
use App\Models\District;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DistrictController extends Controller
{
    public function index(Request $request): View
    {
        $districts = District::all();

        return view('district.index', compact('districts'));
    }

    public function create(Request $request): View
    {
        return view('district.create');
    }

    public function store(DistrictStoreRequest $request): RedirectResponse
    {
        $district = District::create($request->validated());

        $request->session()->flash('district.id', $district->id);

        return redirect()->route('district.index');
    }

    public function show(Request $request, District $district): View
    {
        return view('district.show', compact('district'));
    }

    public function edit(Request $request, District $district): View
    {
        return view('district.edit', compact('district'));
    }

    public function update(DistrictUpdateRequest $request, District $district): RedirectResponse
    {
        $district->update($request->validated());

        $request->session()->flash('district.id', $district->id);

        return redirect()->route('district.index');
    }

    public function destroy(Request $request, District $district): RedirectResponse
    {
        $district->delete();

        return redirect()->route('district.index');
    }
}
