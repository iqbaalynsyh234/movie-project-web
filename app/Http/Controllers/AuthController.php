<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    function showLoginForm()
    {
        return view('auth/login');
    }
    function dashboard(Request $request)
    {
        $user = Auth::user(); 
        $searchQuery = $request->query('s');
        $page = $request->query('page', 1); 
        $movies = [];

        if ($searchQuery) {
            $apiUrl = "https://www.omdbapi.com/?apikey=f9d55ac1&s=" . urlencode($searchQuery) . "&page=" . $page;
            $response = file_get_contents($apiUrl);
            $data = json_decode($response, true);

            if ($data['Response'] === 'True') {
                $movies = $data['Search'];
            }
        }

        if ($request->ajax()) {
            return response()->json($movies);
        }

        return view('dashboard', compact('user', 'movies', 'searchQuery'));
    }

    function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
    
        if (Auth::attempt($credentials, $request->remember)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard')->with('success', 'Login berhasil!');
        }
    
        return back()->with('error', 'Email atau password salah.');
    }
    

    function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('auth/login');
    }
    function showRegisterForm()
    {
        return view('auth/register');
    }

    function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = \App\Models\User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        Auth::login($user);

        return redirect('/dashboard');
    }

}
