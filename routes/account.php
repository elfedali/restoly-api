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

//Restaurant Menu 
Route::get('restaurant/{restaurant}/menu', [App\Http\Controllers\Admin\Restaurant\RestaurantMenuController::class, 'index'])->name('admin.restaurant.menu.index');
Route::post('restaurant/{restaurant}/menu/menu-category', [App\Http\Controllers\Admin\Restaurant\RestaurantMenuController::class, 'storeMenuCategory'])->name('admin.restaurant.menu.storeMenuCategory');
Route::delete('restaurant/{restaurant}/menu/menu-category/{menuCategory}', [App\Http\Controllers\Admin\Restaurant\RestaurantMenuController::class, 'destroyMenuCategory'])->name('admin.restaurant.menu.destroyMenuCategory');
Route::post('restaurant/{restaurant}/menu/menu-category/{menuCategory}/menu-item', [App\Http\Controllers\Admin\Restaurant\RestaurantMenuController::class, 'storeMenuItem'])->name('admin.restaurant.menu.storeMenuItem');
// destroyMenuItem
Route::delete('restaurant/{restaurant}/menu/menu-category/{menuCategory}/menu-item/{menuItem}', [App\Http\Controllers\Admin\Restaurant\RestaurantMenuController::class, 'destroyMenuItem'])->name('admin.restaurant.menu.destroyMenuItem');
// updateMenuItem
Route::put('restaurant/{restaurant}/menu/menu-category/{menuCategory}/menu-item/{menuItem}', [App\Http\Controllers\Admin\Restaurant\RestaurantMenuController::class, 'updateMenuItem'])->name('admin.restaurant.menu.updateMenuItem');
// Restaurant reviews
Route::get('restaurant/{restaurant}/review', [App\Http\Controllers\Admin\Restaurant\RestaurantReviewController::class, 'index'])->name('admin.restaurant.review.index');
// restaurant Images
Route::get('restaurant/{restaurant}/image', [App\Http\Controllers\Admin\Restaurant\RestaurantImageController::class, 'index'])->name('admin.restaurant.image.index');
Route::post('restaurant/{restaurant}/image', [App\Http\Controllers\Admin\Restaurant\RestaurantImageController::class, 'store'])->name('admin.restaurant.image.store');

// restaurant Phones
Route::get('restaurant/{restaurant}/phone', [App\Http\Controllers\Admin\Restaurant\RestaurantPhoneController::class, 'index'])->name('admin.restaurant.phone.index');
Route::post('restaurant/{restaurant}/phone', [App\Http\Controllers\Admin\Restaurant\RestaurantPhoneController::class, 'store'])->name('admin.restaurant.phone.store');
Route::put('restaurant/{restaurant}/phone/{phone}', [App\Http\Controllers\Admin\Restaurant\RestaurantPhoneController::class, 'update'])->name('admin.restaurant.phone.update');
Route::delete('restaurant/{restaurant}/phone/{phone}', [App\Http\Controllers\Admin\Restaurant\RestaurantPhoneController::class, 'destroy'])->name('admin.restaurant.phone.destroy');
// restaurant Addresses
Route::get('restaurant/{restaurant}/address', [App\Http\Controllers\Admin\Restaurant\RestaurantAddressController::class, 'index'])->name('admin.restaurant.address.index');
// restaurant Links
Route::get('restaurant/{restaurant}/link', [App\Http\Controllers\Admin\Restaurant\RestaurantLinkController::class, 'index'])->name('admin.restaurant.link.index');
// restaurant Opening Hours
Route::get('restaurant/{restaurant}/opening-hour', [App\Http\Controllers\Admin\Restaurant\RestaurantOpeningHourController::class, 'index'])->name('admin.restaurant.openingHour.index');
// restaurant reservations
Route::get('restaurant/{restaurant}/reservation', [App\Http\Controllers\Admin\Restaurant\RestaurantReservationController::class, 'index'])->name('admin.restaurant.reservation.index');

############
### Images
############
Route::get('media', [App\Http\Controllers\Admin\Image\ImageController::class, 'index'])->name('admin.image.index');


// // admin.restaurant.phone.delete
// Route::delete('restaurant/{restaurant}/phone/{phone}', function (\App\Models\Restaurant $restaurant, App\Models\Phone $phone) {
//     // Ensure the phone is associated with the provided restaurant
//     if ($phone->phoneable_type !== 'App\Models\Restaurant' || $phone->phoneable_id !== $restaurant->id) {
//         return response()->json(['message' => 'Invalid phone for this restaurant'], 403);
//     }

//     // Delete the phone
//     $phone->delete();

//     return response()->json(['message' => 'Phone deleted successfully'], 200);
//     // return redirect()->route('admin.restaurant.edit', $restaurant->id)->with('success', 'Phone deleted successfully.');
// })->name('admin.restaurant.phone.delete');
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


//Route::resource('menu', App\Http\Controllers\Admin\MenuController::class)->names('admin.menu');



//Route::resource('menu-item', App\Http\Controllers\Admin\MenuItemController::class)->names('admin.menu-item');

//Route::resource('salle', App\Http\Controllers\Admin\SalleController::class)->names('admin.salle');

//Route::resource('table', App\Http\Controllers\Admin\TableController::class)->names('admin.table');

Route::resource('reservation', App\Http\Controllers\Admin\ReservationController::class)->names('admin.reservation');

// Route::resource('review', App\Http\Controllers\Admin\ReviewController::class)->names('admin.review');

// Route::resource('favorite', App\Http\Controllers\Admin\FavoriteController::class)->names('admin.favorite');

// Route::resource('phone', App\Http\Controllers\Admin\PhoneController::class)->names('admin.phone');

// Route::resource('link', App\Http\Controllers\Admin\LinkController::class)->names('admin.link');

// Route::resource('setting', App\Http\Controllers\Admin\SettingController::class)->names('admin.setting');

Route::resource('user', App\Http\Controllers\Admin\UserController::class)
    ->except(['edit', 'destroy'])
    ->names('admin.user');

Route::put('user/{user}/update-password', [App\Http\Controllers\Admin\UserPasswordChange::class, 'index'])->name('admin.user.update-password');
Route::put('user/{user}/toggle', function (App\Models\User $user) {
    $user->is_active = !$user->is_active;
    $user->save();
    return redirect()->route('admin.user.show', $user->id)->with('success', 'User updated successfully.');
})->name('admin.user.toggle');
// email
Route::put('user/{user}/update-email', [App\Http\Controllers\Admin\UserEmailChangeController::class, 'index'])->name('admin.user.update-email');
Route::delete('user/{user}/delete', [App\Http\Controllers\Admin\UserDeleteController::class, 'index'])->name('admin.user.delete-user');
