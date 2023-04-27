<?php

namespace App\Http\Controllers;

use App\Models\Category;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CategoryController extends Controller
{
    public function category()
    {
        return view('home.categories', [
            'title' => 'Categories',
            'categories' => Category::orderBy('name')->get(),
        ]);
    }
    public function manage()
    {
        $this->authorize('admin');
        return view('dashboard.managecategory', [
            'title' => 'Dashboard',
            'categories' => Category::orderBy('name')->get(),
        ]);
    }
    public function store(Request $request)
    {
        $this->authorize('admin');
        $validated = $request->validate([
            'name' => 'required|unique:categories',
        ]);

        $name = $request->input('name');

        $slug = strtolower(str_replace(' ', '-', $validated['name']));
        $validated['slug'] = $slug;
        Category::create($validated);
        return redirect('/manage-categories')->with('success', "New Category: $name Has Been Created!");
    }
    public function delete($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $category->delete();

        return redirect('/manage-categories')->with('success', "Category: $category->name Has Been Deleted");
    }
}
