<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\RestaurantStoreRequest;
use App\Http\Requests\Admin\RestaurantUpdateRequest;
use App\Models\Phone;
use App\Models\Restaurant;
use App\Traits\FileUploaderTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RestaurantController extends Controller
{
    use  FileUploaderTrait;
    public function index(Request $request): View
    {
        $restaurants = Restaurant::all()->sortByDesc('id');

        return view('admin.restaurant.index', compact('restaurants'));
    }

    public function create(Request $request): View
    {
        return view('admin.restaurant.create');
    }

    public function store(RestaurantStoreRequest $request): RedirectResponse
    {
        $restaurant =  new Restaurant();
        $restaurant->owner_id = $request->owner_id;
        // createdby_id auth user
        $restaurant->createdby_id = auth()->user()->id;
        $restaurant->setTranslation('name', app()->getLocale(), $request->name);
        $restaurant->setTranslation('description', app()->getLocale(), $request->description);
        // $restaurant->district_id = $request->district_id;
        // $restaurant->setTranslation('address', app()->getLocale(), $request->address);
        //$restaurant->approvedby_id = $request->approvedby_id;
        //$restaurant->approved_at = $request->approved_at;
        $restaurant->is_active = $request->is_active;
        // $restaurant->longitude = $request->longitude;
        //$restaurant->latitude = $request->latitude;
        //$restaurant->currency_id = $request->currency_id;
        $restaurant->setTranslation('meta_title', app()->getLocale(), $request->meta_title);
        $restaurant->setTranslation('meta_description', app()->getLocale(), $request->meta_description);
        $restaurant->setTranslation('meta_keywords', app()->getLocale(), $request->meta_keywords);


        $restaurant->save();

        $restaurant->categories()->sync($request->input('categories'));
        $restaurant->services()->sync($request->input('services'));
        // phones
        $phonesData = $request->input('phones');

        if ($phonesData) {
            $phones = [];

            foreach ($phonesData as $item) {
                $phones[] = new Phone([
                    'phone' => $item,
                    // Add other phone attributes here
                ]);
            }

            $restaurant->phones()->saveMany($phones);
        }
        // links name,url
        $linksData = $request->input('links');
        //dd($linksData);
        if ($linksData) {
            $links = [];

            foreach ($linksData['name'] as $key => $name) {
                $links[] = new \App\Models\Link([
                    'name' => $name,
                    'url' => $linksData['url'][$key],
                    // Add other link attributes here
                ]);
            }

            $restaurant->links()->saveMany($links);
        }


        // multiple images

        foreach ($request->file('images') as $file) {
            $uniqueFileName = uniqid() . '_' . time();
            $path = $this->uploadFile($file, 'restaurants/' . $restaurant->id, 'public', $uniqueFileName);
            $restaurant->images()->create([
                'name' => $file->getClientOriginalName(),
                'url' => $path
            ]);
            //$path = $this->saveFile($file, 'restaurants');
            //$restaurant->images()->create(['path' => $path]);
        }






        return redirect()->route('admin.restaurant.index')->with('success', 'Restaurant created successfully.');
    }

    // public function show(Request $request, Restaurant $restaurant): View
    // {
    //     return view('admin.restaurant.show', compact('restaurant'));
    // }

    public function edit(Request $request, Restaurant $restaurant): View
    {
        return view('admin.restaurant.edit', compact('restaurant'));
    }

    public function update(RestaurantUpdateRequest $request, Restaurant $restaurant): RedirectResponse
    {
        $restaurant->update($request->validated());

        $restaurant->categories()->sync($request->input('categories'));
        $restaurant->services()->sync($request->input('services'));



        return redirect()->route('admin.restaurant.edit', $restaurant)->with('success', 'Restaurant updated successfully.');
    }

    public function destroy(Request $request, Restaurant $restaurant): RedirectResponse
    {
        $restaurant->delete();

        return redirect()->route('admin.restaurant.index');
    }
}
