<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MenuStoreRequest;
use App\Http\Requests\Admin\MenuUpdateRequest;
use App\Models\Menu;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MenuController extends Controller
{
    public function index(Request $request): View
    {
        $menus = Menu::all();

        return view('menu.index', compact('menus'));
    }

    public function create(Request $request): View
    {
        return view('menu.create');
    }

    public function store(MenuStoreRequest $request): RedirectResponse
    {
        $menu = Menu::create($request->validated());

        $request->session()->flash('menu.id', $menu->id);

        return redirect()->route('menu.index');
    }

    public function show(Request $request, Menu $menu): View
    {
        return view('menu.show', compact('menu'));
    }

    public function edit(Request $request, Menu $menu): View
    {
        return view('menu.edit', compact('menu'));
    }

    public function update(MenuUpdateRequest $request, Menu $menu): RedirectResponse
    {
        $menu->update($request->validated());

        $request->session()->flash('menu.id', $menu->id);

        return redirect()->route('menu.index');
    }

    public function destroy(Request $request, Menu $menu): RedirectResponse
    {
        $menu->delete();

        return redirect()->route('menu.index');
    }
}
