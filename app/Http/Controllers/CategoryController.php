<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:categories|max:100',
            'category_image' => 'required|image|mimes:jpeg,png,jpg|max:4048',
            'is_active' => 'required|boolean',
        ]);

        if ($request->hasFile('category_image')) {
            $path = $request->file('category_image')->store('category_image', 'public');
            $validated['category_image'] = $path;
        }
        Category::create($validated);
        return redirect()->route('category.index')->with('success', 'دسته بندی :  '.$validated['name'] .'  با موفقیت ایجاد شد');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::findOrFail($id);
        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'name' => [
                'required',
                'max:100',
                Rule::unique('categories')->ignore($id)
            ],
            'category_image' => 'image|mimes:jpeg,png,jpg|max:4048',
            'is_active' => 'required|boolean',
        ]);

        $category = Category::findOrFail($id);
        if ($request->hasFile('category_image')) {
            if ($category->category_image) {
                Storage::disk('public')->delete($category->category_image);
            }
            $path = $request->file('category_image')->store('category_images', 'public');
            $data['category_image'] = $path;
        }

        $category->fill($data);
        $category->save();
        return redirect()->route('category.index')->with('success', 'دسته بندی :  '.$data['name'] .'  با موفقیت بروزرسانی شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        if ($category->category_image) {
            Storage::disk('public')->delete($category->category_image);
        }
        $category->delete();
        return redirect()->route('category.index')->with('success', 'دسته بندی :  '.$category['name'] .'  با موفقیت حذف شد');
    }
}
