<?php

namespace App\Http\Controllers\Admin\Restaurant;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantPhoneController extends Controller
{
    public function index(Restaurant $restaurant)
    {
        $phones = $restaurant->phones;
        return view('admin.restaurant.phone.index', compact('restaurant', 'phones'));
    }
}
