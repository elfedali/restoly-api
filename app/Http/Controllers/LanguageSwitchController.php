<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LanguageSwitchController extends Controller
{

    public function __invoke(Request $request)
    {
        $request->validate([
            'locale' => ['required', 'string', 'in:en,ar,fr'],
        ]);

        session()->put('locale', $request->locale);

        return redirect()->back();
    }
}
