<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AuthInterface;
use Illuminate\Support\Facades\Auth;



class AuthController extends Controller
{
    protected $authService;

    public function __construct(AuthInterface $authService)
    {
        $this->authService = $authService;
    }


    public function showRegister()
    {
        return view('Auth.register');
    }

    public function register(Request $request)
    {
        $user = $this->authService->register($request->all());
        if(!$user){
            return back()->withErrors('The provided credentials do not match our records.');

        }
        Auth::login($user);
        return redirect()->route('properties')->withSuccess('Registration successful!');
        
    }

    public function showLogin()
    {
        return view('Auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if ($this->authService->login($credentials)) {
            return redirect()->intended(route('welcome'))->withSuccess('Login successful!');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        $this->authService->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('properties'))->withSuccess('logged out!');
    }
}
