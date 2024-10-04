<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    public function index()
    {
        $units = Unit::all();
        return view('unit.index', compact('units'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'short_code' => 'required',
            'base_unit' => 'nullable',
            'operator' => 'required',
            'operator_value' => 'required',
        ]);
        try {
            Unit::create([
                'name' => $request->name,
                'short_code' => $request->short_code,
                'base_unit' => $request->base_unit,
                'operator' => $request->operator,
                'operator_value' => $request->operator_value,
            ]);
            return back()->with('success', 'Unit Added Successfully!');
        } catch (\Exception $e) {
            return back()->with('error', 'Unit Added Failed!');
        }
    }

    public function edit(Request $request)
    {
        try {
            return view('partials.modals.edit-Unit', [
                'Unit' => Unit::find($request->id)
            ])->render();
        } catch (\Exception $e) {
           dd($e->getMessage());
            return response()->json('error', 'Unit Added Failed!');
        }
    }

    public function update(Request $request, $id)
    {
         $request->validate([
            'name' => 'required',
            'short_code' => 'required',
            'base_unit' => 'nullable',
            'operator' => 'required',
            'operator_value' => 'required',
        ]);
        try {
            Unit::find($id)->update([
                'name' => $request->name,
                'short_code' => $request->short_code,
                'base_unit' => $request->base_unit,
                'operator' => $request->operator,
                'operator_value' => $request->operator_value,
            ]);
            return back()->with('success', 'Unit Updated Successfully!');
        } catch (\Exception $e) {
            return back()->with('error', 'Unit Updated Failed!');
        }
    }

    public function destroy($id)
    {
        try {
            Unit::find($id)->delete();
            return back()->with('success', 'Unit Deleted Successfully!');
        } catch (\Throwable $th) {
            return back()->with('error', 'Unit Deleted Failed!');
        }
    }
}
