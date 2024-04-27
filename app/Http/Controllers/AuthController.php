<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AuthInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

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




    public function showResetEmailForm(Request $request)
{

    $token = $request->token;
    $email = $request->email;

    if (Auth::check()) {
        Auth::logout();
    }

    if (isset($token) && isset($email)) {
        return view('auth.reset-password', compact('token', 'email'));
    } else {
        return view('auth.reset-email');
    
    }

    
}



public function sendResetLinkEmail(Request $request)
{
    $request->validate(['email' => 'required|email']);

    $status = Password::sendResetLink(
        $request->only('email')
    );

    return $status === Password::RESET_LINK_SENT
        ? redirect()->route('password.reset')->withSuccess('Password reset link sent!')
        : back()->withErrors(['email' => __($status)]);
}

public function resetPassword(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'token' => 'required',
        'password' => 'required|confirmed|min:8',
    ]);

    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function ($user, $password) {
            $user->forceFill([
                'password' => Hash::make($password)
            ])->save();
        }
    );

    return $status == Password::PASSWORD_RESET
        ? redirect()->route('login')->withSuccess('Password has been reset!')
        : back()->withErrors(['email' => [__($status)]]);
}




}
