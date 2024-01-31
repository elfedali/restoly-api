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

    public function store(Request $request, Restaurant $restaurant)
    {

        $request->validate([
            'name' => 'required|in:facebook,twitter,instagram,website,tiktok,youtube',
            'url' => 'required|url',
            'is_active' => 'nullable|boolean',
        ]);

        $restaurant->links()->create(
            [
                'name' => $request->name,
                'url' => $request->url,
                'is_active' => $request->has('is_active') ? true : false,
            ]
        );

        return redirect()->route('admin.restaurant.link.index', $restaurant->id)->with('success', 'Link added successfully.');
    }
}
