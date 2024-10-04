<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Branch;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index()
    {
        $roles = Auth::user()->role_id == 1
            ?  Role::select('name', 'id')->get()
            : Role::whereNot('id', 1)->select('name', 'id')->get();
        $branches = Branch::select('id', 'name', 'address')->get();
        $users = Auth::user()->role_id == 1
            ? User::with(['role', 'branch'])->get()
            : User::with(['role', 'branch'])->whereNot('role_id', 1)->get();
        $User_Id = $this->getUserId();
        return view('user.index', compact('roles', 'branches', 'users', 'User_Id'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'name' => 'required|string',
            'phone_number' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
            'country' => 'required|string',
            'city' => 'required|string',
            'branch_id' => 'required|numeric|exists:branches,id',
            'role_id' => 'required|numeric|exists:roles,id',
            'address' => 'required',
            'profile_image' => 'nullable|image|max:2048',
        ]);
        try {
            $path = '';
            if ($request->hasFile('profile_image')) {
                $name = uniqid() . '.' . $request->profile_image->getClientOriginalName();
                $request->profile_image->move(public_path('profile-image/'), $name);
                $path = 'profile-image/' . $name;
            }
            User::create([
                'User_Id' => $this->getUserId(),
                'username' => $request->name,
                'phone_number' => $request->phone_number,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'country' => $request->country,
                'city' => $request->city,
                'branch_id' => $request->branch_id,
                'role_id' => $request->role_id,
                'is_active' => $request->has('is_active') ? true : false,
                'address' => $request->address,
                'profile_image' => $path,
            ]);
            return back()->with('success', 'User Added Successfully');
        } catch (\Exception $e) {
            dd($e->getMessage());
            return back()->with('error', 'User Added Failed');
        }
    }

    public function edit(Request $request)
    {
        try {
            $roles = Auth::user()->role_id == 1
                ?  Role::select('name', 'id')->get()
                : Role::whereNot('id', 1)->select('name', 'id')->get();
            $branches = Branch::select('id', 'name', 'address')->get();
            $user = User::with(['role', 'branch'])->find($request->id);
            return view('partials.modals.edit-user', compact('roles', 'branches', 'user'))->render();
        } catch (\Throwable $th) {
            return response()->json('error', 'User Not found!');
        }
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
            'branch_id' => 'required|numeric|exists:branches,id',
            'role_id' => 'required|numeric|exists:roles,id',
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
            $user->is_active = $request->has('is_active');
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
            dd($e->getMessage());
            return back()->with('error', 'User update failed');
        }
    }

    public function destroy(string $id)
    {
        try {
            User::find($id)->delete();
            return back()->with('success', 'User Deleted Successfully!');
        } catch (\Throwable $th) {
            return back()->with('error', 'User Deleted Failed!');
        }
    }

    private function getUserId()
    {
        $latestUserId = User::withTrashed()->latest()->value('id') ?? 0;
        return 'REG-' . $latestUserId + 1;
    }

}
