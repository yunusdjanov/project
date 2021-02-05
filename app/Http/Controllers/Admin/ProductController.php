<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Comment;
use App\Models\Option;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('subcategory')->paginate(10);
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subcategories = SubCategory::pluck('title', 'id')->all();
        $options = Option::all();
        return view('admin.products.create', compact('subcategories', 'options'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'title' => 'required|unique:products',
            'about' => 'required',
            'brand' => 'required ',
            'characteristic' => 'required',
            'composition' => 'required',
            'price' => 'required | integer',
            'discount' => 'required | integer',
            'quantity' => 'required | integer',
            'thumbnail' => 'required | image | nullable',
            'subcategory_id' => 'integer',
        ];

        $messages = [
            'title.required' => 'Заполните поле названия',
            'title.unique' => 'Название должно быть уникальным',
            'about.required' => 'Заполните поле описание',
            'brand.required' => 'Заполните поле бренд',
            'characteristic.required' => 'Заполните поле характеристика',
            'composition.required' => 'Заполните поле состав',
            'price.required' => 'Заполните поле цена',
            'price.integer' => 'Поле цена должен быть цифрой',
            'discount.integer' => 'Поле скидка должен быть цифрой',
            'discount.required' => 'Заполните поле скидка',
            'quantity.required' => 'Заполните поле количество',
            'quantity.integer' => 'Поле количество должен быть цифрой',
            'thumbnail.image' => 'Загруженный файл должен быть изображением',
            'thumbnail.required' => 'Загрузите изображение',
            'subcategory_id.integer' => 'Выберите субкатегорию из списка',
        ];

        $validator = Validator::make($request->all(), $rules, $messages)->validate();

        $data = $request->all();
        $data['thumbnail'] = Product::uploadImage($request);
        $product = Product::create($data);

        $product->branches()->sync($request->option_branch);

        $request->session()->flash('success', 'Товар добавлен');
        return redirect()->route('products.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $options = Option::all();
        $subcategories = SubCategory::pluck('title', 'id')->all();
        $products = Product::find($id);
        return view('admin.products.edit', compact('subcategories', 'products', 'options'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'title' => 'required',
            'about' => 'required',
            'brand' => 'required',
            'characteristic' => 'required',
            'composition' => 'required',
            'price' => 'required | integer',
            'discount' => 'required | integer',
            'quantity' => 'required | integer',
            'thumbnail' => 'image',
            'subcategory_id' => 'integer',
        ];


        $messages = [
            'title.required' => 'Заполните поле названия',
            'about.required' => 'Заполните поле описание',
            'brand.required' => 'Заполните поле бренд',
            'characteristic.required' => 'Заполните поле характеристика',
            'composition.required' => 'Заполните поле состав',
            'price.required' => 'Заполните поле цена',
            'price.integer' => 'Поле цена должен быть цифрой',
            'discount.integer' => 'Поле скидка должен быть цифрой',
            'discount.required' => 'Заполните поле скидка',
            'quantity.required' => 'Заполните поле количество',
            'quantity.integer' => 'Поле количество должен быть цифрой',
            'thumbnail.image' => 'Загруженный файл должен быть изображением',
            'subcategory_id.integer' => 'Выберите субкатегорию из списка',
        ];

        $validator = Validator::make($request->all(), $rules, $messages)->validate();

        $product = Product::find($id);
        $data = $request->all();
        if ($file = Product::uploadImage($request, $product->thumbnail)) {
            Storage::delete($product->thumbnail);
            $data['thumbnail'] = $file;
        }
        $product->branches()->sync($request->option_branch);
        $product->update($data);
        $request->session()->flash('success', 'Изменения сохранены');
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);

        $product->branches()->sync([]);
        $comment = Comment::where('product_id', $product->id);
        $comment->delete();
        Storage::delete($product->thumbnail);
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Товар удален');
    }
}
