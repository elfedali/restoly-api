<?php

namespace App\Http\Controllers\Admin\Restaurant;

use App\Helpers\Constants;
use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantOpeningHourController extends Controller
{
    public function index(Restaurant $restaurant)
    {
        $openingHours = $restaurant->openingHours;
        $days = Constants::DAYS;
        return view('admin.restaurant.opening-hour.index', compact('restaurant', 'openingHours', 'days'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Restaurant $restaurant)
    {
        dd($request->all());
        $request->validate([
            'day' => 'required|in:' . implode(',', Constants::DAYS),
            'open' => 'required|date_format:H:i',
            'close' => 'required|date_format:H:i',
        ]);

        $restaurant->openingHours()->create($request->all());

        return redirect()->back()->with('success', 'Opening hour created successfully.');
    }
    /** 
     * Update the specified resource in storage.
     */
    public function update(Request $request, Restaurant $restaurant)
    {

        // dd($request->all());
        // 
        $request->validate([
            'days' => 'required|array',
            // 'days.*' => 'required|array|in:' . implode(',', Constants::DAYS),
            'days.*.open_time' => 'nullable|date_format:H:i',
            'days.*.close_time' => 'nullable|date_format:H:i',
            'days.*.is_open' => 'nullable|boolean',
        ]);
        foreach ($request->days as $key_day => $day) {

            if (!in_array($key_day, Constants::DAYS)) {
                continue;
            }
            dd($day);
            $restaurant->openingHours()->updateOrCreate(
                [
                    'day' => $key_day,
                    'open_time' => $day['open_time'],
                    'close_time' => $day['close_time'],
                    'is_closed' => $day['is_open'] ?? false,

                ]
            );
        }

        // $restaurant->openingHours()->findOrFail($id)->update($request->all());

        return redirect()->back()->with('success', 'Opening hour updated successfully.');
    }
}
