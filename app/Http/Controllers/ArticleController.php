<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
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
        if (request('author')) {
            $author = User::firstWhere('username', request('author'));
            $title = ' by ' . $author->name;
        }

        return view('home.articles', [
            "title" => "All Articles" . $title,
            "articles" => Article::latest()->filter(request(['search', 'category', 'author']))->paginate(6)->withQueryString()
        ]);
    }
    public function show(Article $article)
    {
        return view('home.article', [
            "title" => "Article",
            "article" => $article,
        ]);
    }
}