<?php

namespace App\Http\Controllers\Admin\Restaurant;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantImageController extends Controller
{
    use \App\Traits\FileUploaderTrait;

    public function index(Restaurant $restaurant)
    {
        $images = $restaurant->images;
        return view('admin.restaurant.image.index', compact('restaurant', 'images'));
    }


    public function store(Request $request, Restaurant $restaurant)
    {


        if ($request->hasFile('file')) {
            $file = $request->file('file');

            $uniqueFileName = uniqid() . '_' . time();
            $path = $this->uploadFile($file, 'restaurants/' . $restaurant->id, 'public', $uniqueFileName);
            $restaurant->images()->create([
                'name' => $file->getClientOriginalName(),
                'url' => $path
            ]);
        }
        return  response()->json(
            [
                'message' => 'Image uploaded successfully.😎',
            ],
            200
        );
    }
}
