<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();
        if ($request->has('category_id') && $request->category_id != '') {
            $query->where('category_id', $request->category_id);
        }
        $products = $query->paginate(10);
        $categories = Category::all();
        return view('product.index', compact('products', 'categories'));
    }

    public function show(Product $product)
    {
        return view('product.show', compact('product'));
    }

    public function create()
    {
        return view('product.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'stock' => 'required|integer|min:0',
            'price' => 'required|integer|min:0',
            'description' => 'required|string|max:1500',
            'is_active' => 'required|boolean',
            'category_id' => 'required|exists:categories,id',
            'product_image' => 'required|image|max:2096',
            'product_images' => 'nullable|array', // باید فقط یکبار تعریف بشه
            'product_images.*' => 'nullable|image|max:4096',
        ], [
            'name.required' => 'وارد کردن نام محصول الزامی است.',
            'name.string' => 'نام محصول باید متن باشد.',
            'name.max' => 'نام محصول نباید بیشتر از ۲۵۵ کاراکتر باشد.',

            'stock.required' => 'مقدار موجودی را وارد کنید.',
            'stock.integer' => 'مقدار موجودی باید عدد صحیح باشد.',
            'stock.min' => 'مقدار موجودی نمی‌تواند منفی باشد.',

            'price.required' => 'وارد کردن قیمت محصول الزامی است.',
            'price.integer' => 'قیمت باید عدد صحیح باشد.',
            'price.min' => 'قیمت محصول نمی‌تواند منفی باشد.',

            'description.required' => 'توضیحات محصول را وارد کنید.',
            'description.string' => 'توضیحات باید به صورت متن باشد.',
            'description.max' => 'توضیحات نباید بیشتر از ۱۵۰۰ کاراکتر باشد.',

            'is_active.required' => 'وضعیت فعال بودن محصول الزامی است.',

            'category_id.required' => 'انتخاب دسته‌بندی الزامی است.',

            'product_image.required' => 'تصویر اصلی محصول را انتخاب کنید.',
            'product_image.image' => 'فایل تصویر اصلی باید یک عکس باشد.',
            'product_image.max' => 'حجم تصویر اصلی نباید بیشتر از ۲ مگابایت باشد.',

            'product_images.*.image' => 'هر فایل آپلود شده باید تصویر باشد.',
            'product_images.*.max' => 'هر تصویر نباید بیشتر از ۴ مگابایت باشد.',
        ]);


        $product = Product::create([
            'name' => $request->name,
            'stock' => $request->stock,
            'price' => $request->price,
            'description' => $request->description,
            'is_active' => $request->is_active,
            'category_id' => $request->category_id,
            'image' => $request->hasFile('product_image') ? $request->file('product_image')->store('products', 'public') : null,
        ]);

        if ($request->hasFile('product_images')) {
            foreach ($request->file('product_images') as $image) {
                $path = $image->store('product_images', 'public');
                ProductImage::create([
                    'product_id' => $product->id,
                    'image_path' => $path,
                ]);
            }
        }

        return redirect()->route('product.index')->with('status', 'profile-updated');
    }

    public function edit($id)
    {
        $product = Product::with('images')->findOrFail($id);
        return view('product.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'stock' => 'required|integer|min:0',
            'price' => 'required|integer|min:0',
            'description' => 'required|string|max:1500',
            'is_active' => 'required|boolean',
            'category_id' => 'required|exists:categories,id',
            'product_image' => 'nullable|image|max:2096',
            'new_product_images' => 'nullable|array',
            'new_product_images.*' => 'nullable|image|max:4096',
            'old_images' => 'nullable|array',
            'old_images.*' => 'integer|exists:product_images,id',
        ]);

        // آپلود تصویر پروفایل محصول
        if ($request->hasFile('product_image')) {
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $product->image = $request->file('product_image')->store('products', 'public');
        }

        // آپدیت اطلاعات اصلی محصول
        $product->update([
            'name' => $request->name,
            'stock' => $request->stock,
            'price' => $request->price,
            'description' => $request->description,
            'is_active' => $request->is_active,
            'category_id' => $request->category_id,
        ]);

        // حذف تصاویر قبلی‌ای که تیک نخورده‌اند
        $oldImagesToKeep = $request->input('old_images', []);
        $imagesToDelete = $product->images()->whereNotIn('id', $oldImagesToKeep)->get();

        foreach ($imagesToDelete as $image) {
            Storage::disk('public')->delete($image->image_path);
            $image->delete();
        }

        // آپلود تصاویر جدید
        if ($request->hasFile('new_product_images')) {
            foreach ($request->file('new_product_images') as $image) {
                $path = $image->store('product_images', 'public');
                ProductImage::create([
                    'product_id' => $product->id,
                    'image_path' => $path,
                ]);
            }
        }

        return redirect()->route('product.show', $product->id)->with('status', 'product-updated');
    }


    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);

        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        $product_images = ProductImage::where('product_id', $product->id)->get();

        foreach ($product_images as $image) {
            Storage::disk('public')->delete($image->image_path);
            $image->delete();
        }

        $product->delete();

        return redirect()->route('product.index')->with('success', 'محصول : ' . $product->name . ' با موفقیت حذف شد');
    }

}
