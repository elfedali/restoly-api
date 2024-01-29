<?php

namespace App\Http\Controllers\Admin\Restaurant;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantReservationController extends Controller
{
    public function index(Restaurant $restaurant)
    {
        $reservations = $restaurant->reservations;
        return view('admin.restaurant.reservation.index', compact('restaurant', 'reservations'));
    }
}
