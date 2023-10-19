<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CityStoreRequest;
use App\Models\City;
use App\Models\Country;
use Illuminate\Http\Request;

class CountryCityController extends Controller
{
    public function show(Country $country, City $city)
    {

        if ($city->country_id !== $country->id) {
            abort(404);
        }
        return view('admin.country.city.show', compact('country', 'city'));
    }

    public function destroy(Country $country, City $city)
    {
        if ($city->country_id !== $country->id) {
            abort(404);
        }
        $city->delete();
        return redirect()->route('admin.country.show', $country->id)->with('success', 'City deleted successfully.');
    }

    // store city
    public function store(Country $country, CityStoreRequest $request)
    {
        $city = new City();
        $city->setTranslation('name', app()->getLocale(), $request->name);
        $city->country_id = $country->id;
        $city->is_active = $request->is_active;
        $city->save();



        return redirect()->route('admin.country.show', $country->id)->with('success', 'City created successfully.');
    }

    public function update(Country $country, CityStoreRequest $request, City $city)
    {
        if ($city->country_id !== $country->id) {
            abort(404);
        }
        $city->setTranslation('name', app()->getLocale(), $request->name);
        $city->is_active = $request->is_active;
        $city->save();

        return redirect()->route('admin.country.city.show', [$country->id, $city->id])->with('success', 'City updated successfully.');
    }
}
