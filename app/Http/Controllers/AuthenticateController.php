<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\RedirectResponse;

use function PHPSTORM_META\map;

class AuthenticateController extends Controller
{
    public function index(){
        return view('main.login.index', [
            'title' => 'Login',
        ]);
    }

    public function register(){
        return view('main.register.index',[
            'title' => 'register',
        ]);
        }

    public function authenticate(Request $request){
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();

            return redirect()->intended('store');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function store(User $user, Request $request){
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'member',
        ]);

        $user->create($validatedData);

        return redirect()->intended('/login')->with('success', 'Your account has been added successfully');
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->intended('store');
    }
}
