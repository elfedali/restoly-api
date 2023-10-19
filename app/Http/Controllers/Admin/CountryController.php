<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CountryStoreRequest;
use App\Http\Requests\Admin\CountryUpdateRequest;
use App\Models\Country;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CountryController extends Controller
{
    public function index(Request $request): View
    {
        $countries = Country::all()->sortByDesc('created_at');

        return view('admin.country.index', compact('countries'));
    }


    public function store(CountryStoreRequest $request): RedirectResponse
    {
        $country = new Country();
        $country->setTranslations('name', [
            app()->getLocale() => $request->validated()['name'],
        ]);
        $country->is_active = $request->validated()['is_active'] ?? false;
        $country->save();
        return redirect()->route('admin.country.index')->with('success', 'Country created successfully.');
    }

    public function show(Request $request, Country $country): View
    {
        return view('admin.country.show', compact('country'));
    }



    public function update(CountryUpdateRequest $request, Country $country): RedirectResponse
    {
        $country->update($request->validated());



        return redirect()->route('admin.country.index')->with('success', 'Country updated successfully.');
    }

    public function destroy(Request $request, Country $country): RedirectResponse
    {
        $country->delete();

        return redirect()->route('admin.country.index')->with('success', 'Country deleted successfully.');
    }
}
