<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Validation\Validator::validateRequired()
class SignUpController extends Controller
{
    public function signup()
    {
        return view('regis.signup.index', [
            'title' => 'SignUp',
        ]);
    }
    public function store(Request $request)
    {
        // return $request->all();
        $validated = $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:8|max:255',
            'username' => 'required|min:3|max:25|unique:users',
            'place' => 'required',
            'date' => 'required',
            'month' => 'required',
            'year' => 'required',
            'hp' => 'required',
            'gender' => 'required',
        ]);
        $validated['password'] = Hash::make($validated['password']);
        User::create($validated);
        return redirect('/login')->with('success', 'Registration success');
    }
}
