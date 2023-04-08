<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.managepost', [
            'articles' => Article::where('user_id', auth()->user()->id)->get(),
            'title' => 'Dashboard'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.addpost', [
            'categories' => Category::orderBy('name')->get(),
            'title' => 'dashboard'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'unique:articles',
            'category_id' => 'required',
            'image' => 'image|file|max:1024',
            'body' => 'required|min:8',
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('post-images');
        }

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['synopsis'] = Str::limit(strip_tags($request->body), 150, '...');
        Article::create($validatedData);
        return redirect('/dashboard')->with('success', 'New Post Has Been Added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $dashboard)
    {
        return view('dashboard.show', [
            'title' => 'Dashboard',
            'article' => $dashboard,

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $dashboard)
    {
        return view('dashboard.edit', [
            'article' => $dashboard,
            'categories' => Category::orderBy('name')->get(),
            'title' => 'Dashboard',

        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $dashboard)
    {
        $rules = [
            'title' => 'required|max:255',
            'category_id' => 'required',
            'image' => 'image|file|max:1024',
            'body' => 'required|min:8',
        ];

        if ($request->slug != $dashboard->slug) {
            $rules['slug'] = 'required|unique:articles';
        }
        $validatedData = $request->validate($rules);

        if ($request->file('image')) {
            if ($request->oldImg) {
                Storage::delete($request->oldImg);
            }
            $validatedData['image'] = $request->file('image')->store('post-images');
        }

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['synopsis'] = Str::limit(strip_tags($request->body), 200);
        Article::where('id', $dashboard->id)->update($validatedData);
        return redirect('/dashboard/')->with('success', 'Article Has Been Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $dashboard)
    {
        if ($dashboard->image) {
            Storage::delete($dashboard->image);
        }
        Article::destroy($dashboard->id);
        return redirect('/dashboard')->with('success', 'Article Has Been Deleted!');
    }
    public function checkslug(Request $request)
    {
        $slug = SlugService::createSlug(Article::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
    public function profile()
    {
        return view('dashboard.profile', [
            'title' => 'Dashboard',
            'first_name' => auth()->user()->first_name,
            'last_name' => auth()->user()->last_name,
            'username' => auth()->user()->username,
            'email' => auth()->user()->email,
            'date' => auth()->user()->created_at,
            'place' => auth()->user()->place,
            'd' => auth()->user()->date,
            'm' => auth()->user()->month,
            'y' => auth()->user()->year,
            'hp' => auth()->user()->hp,
            'gender' => auth()->user()->gender,
        ]);
    }
    public function change()
    {
        return view('dashboard.changeprofile', [
            'title' => 'Dashboard',
        ]);
    }
}
