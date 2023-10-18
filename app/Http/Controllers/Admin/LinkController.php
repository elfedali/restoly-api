<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LinkStoreRequest;
use App\Http\Requests\Admin\LinkUpdateRequest;
use App\Models\Link;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LinkController extends Controller
{
    public function index(Request $request): View
    {
        $links = Link::all();

        return view('link.index', compact('links'));
    }

    public function create(Request $request): View
    {
        return view('link.create');
    }

    public function store(LinkStoreRequest $request): RedirectResponse
    {
        $link = Link::create($request->validated());

        $request->session()->flash('link.id', $link->id);

        return redirect()->route('link.index');
    }

    public function show(Request $request, Link $link): View
    {
        return view('link.show', compact('link'));
    }

    public function edit(Request $request, Link $link): View
    {
        return view('link.edit', compact('link'));
    }

    public function update(LinkUpdateRequest $request, Link $link): RedirectResponse
    {
        $link->update($request->validated());

        $request->session()->flash('link.id', $link->id);

        return redirect()->route('link.index');
    }

    public function destroy(Request $request, Link $link): RedirectResponse
    {
        $link->delete();

        return redirect()->route('link.index');
    }
}
