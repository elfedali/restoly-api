<?php

namespace App\Http\Controllers\Admin\Restaurant;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantLinkController extends Controller
{
    public function index(Restaurant $restaurant)
    {
        return view('admin.restaurant.link.index', compact('restaurant'));
    }
}
