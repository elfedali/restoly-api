<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;


class MenuCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, Restaurant $restaurant)

    {


        $menu = $restaurant->menu;
        if (!$menu) {
            return response()->json(['message' => 'This restaurant has no menu'], 404);
        }
        $menuCategories = $menu->menuCategories;
        return response()->json(['menu_categories' => $menuCategories], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'id_restaurant' => ['required', 'exists:restaurants,id'],
        ]);
        $restaurant = \App\Models\Restaurant::find($request->id_restaurant);

        // todo :: authorize user to create menu category for this restaurant
        // if restaurant has menu or not 
        if ($restaurant->menu) {

            $menu = $restaurant->menu;

            $menuCategory = new  \App\Models\MenuCategory();
            $menuCategory->setTranslation('name', app()->getLocale(), $request->name);
            $menuCategory->menu_id = $menu->id;
            $menuCategory->save();

            return response()->json(['message' => 'Menu category created successfully', 'menu_category' => $menuCategory], 201);
        }
        $menu = \App\Models\Menu::create([
            'restaurant_id' => $restaurant->id,
        ]);
        $menuCategory = new  \App\Models\MenuCategory();
        $menuCategory->setTranslation('name', app()->getLocale(), $request->name);
        $menuCategory->menu_id = $menu->id;
        $menuCategory->save();
        return response()->json(['message' => 'Menu and Menu category created successfully', 'menu_category' => $menuCategory], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
