<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PhoneStoreRequest;
use App\Http\Requests\Admin\PhoneUpdateRequest;
use App\Models\Phone;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PhoneController extends Controller
{
    public function index(Request $request): View
    {
        $phones = Phone::all();

        return view('phone.index', compact('phones'));
    }

    public function create(Request $request): View
    {
        return view('phone.create');
    }

    public function store(PhoneStoreRequest $request): RedirectResponse
    {
        $phone = Phone::create($request->validated());

        $request->session()->flash('phone.id', $phone->id);

        return redirect()->route('phone.index');
    }

    public function show(Request $request, Phone $phone): View
    {
        return view('phone.show', compact('phone'));
    }

    public function edit(Request $request, Phone $phone): View
    {
        return view('phone.edit', compact('phone'));
    }

    public function update(PhoneUpdateRequest $request, Phone $phone): RedirectResponse
    {
        $phone->update($request->validated());

        $request->session()->flash('phone.id', $phone->id);

        return redirect()->route('phone.index');
    }

    public function destroy(Request $request, Phone $phone): RedirectResponse
    {
        $phone->delete();

        return redirect()->route('phone.index');
    }
}
