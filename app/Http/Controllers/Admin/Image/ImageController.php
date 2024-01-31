<?php

namespace App\Http\Controllers\Admin\Image;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function index()
    {
        $images = \App\Models\Image::all();
        return view('admin.image.index', compact('images'));
    }
}
