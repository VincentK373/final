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
            'name' => 'required|max:255',
            'username' => 'required|min:3|max:25|unique:users',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:8|max:255'
        ]);
        // $validated['password']=bcrypt($validated['password']);
        $validated['password'] = Hash::make($validated['password']);
        User::create($validated);
        // $request->session()->flash('success', 'Registration Success');
        return redirect('/login')->with('success', 'Registration success');
    }
}