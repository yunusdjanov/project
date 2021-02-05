<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            's' => 'required',
        ]);

        $s = $request->s;

        $products = Product::where("title", "LIKE", "%{$s}%")->paginate(5);
        return view('search', compact('products', 's'));
    }
}
