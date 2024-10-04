<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        $Brand_code = $this->getBrandCode();
        $brands = Brand::all();
        return view('Brand.index', compact('brands', 'Brand_code'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);
        try {
            Brand::create([
                'brand_code' => $this->getBrandCode(),
                'name' => $request->name
            ]);
            return back()->with('success', 'Brand Added Successfully!');
        } catch (\Exception $e) {
            dd($e->getMessage());
            return back()->with('error', 'Brand Added Failed!');
        }
    }

    public function edit(Request $request)
    {
        try {
            return view('partials.modals.edit-brand', [
                'brand' => Brand::find($request->id)
            ])->render();
        } catch (\Exception $e) {
            return response()->json('error', $e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required'
        ]);
        try {
            Brand::find($id)->update([
                'name' => $request->name
            ]);
            return back()->with('success', 'Brand Updated Successfully!');
        } catch (\Throwable $th) {
            return back()->with('error', 'Brand Update Failed!');
        }
    }

    public function destroy($id)
    {
        try {
            Brand::find($id)->delete();
            return back()->with('success', 'Brand Deleted Successfully!');
        } catch (\Throwable $th) {
            return back()->with('error', 'Brand Deleted Failed!');
        }
    }

    private function getBrandCode()
    {
        $latestBrandId = Brand::latest()->value('id') ?? 0;
        $nextBrandId = $latestBrandId + 1;
        return 'BRD-' . str_pad($nextBrandId, 3, '0', STR_PAD_LEFT);
    }
}
