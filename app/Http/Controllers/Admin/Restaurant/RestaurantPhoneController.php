<?php

namespace App\Http\Controllers\Admin\Restaurant;

use App\Http\Controllers\Controller;
use App\Models\Phone;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantPhoneController extends Controller
{
    public function index(Restaurant $restaurant)
    {
        $phones = $restaurant->phones;
        return view('admin.restaurant.phone.index', compact('restaurant', 'phones'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Restaurant $restaurant)
    {
        $request->validate([
            'phone' => 'required|numeric|digits_between:10,15'
        ]);
        $restaurant->phones()->create([
            'phone' => $request->phone,
            'is_active' => true,

        ]);
        return redirect()->route('admin.restaurant.phone.index', $restaurant->id)->with('success', 'Phone added successfully.');
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Restaurant $restaurant, Phone $phone)
    {
        //dd($request->all());
        $request->validate([
            'phone_edit' => 'required|numeric|digits_between:10,15',
            'is_active' => 'nullable|boolean',
            'is_main' => 'nullable|boolean',
            'weight' => 'nullable|numeric'
        ]);
        $phone->phone = $request->phone_edit;
        if ($request->has('is_active')) {
            $phone->is_active = true;
        } else {
            $phone->is_active = false;
        }
        if ($request->has('is_main')) {
            $phone->is_main = true;
        } else {
            $phone->is_main = false;
        }
        if ($request->has('weight')) {
            $phone->weight = $request->weight;
        } else {
            $phone->weight = 0;
        }
        $phone->save();
        return redirect()->route('admin.restaurant.phone.index', $restaurant->id)->with('success', 'Phone updated successfully.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Restaurant $restaurant, Phone $phone)
    {
        $phone->delete();
        return redirect()->route('admin.restaurant.phone.index', $restaurant->id)->with('success', 'Phone deleted successfully.');
    }
}
