<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SalleStoreRequest;
use App\Http\Requests\Admin\SalleUpdateRequest;
use App\Models\Salle;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SalleController extends Controller
{
    public function index(Request $request): View
    {
        $salles = Salle::all();

        return view('salle.index', compact('salles'));
    }

    public function create(Request $request): View
    {
        return view('salle.create');
    }

    public function store(SalleStoreRequest $request): RedirectResponse
    {
        $salle = Salle::create($request->validated());

        $request->session()->flash('salle.id', $salle->id);

        return redirect()->route('salle.index');
    }

    public function show(Request $request, Salle $salle): View
    {
        return view('salle.show', compact('salle'));
    }

    public function edit(Request $request, Salle $salle): View
    {
        return view('salle.edit', compact('salle'));
    }

    public function update(SalleUpdateRequest $request, Salle $salle): RedirectResponse
    {
        $salle->update($request->validated());

        $request->session()->flash('salle.id', $salle->id);

        return redirect()->route('salle.index');
    }

    public function destroy(Request $request, Salle $salle): RedirectResponse
    {
        $salle->delete();

        return redirect()->route('salle.index');
    }
}
