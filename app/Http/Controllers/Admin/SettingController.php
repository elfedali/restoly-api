<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SettingStoreRequest;
use App\Http\Requests\Admin\SettingUpdateRequest;
use App\Models\Setting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SettingController extends Controller
{
    public function index(Request $request): View
    {
        $settings = Setting::all();

        return view('setting.index', compact('settings'));
    }

    public function create(Request $request): View
    {
        return view('setting.create');
    }

    public function store(SettingStoreRequest $request): RedirectResponse
    {
        $setting = Setting::create($request->validated());

        $request->session()->flash('setting.id', $setting->id);

        return redirect()->route('setting.index');
    }

    public function show(Request $request, Setting $setting): View
    {
        return view('setting.show', compact('setting'));
    }

    public function edit(Request $request, Setting $setting): View
    {
        return view('setting.edit', compact('setting'));
    }

    public function update(SettingUpdateRequest $request, Setting $setting): RedirectResponse
    {
        $setting->update($request->validated());

        $request->session()->flash('setting.id', $setting->id);

        return redirect()->route('setting.index');
    }

    public function destroy(Request $request, Setting $setting): RedirectResponse
    {
        $setting->delete();

        return redirect()->route('setting.index');
    }
}
