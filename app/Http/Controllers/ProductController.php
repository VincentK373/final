<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function home()
    {
        return view('home.home', [
            "title" => "Home",
        ]);
    }
    public function about()
    {
        return view('home.about', [
            "title" => "About",
        ]);
    }
    public function index()
    {
        $title = '';
        if (request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $title = ' in ' . $category->name;
        }

        return view('home.products', [
            "title" => "All Products" . $title,
            "products" => Product::orderBy('name')->filter(request(['search', 'category']))->paginate(6)->withQueryString()
        ]);
    }
}
