<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate(10);
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
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
            'title' => 'required|min:3|unique:categories',
            'thumbnail' => 'required|image'
        ];

        $messages = [
            'title.required' => 'Заполните поле названия',
            'title.min' => 'Минимум 3 символов в названии',
            'title.unique' => 'Название должно быть уникальным',
            'thumbnail.required' => 'Заполните поле изображение',
            'thumbnail.image' => 'Загруженный файл должен быть изображением',
        ];

        $validator = Validator::make($request->all(), $rules, $messages)->validate();

        $data = $request->all();
        $data['thumbnail'] = Category::uploadImage($request);
        $category = Category::create($data);
        $request->session()->flash('success', 'Категория добавлена');
        return redirect()->route('categories.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.categories.edit', compact('category'));
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
            'title' => 'required|min:3',
            'thumbnail' => 'image'
        ];

        $messages = [
            'title.required' => 'Заполните поле названия',
            'title.min' => 'Минимум 3 символов в названии',
            'thumbnail.image' => 'Загруженный файл должен быть изображением',
        ];

        $validator = Validator::make($request->all(), $rules, $messages)->validate();

        $category = Category::find($id);
        $data = $request->all();
        if ($file = Category::uploadImage($request, $category->thumbnail)) {
            Storage::delete($category->thumbnail);
            $data['thumbnail'] = $file;
        }
        $category->update($data);
        $request->session()->flash('success', 'Изменения сохранены');
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);

        if ($category->subcategories->count()) {
            return redirect()->route('categories.index')->with('error', 'Error! This categories has article');
        }
        Storage::delete($category->thumbnail);
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'category удалена');
    }
}
