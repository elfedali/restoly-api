<?php

namespace App\Http\Controllers\Admin\Restaurant;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantAddressController extends Controller
{
    public function index(Restaurant $restaurant)
    {
        $addresses = $restaurant->addresses;
        return view('admin.restaurant.address.index', compact('restaurant', 'addresses'));
    }
}
