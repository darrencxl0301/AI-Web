<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\TrainingJob;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if (Auth::user()->isAdmin()) {
                return redirect()->intended('/admin/dashboard');
            }

            return redirect()->intended('/dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function showLogin()
    {
        return view('login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
    public function dashboard()
    {
        $user = auth()->user();

        $stats = [
            'datasets' => \App\Models\Dataset::where('user_id', $user->id)->count(),
            'active_models' => \App\Models\TrainingJob::where('user_id', $user->id)
                                ->where('is_published', true)->count(),
            'total_jobs' => \App\Models\TrainingJob::where('user_id', $user->id)->count(),
        ];

        $recentActivity = \App\Models\TrainingJob::where('user_id', $user->id)
                            ->latest()
                            ->take(5)
                            ->get();

        return view('dashboard', compact('stats', 'recentActivity'));
    }
}