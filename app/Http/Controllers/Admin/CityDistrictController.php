<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\District;
use Illuminate\Http\Request;

class CityDistrictController extends Controller
{



    /**
     * Store a newly created resource in storage.
     */
    public function store(City $city, Request $request)
    {
        $district = new District();
        $district->setTranslation('name', app()->getLocale(), $request->name);
        $district->city_id = $city->id;
        $district->is_active = $request->is_active;
        $district->save();
        return redirect()->route('admin.country.city.show', [$city->country_id, $city->id])->with('success', 'District created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(City $city, District $district,)
    {
        if ($district->city_id !== $city->id) {
            abort(404);
        }
        return view('admin.city.district.show', compact('city', 'district'));
    }




    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, District $district)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(District $district)
    {
        //
    }
}
