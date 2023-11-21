<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('categories.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories',
            'content' => 'required',
            'parent_id' => 'nullable|exists:categories,id',
        ]);

        Category::create($request->all());

        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }

    public function edit(Category $category)
    {
        $categories = Category::all();
        return view('categories.edit', compact('category', 'categories'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|unique:categories,name,' . $category->id,
            'content' => 'required',
            'parent_id' => 'nullable|exists:categories,id',
        ]);

        $category->update($request->all());

        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }
}
