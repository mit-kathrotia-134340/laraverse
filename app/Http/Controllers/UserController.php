<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    //

    public function create()
    {
        return view('users.register');
    }

    public function login()
    {
        return view('users.login');
    }
    public function store(Request $request)
    {
        $validate = $request->validate([
            'username' => ['required', 'min:5', 'alpha_dash', 'lowercase', Rule::unique('users')],
            'name' => 'required|min:4',
            'email' => ['required', Rule::unique('users'), 'email'],
            'password' => ['required', 'min:6', 'max:10', 'confirmed'],
            'avatar' => 'nullable|image',
        ]);
        if($request->hasFile('avatar')){
            $validate['avatar'] = $request->file('avatar')->store('avatars','public');
        }
        // dd($validate);
        $validate['password'] = bcrypt($validate['password']);
        // dd($validate);
        $user = User::create($validate);
        auth()->login($user);
        return redirect('/');
        // dd($user);
    }

    public function authenticate(Request $request)
    {
        $validate = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if(auth()->attempt($validate)){
            $request->session()->regenerate();
            return redirect('/');
        }
        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
    }

    public function logout(Request $request){
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerate();

        return redirect('/');
    }
}
