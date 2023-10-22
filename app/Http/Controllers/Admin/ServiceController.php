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
        $services = Service::all()->sortByDesc('id');

        return view('admin.service.index', compact('services'));
    }


    public function store(ServiceStoreRequest $request): RedirectResponse
    {
        $service = new Service();
        $service->setTranslations('name', [
            app()->getLocale() => $request->validated()['name'],
        ]);
        $service->is_active = $request->validated()['is_active'] ?? false;
        $service->save();
        return redirect()->route('admin.service.index')->with('success', 'Service created successfully.');
    }

    public function show(Request $request, Service $service): View
    {
        return view('admin.service.show', compact('service'));
    }

    public function edit(Request $request, Service $service): View
    {
        return view('admin.service.edit', compact('service'));
    }

    public function update(ServiceUpdateRequest $request, Service $service): RedirectResponse
    {
        $service->update($request->validated());
        return redirect()->route('admin.service.show', $service->id)->with('success', 'Service updated successfully.');
    }

    public function destroy(Request $request, Service $service): RedirectResponse
    {
        $service->delete();

        return redirect()->route('admin.service.index')->with('success', 'Service deleted successfully.');
    }
}
