<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CurrencyStoreRequest;
use App\Http\Requests\Admin\CurrencyUpdateRequest;
use App\Models\Currency;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CurrencyController extends Controller
{
    public function index(Request $request): View
    {
        $currencies = Currency::all();

        return view('currency.index', compact('currencies'));
    }

    public function create(Request $request): View
    {
        return view('currency.create');
    }

    public function store(CurrencyStoreRequest $request): RedirectResponse
    {
        $currency = Currency::create($request->validated());

        $request->session()->flash('currency.id', $currency->id);

        return redirect()->route('currency.index');
    }

    public function show(Request $request, Currency $currency): View
    {
        return view('currency.show', compact('currency'));
    }

    public function edit(Request $request, Currency $currency): View
    {
        return view('currency.edit', compact('currency'));
    }

    public function update(CurrencyUpdateRequest $request, Currency $currency): RedirectResponse
    {
        $currency->update($request->validated());

        $request->session()->flash('currency.id', $currency->id);

        return redirect()->route('currency.index');
    }

    public function destroy(Request $request, Currency $currency): RedirectResponse
    {
        $currency->delete();

        return redirect()->route('currency.index');
    }
}
