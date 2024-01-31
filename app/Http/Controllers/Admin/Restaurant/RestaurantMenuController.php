<?php

namespace App\Http\Controllers\Admin\Restaurant;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MenuItemStoreRequest;
use App\Http\Requests\Admin\MenuItemUpdateRequest;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantMenuController extends Controller
{
    use \App\Traits\FileUploaderTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(Restaurant $restaurant)
    {
        $menu = $restaurant->menu;
        return view('admin.restaurant.menu.index', compact('restaurant', 'menu'));
    }
    /**
     * Store created menu category for this restaurant.
     */
    public function storeMenuCategory(Request $request, Restaurant $restaurant)
    {

        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        if ($restaurant->menu) {

            $menu = $restaurant->menu;

            $menuCategory = new  \App\Models\MenuCategory();
            $menuCategory->setTranslation('name', app()->getLocale(), $request->name);
            $menuCategory->menu_id = $menu->id;
            $menuCategory->save();
        } else {
            $menu = \App\Models\Menu::create([
                'restaurant_id' => $restaurant->id,
            ]);
            $menuCategory = new  \App\Models\MenuCategory();
            $menuCategory->setTranslation('name', app()->getLocale(), $request->name);
            $menuCategory->menu_id = $menu->id;
            $menuCategory->save();
        }

        return redirect()->route('admin.restaurant.menu.index', $restaurant->id)->with('success', 'Menu category created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroyMenuCategory(Restaurant $restaurant, \App\Models\MenuCategory $menuCategory)
    {
        foreach ($menuCategory->menuItems as $menuItem) {
            if ($menuItem->image) {

                $this->deleteFile($menuItem->image->url, 'public');
            }
            $menuItem->delete();
        }
        $menuCategory->delete();

        return redirect()->route('admin.restaurant.menu.index', $restaurant->id)->with('success', 'Menu category deleted successfully.');
    }

    /**
     * Store created menu item for this restaurant.
     */
    public function storeMenuItem(MenuItemStoreRequest $request, Restaurant $restaurant, \App\Models\MenuCategory $menuCategory)
    {
        $menuItem = new  \App\Models\MenuItem();
        $menuItem->setTranslation('name', app()->getLocale(), $request->name);
        $menuItem->menu_category_id = $menuCategory->id;
        $menuItem->price = $request->price;
        $menuItem->setTranslation('description', app()->getLocale(), $request->description);
        // upload image
        $uniqueFileName = uniqid() . '_' . time();
        $path = $this->uploadFile($request->file('image'), 'restaurants/' . $restaurant->id, 'public', $uniqueFileName);
        $menuItem->save();


        $menuItem->image()->create([
            'name' => $request->file('image')->getClientOriginalName(),
            'url' => $path,

        ]);

        return redirect()->route('admin.restaurant.menu.index', $restaurant->id)->with('success', 'Menu item created successfully.');
    }

    // destroyMenuItem
    public function destroyMenuItem(Restaurant $restaurant, \App\Models\MenuCategory $menuCategory, \App\Models\MenuItem $menuItem)
    {
        if ($menuItem->image) {
            $this->deleteFile($menuItem->image->url, 'public');
        }
        $menuItem->delete();

        return redirect()->route('admin.restaurant.menu.index', $restaurant->id)->with('success', 'Menu item deleted successfully.');
    }
    // updateMenuItem
    public function updateMenuItem(MenuItemUpdateRequest $request, Restaurant $restaurant, \App\Models\MenuCategory $menuCategory, \App\Models\MenuItem $menuItem)
    {

        $menuItem->setTranslation('name', app()->getLocale(), $request->name);
        $menuItem->menu_category_id = $menuCategory->id;
        $menuItem->price = $request->price;
        $menuItem->is_active = $request->is_active;
        $menuItem->is_veg = $request->is_veg;
        $menuItem->is_popular = $request->is_popular;
        $menuItem->position = $request->position;

        $menuItem->setTranslation('description', app()->getLocale(), $request->description);
        // upload image
        if ($request->hasFile('image')) {

            if ($menuItem->image) {
                $this->deleteFile($menuItem->image->url, 'public');
            }
            $uniqueFileName = uniqid() . '_' . time();
            $path = $this->uploadFile($request->file('image'), 'restaurants/' . $restaurant->id, 'public', $uniqueFileName);
            // chech if file is uploaded
            if (!$path) {
                return redirect()->route('admin.restaurant.menu.index', $restaurant->id)->with('error', 'Something went wrong.');
            }


            $menuItem->image()->create([
                'name' => $request->file('image')->getClientOriginalName(),
                'url' => $path,

            ]);
        }
        $menuItem->save();

        return redirect()->route('admin.restaurant.menu.index', $restaurant->id)->with('success', 'Menu item updated successfully.');
    }
}
