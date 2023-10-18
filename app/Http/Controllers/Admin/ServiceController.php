<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ServiceStoreRequest;
use App\Http\Requests\Admin\ServiceUpdateRequest;
use App\Models\Service;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ServiceController extends Controller
{
    public function index(Request $request): View
    {
        $services = Service::all();

        return view('service.index', compact('services'));
    }

    public function create(Request $request): View
    {
        return view('service.create');
    }

    public function store(ServiceStoreRequest $request): RedirectResponse
    {
        $service = Service::create($request->validated());

        $request->session()->flash('service.id', $service->id);

        return redirect()->route('service.index');
    }

    public function show(Request $request, Service $service): View
    {
        return view('service.show', compact('service'));
    }

    public function edit(Request $request, Service $service): View
    {
        return view('service.edit', compact('service'));
    }

    public function update(ServiceUpdateRequest $request, Service $service): RedirectResponse
    {
        $service->update($request->validated());

        $request->session()->flash('service.id', $service->id);

        return redirect()->route('service.index');
    }

    public function destroy(Request $request, Service $service): RedirectResponse
    {
        $service->delete();

        return redirect()->route('service.index');
    }
}
