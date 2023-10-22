<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryStoreRequest;
use App\Http\Requests\Admin\CategoryUpdateRequest;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function index(Request $request): View
    {
        $categories = Category::all()->sortByDesc('id');

        return view('admin.category.index', compact('categories'));
    }



    public function store(CategoryStoreRequest $request): RedirectResponse
    {
        $category = new Category();
        $category->setTranslations('name', [
            app()->getLocale() => $request->validated()['name'],
        ]);
        $category->is_active = $request->validated()['is_active'] ?? false;
        $category->save();

        return redirect()->route('admin.category.index')->with('success', 'Category created successfully.');
    }

    public function show(Request $request, Category $category): View
    {
        return view('admin.category.show', compact('category'));
    }



    public function update(CategoryUpdateRequest $request, Category $category): RedirectResponse
    {
        $category->update($request->validated());

        return redirect()->route('admin.category.show', $category->id)->with('success', 'Category updated successfully.');
    }

    public function destroy(Request $request, Category $category): RedirectResponse
    {
        $category->delete();

        return redirect()->route('admin.category.index')->with('success', 'Category deleted successfully.');
    }

    // toggle is_active
    public function toggleIsActive(Request $request, Category $category)
    {
        $category->is_active = !$category->is_active;
        $category->save();

        return view('admin.category.show', compact('category'))->with('success', 'Category updated successfully.');
    }
}
