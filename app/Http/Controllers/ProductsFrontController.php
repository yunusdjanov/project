<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Branch;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Option;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class ProductsFrontController extends Controller
{
    public function index()
    {

        $categories = Category::all();
        $products = Product::all();
        $banners = Banner::where('type', 1)->get();
        return view('index', compact('products', 'categories', 'banners'));

    }

    public function show(Request $request, $id)
    {
        $comments = Comment::where('product_id', $id)->select('id', 'comment', 'name', 'star')->get();
        $product = Product::find($id);
        $option = Option::where('id', $product->branches->pluck('option_id')->first())->get();
        return view('singleproduct', compact('product', 'comments', 'option'));
    }

    public function list(Request $request, $id)
    {
        $productsQuery = Product::query();
        if ($request->filled('price_from')) {
            $productsQuery->where('price', '>=', $request->price_from);
        }
        if ($request->filled('price_to')) {
            $productsQuery->where('price', '<=', $request->price_to);
        }
        if ($request->has('brand')) {
            $productsQuery->where('brand', $request->brand);
        }
        $category = Category::where('id', $id)->get();
        $subcategories = SubCategory::where('category_id', $id)->get();
        $sub_id = $subcategories->pluck('id');
        $products = $productsQuery->whereIn('subcategory_id', $sub_id)->get();
        $brands = Product::whereIn('subcategory_id', $sub_id)->pluck('brand');
        return view('productslist', compact('products', 'subcategories', 'category', 'brands'));
    }

    public function filter(Request $request, $id)
    {
        $subcategories = SubCategory::where('category_id', $id)->get();
        $sub_id = $subcategories->pluck('id')->all();
        $category = Category::where('id', $subcategories[0]['category_id'])->get();
        $products = Product::where('subcategory_id', $request->sub_ids)->paginate(5);
        return view('productslist', compact('products', 'subcategories', 'category'));
    }


}
