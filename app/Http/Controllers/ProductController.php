<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Unit;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        $branch = Branch::all(['id', 'name']);
        $unit = Unit::where('base_unit', null)->get(['id', 'name']);
        $brand = Brand::all(['id', 'name']);
        $category = Category::all(['id', 'name']);
        $products = Product::with(['brand', 'category', 'unit', 'branch'])->get();
        return view('product.index', compact('brand', 'branch', 'unit', 'category', 'products'));
    }


    public function store(Request $request)
    {
        $request->validate([
            "name" => "required|string",
            "product_code" => "required|string|unique:products",
            "quantity" => "required|integer|min:0",
            "sales_price" => "required|numeric|min:0",
            "purchase_price" => "required|numeric|min:0",
            "tax_per_unit" => "required|numeric|min:0",
            "brand_id" => "required|exists:brands,id",
            "category_id" => "required|exists:categories,id",
            "unit_id" => "required|exists:units,id",
            "branch_id" => "required|exists:branches,id",
            "stock_alert" => "required|integer|min:0",
            "product_image" => 'required',
        ]);

        try {
            $path = '';
            if ($request->has('product_image')) {
                $name = uniqid() . '.' . $request->product_image->getClientOriginalName();
                $request->product_image->move(public_path('product-image/'), $name);
                $path = 'product-image/' . $name;
            }
            Product::create([
                'name' => $request->name,
                'product_code' => $request->product_code,
                'quantity' => $request->quantity,
                'sales_price' => $request->sales_price,
                'purchase_price' => $request->purchase_price,
                'tax_per_unit' => $request->tax_per_unit,
                'brand_id' => $request->brand_id,
                'category_id' => $request->category_id,
                'unit_id' => $request->unit_id,
                'branch_id' => $request->branch_id,
                "product_image" => $path,
            ]);
            return back()->with('success', 'Product added successfully!');
        } catch (\Exception $e) {
            dd($e->getMessage());
            return back()->with('error', 'Product added Failed!');
        }
    }

    public function edit(Request $request)
    {
        try {
            $branch = Branch::all(['id', 'name']);
            $unit = Unit::where('base_unit', null)->get(['id', 'name']);
            $brand = Brand::all(['id', 'name']);
            $category = Category::all(['id', 'name']);
            $product = Product::find($request->id);
            return view('partials.modals.edit-product', compact('brand', 'branch', 'unit', 'category', 'product'))->render();
        } catch (\Throwable $th) {
            return response()->json('error', 'Some thing Wants wrong');
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            "name" => "required|string",
            "quantity" => "required|integer|min:0",
            "sales_price" => "required|numeric|min:0",
            "purchase_price" => "required|numeric|min:0",
            "tax_per_unit" => "required|numeric|min:0",
            "brand_id" => "required|exists:brands,id",
            "category_id" => "required|exists:categories,id",
            "unit_id" => "required|exists:units,id",
            "branch_id" => "required|exists:branches,id",
            "stock_alert" => "required|integer|min:0",
            "product_image" => 'nullable|image',
        ]);

        try {
            $product = Product::findOrFail($id);
            $path = $product->product_image;

            if ($request->hasFile('product_image')) {
                $name = uniqid() . '.' . $request->product_image->getClientOriginalName();
                $request->product_image->move(public_path('product-image/'), $name);
                $path = 'product-image/' . $name;
            }

            $product->update([
                'name' => $request->name,
                'quantity' => $request->quantity,
                'sales_price' => $request->sales_price,
                'purchase_price' => $request->purchase_price,
                'tax_per_unit' => $request->tax_per_unit,
                'brand_id' => $request->brand_id,
                'category_id' => $request->category_id,
                'unit_id' => $request->unit_id,
                'branch_id' => $request->branch_id,
                'stock_alert' => $request->stock_alert,
                'product_image' => $path,
            ]);

            return redirect()->back()->with('success', 'Product updated successfully!');
        } catch (\Exception $e) {
            dd($e->getMessage());
            return redirect()->back()->with('error', 'Product update failed!');
        }
    }
    public function destroy($id)
    {
        try {
            Product::find($id)->delete();
            return redirect()->back()->with('success', 'Product deleted successfully!');
        } catch (\Exception $e) {
            dd($e->getMessage());
            return redirect()->back()->with('error', 'Product deletion failed!');
        }
    }

 public function searchProduct(Request $request)
{
    $products = Product::where('name', 'like', '%' . $request->data . '%')->get(); // corrected query
    return view('partials.pos.search-product', compact('products'))->render();
}
}
