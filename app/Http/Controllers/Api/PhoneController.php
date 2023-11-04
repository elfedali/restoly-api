<?php

namespace App\Http\Controllers\Api;

use App\Models\Phone;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PhoneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(\App\Models\Restaurant $restaurant)
    {
        $phones = $restaurant->phones;
        return response()->json([
            'phones' => $phones,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, \App\Models\Restaurant $restaurant)
    {
        $request->validate([
            'phone' => 'required|numeric|digits_between:8,15|unique:phones,phone',
        ]);

        $phone = $restaurant->phones()->create([
            'phone' => $request->phone,
        ]);

        return response()->json([
            'phone' => $phone,
        ]);
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Phone $phone)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Phone $phone)
    {
        $phone->delete();
        return response()->json([
            'message' => 'message.phone-deleted',
        ]);
    }
}
