<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('admin');
        return view('dashboard.manageproducts', [
            'products' => Product::orderBy('name')->get(),
            'title' => 'Dashboard'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('admin');
        return view('dashboard.addproducts', [
            'categories' => Category::orderBy('name')->get(),
            'title' => 'Dashboard'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('admin');
        $validatedData = $request->validate([
            'name' => 'required|min:5|max:80',
            'price' => 'required',
            'quantity' => 'required',
            'image' => 'image|file|max:1024',
            'category_id' => 'required',
            'slug' => 'unique:products',
            'des' => 'required',
        ]);

        $name = $request->input('name');

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('post-images');
        }

        Product::create($validatedData);
        return redirect('/dashboard')->with('success', "New Product: $name Has Been Added!");
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $dashboard)
    {
        $this->authorize('admin');
        return view('dashboard.show', [
            'title' => 'Dashboard',
            'product' => $dashboard,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $dashboard)
    {

        $this->authorize('admin');
        return view('dashboard.edit', [
            'product' => $dashboard,
            'categories' => Category::orderBy('name')->get(),
            'title' => 'Dashboard',
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $dashboard)
    {
        $this->authorize('admin');
        $rules = [
            'name' => 'required|min:5|max:80',
            'price' => 'required',
            'quantity' => 'required',
            'image' => 'image|file|max:1024',
            'category_id' => 'required',
            'slug' => 'unique:products',
            'des' => 'required',
        ];
        $name = $request->input('name');

        if ($request->slug != $dashboard->slug) {
            $rules['slug'] = 'required|unique:products';
        }
        $validatedData = $request->validate($rules);

        if ($request->file('image')) {
            if ($request->oldImg) {
                Storage::delete($request->oldImg);
            }
            $validatedData['image'] = $request->file('image')->store('post-images');
        }

        Product::where('id', $dashboard->id)->update($validatedData);
        return redirect('/dashboard/')->with('success', "Product: $name Has Been Updated!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $dashboard)
    {
        $this->authorize('admin');
        if ($dashboard->image) {
            Storage::delete($dashboard->image);
        }
        Product::destroy($dashboard->id);
        return redirect('/dashboard')->with('success', "Product: $dashboard->name Has Been Deleted!");
    }
    public function checkslug(Request $request)
    {
        $slug = SlugService::createSlug(Product::class, 'slug', $request->name);
        return response()->json(['slug' => $slug]);
    }
}
