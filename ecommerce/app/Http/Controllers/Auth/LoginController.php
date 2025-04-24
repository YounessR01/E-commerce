<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    // Show the login form
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Handle login request
    public function login(Request $request)
{
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        // Check if the user is verified
        if (!Auth::user()->hasVerifiedEmail()) {
            return redirect()->route('verification.notice');
        }

        return redirect()->intended('/home');
    }

    return back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
    ]);
}


    // Handle logout request
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }
    public function authenticated(Request $request, $user)
{
    if (!$user->hasVerifiedEmail()) {
        Auth::logout();
        return redirect()->route('verification.notice'); 
    }

    return redirect()->intended('/home'); 
}
}
