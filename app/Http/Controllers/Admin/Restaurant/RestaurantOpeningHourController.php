<?php

namespace App\Http\Controllers\Admin\Restaurant;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantOpeningHourController extends Controller
{
    public function index(Restaurant $restaurant)
    {
        $openingHours = $restaurant->openingHours;
        return view('admin.restaurant.opening-hour.index', compact('restaurant', 'openingHours'));
    }
}
