<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Post;
use App\Models\Product;
use App\Models\User;

class MainController extends Controller
{
    public function index()
    {
        $posts = Post::all()->count();
        $users = User::all()->count();
        $products = Product::all()->count();
        $orders = Order::all()->count();
        return view('admin.index', compact('posts', 'users', 'products', 'orders'));
    }
}
