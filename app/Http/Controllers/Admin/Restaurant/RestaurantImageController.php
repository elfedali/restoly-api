<?php

namespace App\Http\Controllers\Admin\Restaurant;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantImageController extends Controller
{
    public function index(Restaurant $restaurant)
    {
        $images = $restaurant->images;
        return view('admin.restaurant.image.index', compact('restaurant', 'images'));
    }
}
