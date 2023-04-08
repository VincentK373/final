<?php

namespace App\Http\Controllers;

use App\Models\Category;

use Illuminate\Http\Request;

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
        return view('dashboard.managecategory', [
            'title' => 'Dashboard',
            'categories' => Category::orderBy('name')->get(),
        ]);
    }
}
