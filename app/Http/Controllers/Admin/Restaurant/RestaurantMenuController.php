<?php

namespace App\Http\Controllers\Admin\Restaurant;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantMenuController extends Controller
{
    public function index(Restaurant $restaurant)
    {
        $menu = $restaurant->menu;
        return view('admin.restaurant.menu.index', compact('restaurant', 'menu'));
    }
}
