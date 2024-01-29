<?php

namespace App\Http\Controllers\Admin\Restaurant;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantReviewController extends Controller
{
    public function index(Restaurant $restaurant)
    {
        $reviews = $restaurant->reviews;
        return view('admin.restaurant.review.index', compact('restaurant', 'reviews'));
    }
}
