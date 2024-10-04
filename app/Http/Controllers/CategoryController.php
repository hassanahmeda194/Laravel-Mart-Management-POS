<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Faker\Core\Number;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $category_code = $this->getCategoryCode();
        $categories = Category::all();
        return view('category.index', compact('categories', 'category_code'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);
        try {
            Category::create([
                'category_code' => $this->getCategoryCode(),
                'name' => $request->name
            ]);
            return back()->with('success', 'Category Added Successfully!');
        } catch (\Throwable $th) {
            return back()->with('error', 'Category Added Failed!');
        }
    }

    public function edit(Request $request)
    {
        try {
            return view('partials.modals.edit-category', [
                'category' => Category::find($request->id)
            ])->render();
        } catch (\Exception $e) {
            return response()->json('error', "{$e->getMessage()}");
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required'
        ]);
        try {
            Category::find($id)->update([
                'name' => $request->name
            ]);
            return back()->with('success', 'Category Updated Successfully!');
        } catch (\Throwable $th) {
            return back()->with('error', 'Category Update Failed!');
        }
    }

    public function destroy($id)
    {
        try {
            Category::find($id)->delete();
            return back()->with('success', 'Category Deleted Successfully!');
        } catch (\Throwable $th) {
            return back()->with('error', 'Category Deleted Failed!');
        }
    }

    private function getCategoryCode()
    {
        $latestCategoryId = Category::latest()->value('id') ?? 0;
        $nextCategoryId = $latestCategoryId + 1;
        return 'CAT-' . str_pad($nextCategoryId, 3, '0', STR_PAD_LEFT);
    }
}
