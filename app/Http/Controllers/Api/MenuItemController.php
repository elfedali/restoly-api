<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MenuItemStoreRequest;
use App\Models\Menu;
use App\Models\MenuCategory;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class MenuItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, Restaurant $restaurant)
    {

        $menuItems = \Illuminate\Support\Facades\DB::table('restaurants')
            ->join('menus', 'restaurants.id', '=', 'menus.restaurant_id')
            ->join('menu_categories', 'menus.id', '=', 'menu_categories.menu_id')
            ->join('menu_items', 'menu_categories.id', '=', 'menu_items.menu_category_id')
            ->where('restaurants.id', '=', $restaurant->id)
            ->select('menu_categories.id as category_id', 'menu_categories.name as category_name', 'menu_items.*')
            ->orderBy('menu_categories.name', 'asc')
            ->orderBy('menu_items.price', 'asc')

            ->get();

        // Create an empty array to store the grouped items
        $groupedMenuItems = [];

        // Iterate through the menu items and group them by category_id
        foreach ($menuItems as $menuItem) {
            $categoryID = $menuItem->category_id;
            $categoryName = json_decode($menuItem->category_name, true)[app()->getLocale()];
            unset($menuItem->category_id);
            unset($menuItem->category_name);

            if (!isset($groupedMenuItems[$categoryID])) {
                $groupedMenuItems[$categoryID] = [
                    'category_id' => $categoryID,
                    'category_name' => $categoryName,
                    'items' => [],
                ];
            }

            $groupedMenuItems[$categoryID]['items'][] = [
                'id' => $menuItem->id,
                'name' => json_decode($menuItem->name, true)[app()->getLocale()] ?? '__MISSING__',
                'price' => $menuItem->price,
                'description' => json_decode($menuItem->description, true)[app()->getLocale()] ?? '__MISSING__',
            ];
        }

        // Convert the associative array to a sequential array for the response
        $groupedMenuItems = array_values($groupedMenuItems);

        // Return the grouped menu items as JSON response
        return response()->json(['menu_items' => $groupedMenuItems], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MenuItemStoreRequest $request)
    {

        $menuItem = new \App\Models\MenuItem();
        $menuItem->setTranslation('name', app()->getLocale(), $request->name);
        $menuItem->menu_category_id = $request->menu_category_id;
        $menuItem->price = $request->price;
        $menuItem->setTranslation('description', app()->getLocale(), $request->description);
        $menuItem->save();

        return response()->json(['message' => __('messages.menu_item_created'), 'menu_item' => "go"], 201);
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
    public function destroy(\App\Models\MenuItem $menuItem)
    {
        $menuItem->delete();

        return response()->json(['message' => __('messages.menu_item_deleted')], 200);
    }
}
