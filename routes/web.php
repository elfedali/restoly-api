<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth', 'setLanguage'])->group(

    function () {
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

        Route::resource('currency', App\Http\Controllers\Admin\CurrencyController::class)->names('admin.currency');


        Route::resource('service', App\Http\Controllers\Admin\ServiceController::class)->names('admin.service');


        Route::resource('city', App\Http\Controllers\Admin\CityController::class)->names('admin.city');

        Route::resource('district', App\Http\Controllers\Admin\DistrictController::class)->names('admin.district');

        Route::resource('restaurant', App\Http\Controllers\Admin\RestaurantController::class)->names('admin.restaurant');

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

        Route::resource('user', App\Http\Controllers\Admin\UserController::class)->names('admin.user');
    }
);
