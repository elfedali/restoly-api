<?php


use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard');

Route::resource(
    'category',
    App\Http\Controllers\Admin\CategoryController::class
)
    ->except(['create', 'edit'])
    ->names('admin.category');
Route::put('category/{category}/toggle', [App\Http\Controllers\Admin\CategoryController::class, 'toggleIsActive'])->name('admin.category.toggle');

// language switcher
Route::post('language/switcher', [App\Http\Controllers\LanguageSwitchController::class, '__invoke'])->name('language.switch');
Route::resource('language', App\Http\Controllers\Admin\LanguageController::class)->names('admin.language');

Route::put('country/{country}/toggle', function (App\Models\Country $country) {
    $country->is_active = !$country->is_active;
    $country->save();
    return redirect()->route('admin.country.show', $country->id)->with('success', 'Country updated successfully.');
})->name('admin.country.toggle');

Route::resource('country', App\Http\Controllers\Admin\CountryController::class)
    ->except(['create', 'edit'])
    ->names('admin.country');

// country/{country}/city/{city}
Route::resource('country.city', App\Http\Controllers\Admin\CountryCityController::class)
    ->except(['index', 'create', 'edit'])
    ->names('admin.country.city');

Route::resource('city.district', App\Http\Controllers\Admin\CityDistrictController::class)
    ->except(['index', 'create', 'edit'])
    ->names('admin.city.district');


Route::resource('currency', App\Http\Controllers\Admin\CurrencyController::class)->names('admin.currency');
Route::put('currency/{currency}/toggle', function (App\Models\Currency $currency) {
    $currency->is_active = !$currency->is_active;
    $currency->save();
    return redirect()->route('admin.currency.show', $currency->id)->with('success', 'Currency updated successfully.');
})->name('admin.currency.toggle');


Route::resource('service', App\Http\Controllers\Admin\ServiceController::class)
    ->except(['create', 'edit'])
    ->names('admin.service');

Route::put('service/{service}/toggle', function (App\Models\Service $service) {
    $service->is_active = !$service->is_active;
    $service->save();
    return redirect()->route('admin.service.show', $service->id)->with('success', 'Service updated successfully.');
})->name('admin.service.toggle');


//Route::resource('district', App\Http\Controllers\Admin\DistrictController::class)->names('admin.district');

Route::resource('restaurant', App\Http\Controllers\Admin\RestaurantController::class)
    ->except(['show'])
    ->names('admin.restaurant');
// admin.restaurant.phone.delete
Route::delete('restaurant/{restaurant}/phone/{phone}', function (\App\Models\Restaurant $restaurant, App\Models\Phone $phone) {
    // Ensure the phone is associated with the provided restaurant
    if ($phone->phoneable_type !== 'App\Models\Restaurant' || $phone->phoneable_id !== $restaurant->id) {
        return response()->json(['message' => 'Invalid phone for this restaurant'], 403);
    }

    // Delete the phone
    $phone->delete();

    return response()->json(['message' => 'Phone deleted successfully'], 200);
    // return redirect()->route('admin.restaurant.edit', $restaurant->id)->with('success', 'Phone deleted successfully.');
})->name('admin.restaurant.phone.delete');
// delete link
Route::delete('restaurant/{restaurant}/link/{link}', function (\App\Models\Restaurant $restaurant, \App\Models\Link $link) {
    // Ensure the link is associated with the provided restaurant
    if ($link->linkable_type !== 'App\Models\Restaurant' || $link->linkable_id !== $restaurant->id) {
        return response()->json(['message' => 'Invalid link for this restaurant'], 403);
    }
    // Delete the link
    $link->delete();

    return response()->json(['message' => 'Link deleted successfully'], 200);
})->name('admin.restaurant.link.delete');


Route::resource('menu', App\Http\Controllers\Admin\MenuController::class)->names('admin.menu');

Route::resource('menu-category', App\Http\Controllers\Admin\MenuCategoryController::class)->names('admin.menu-category');

Route::resource('menu-item', App\Http\Controllers\Admin\MenuItemController::class)->names('admin.menu-item');

Route::resource('salle', App\Http\Controllers\Admin\SalleController::class)->names('admin.salle');

Route::resource('table', App\Http\Controllers\Admin\TableController::class)->names('admin.table');

Route::resource('reservation', App\Http\Controllers\Admin\ReservationController::class)->names('admin.reservation');

Route::resource('review', App\Http\Controllers\Admin\ReviewController::class)->names('admin.review');

Route::resource('favorite', App\Http\Controllers\Admin\FavoriteController::class)->names('admin.favorite');

Route::resource('phone', App\Http\Controllers\Admin\PhoneController::class)->names('admin.phone');

Route::resource('link', App\Http\Controllers\Admin\LinkController::class)->names('admin.link');

Route::resource('setting', App\Http\Controllers\Admin\SettingController::class)->names('admin.setting');

Route::resource('user', App\Http\Controllers\Admin\UserController::class)
    ->except(['create', 'edit'])
    ->names('admin.user');
