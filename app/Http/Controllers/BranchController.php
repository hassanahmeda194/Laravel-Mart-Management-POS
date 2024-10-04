<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;

class BranchController extends Controller
{

    public function index()
    {
        $branches = Branch::all();
        return view('branches.index', compact('branches'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone_number' => 'required',
            'country' => 'required',
            'city' => 'required',
            'email' => 'required',
            'address' => 'required'
        ]);
        try {
            Branch::create([
                'name' => $request->name,
                'phone_number' => $request->phone_number,
                'country' => $request->country,
                'city' => $request->city,
                'email' => $request->email,
                'is_active' => $request->has('is_active') ? true : false,
                'address' => $request->address
            ]);
            return back()->with('success', 'Branch Added Successfully!');
        } catch (\Exception $e) {
            return back()->with('error', 'Branch Added Failed!');
        }
    }

    public function edit(Request $request)
    {
        try {
            return view('partials.modals.edit-branch', [
                'branch' => Branch::find($request->id)
            ])->render();
        } catch (\Throwable $th) {
            return response()->json('error', 'Branch Added Failed!');
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'phone_number' => 'required',
            'country' => 'required',
            'city' => 'required',
            'email' => 'required',
            'is_active' => 'required',
            'address' => 'required'
        ]);
        try {
            Branch::find($id)->update([
                'name' => $request->name,
                'phone_number' => $request->phone_number,
                'country' => $request->country,
                'city' => $request->city,
                'email' => $request->email,
                'is_active' => $request->has('is_active') ? true : false,
                'address' => $request->address
            ]);
            return back()->with('success', 'Branch Updated Successfully!');
        } catch (\Exception $e) {
            return back()->with('error', 'Branch Updated Failed!');
        }
    }

    public function destroy($id)
    {
        try {
            Branch::find($id)->delete();
            return back()->with('success', 'Branch Deleted Successfully!');
        } catch (\Throwable $th) {
            return back()->with('error', 'Branch Deleted Failed!');
        }
    }
}
