<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'number' => 'required|integer',
            'address' => 'required',
            'thumbnail' => 'nullable',
            'password' => 'required|confirmed'
        ]);

        $data = $request->all();
        $data['thumbnail'] = User::uploadImage($request);
        $data['password'] = bcrypt($request->password);
        $user = User::create($data);
        $user->assignRole('user');


        Auth::login($user);
        return redirect()->route('index.page');
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'number' => 'required|integer',
        ]);

        $user = User::find($id);
        $user->update($request->all());
        return redirect()->back();
    }

    public function loginform()
    {
        return view('user.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ])) {

            return redirect()->route('index.page');
        }


    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('index.page');
    }

    public function profile()
    {

        $orders = Order::where('user_id', Auth::user()->id)->get();
        return view('profile', compact('orders'));
    }

}
