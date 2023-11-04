<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use App\Traits\FileUploaderTrait;
use Illuminate\Http\Request;
use Ramsey\Uuid\Type\Integer;

class UploadImagesController extends Controller
{
    use FileUploaderTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, Restaurant $restaurant)
    {

        $images = $restaurant->images;
        foreach ($images as $image) {
            $image->url = $image->path();
        }

        return response()->json([

            'images' => $restaurant->images,
        ]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Restaurant $restaurant)
    {
        // todo : Check the 6 images uploaded, need more work.
        // todo : Display errors in the front end.
        $request->validate([
            'images' => 'required|array|min:1|max:6',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $maxUpload = 6 - $restaurant->images->count(); // Calculate maximum images allowed

        if ($maxUpload <= 0) {
            return response()->json([
                'message' => __('label.max-images'),
            ], 422);
        }

        $uploadedImages = 0;

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                if ($uploadedImages < $maxUpload) {
                    $uniqueFileName = uniqid() . '_' . time();
                    $path = $this->uploadFile($file, 'restaurants/' . $restaurant->id, 'public', $uniqueFileName);
                    $restaurant->images()->create([
                        'name' => $file->getClientOriginalName(),
                        'url' => $path
                    ]);
                    $uploadedImages++;
                } else {
                    break; // Stop uploading once maximum is reached
                }
            }
        }

        return response()->json([
            'message' => __('label.uploaded'),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {

        $image = \App\Models\Image::find($id);

        if ($image) {
            try {

                $this->deleteFile($image->url, 'public');
                $image->delete();
            } catch (\Exception $e) {
                return response()->json([
                    'message' => __('label.not-found'),
                    'data' => $id,
                ], 500);
            }

            return response()->json([
                'message' => __('label.deteted'),
                'data' => $id,
            ], 200);
        } else {
            return response()->json([
                'message' => __('label.not-found'),
                'data' => $id,
            ], 404);
        }
    }
}
