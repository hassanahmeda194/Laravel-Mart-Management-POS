<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        $user = User::with('branch', 'role')->find(Auth::user()->id);
        return view('user.profile', compact('user'));
    }
    public function update(Request $request, string $id)
    {
        $request->validate([
            'user_id' => 'required',
            'name' => 'required|string',
            'phone_number' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $id,
            'country' => 'required|string',
            'city' => 'required|string',
            'address' => 'required',
            'profile_image' => 'nullable|image|max:2048',
        ]);

        try {
            $user = User::findOrFail($id);
            $user->username = $request->name;
            $user->phone_number = $request->phone_number;
            $user->email = $request->email;
            $user->country = $request->country;
            $user->city = $request->city;
            $user->branch_id = $request->branch_id;
            $user->role_id = $request->role_id;
            $user->address = $request->address;
            if ($request->filled('password')) {
                $request->validate([
                    'password' => 'required|confirmed',
                    'password_confirmation' => 'required',
                ]);
                $user->password = Hash::make($request->password);
            }
            if ($request->hasFile('profile_image')) {
                $path = $request->file('profile_image')->store('profile-images');
                $user->profile_image = $path;
            }
            $user->save();
            return back()->with('success', 'User updated successfully');
        } catch (\Exception $e) {
            return back()->with('error', "{$e->getMessage()}");
        }
    }
}
