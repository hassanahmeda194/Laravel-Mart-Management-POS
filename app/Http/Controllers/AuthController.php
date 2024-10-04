<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function login()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }
        return view('auth.login');
    }

    public function submitLogin(Request $request)
    {
        $request->validate([
            'User_Id' => 'required',
            'password' => 'required'
        ]);
        $user = User::with('branch')->where('User_Id', $request->User_Id)->first();

        if (!$user) {
            return back()->with('error', 'User not found');
        }
        if (!$user->is_active) {
            return back()->with('error', 'Your account has been deactivated');
        }

        if ($user->branch && $user->branch->is_active == 0) {
            return back()->with('error', 'The branch associated with your account is deactivated');
        }

        if (!Hash::check($request->password, $user->password)) {
            return back()->with('error', 'Invalid credentials');
        }
        Auth::login($user);
        return redirect()->route('dashboard')->with('success', 'User logged in successfully.');
    }


    public function dashboard()
    {
        return view('dashboard');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'user logout successfully');
    }
}
