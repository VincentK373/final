<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreContoller extends Controller
{
    public function genre(Genre $category)
    {
        return view('category', [
            'title' => 'Categories',
            'categories' => Genre::orderBy('name')->get(),
        ]);
    }
}
