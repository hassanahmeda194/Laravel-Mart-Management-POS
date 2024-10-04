<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{

    public function index()
    {
        $roles = Role::all();
        return view('roles.index', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);
        try {
            Role::create([
                'name' => $request->name
            ]);
            return back()->with('success', 'Role Added Successfully!');
        } catch (\Throwable $th) {
            return back()->with('error', 'Role Added Failed!');
        }
    }

    public function edit(Request $request)
    {
        try {
            return view('partials.modals.edit-role', [
                'role' => Role::find($request->id)
            ])->render();
        } catch (\Exception $e) {
            dd($e->getMessage());
            return response()->json('error', 'Branch Added Failed!');
        }
    }
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required'
        ]);
        try {
            Role::find($id)->update([
                'name' => $request->name
            ]);
            return back()->with('success', 'Role Updated Successfully!');
        } catch (\Throwable $th) {
            return back()->with('error', 'Role Updated Failed!');
        }
    }
    public function destroy(string $id)
    {
        try {
            Role::find($id)->delete();
            return back()->with('success', 'Role Deleted Successfully!');
        } catch (\Throwable $th) {
            return back()->with('error', 'Role Deleted Failed!');
        }
    }
}
