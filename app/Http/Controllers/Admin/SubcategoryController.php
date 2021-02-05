<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcategories = SubCategory::with('category')->paginate(10);
        return view('admin.subcategories.index', compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('title', 'id')->all();
        return view('admin.subcategories.create', compact('categories'));
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
            'title' => 'required|min:3',
            'category_id' => 'integer',
        ];

        $messages = [
            'title.required' => 'Заполните поле названия',
            'title.min' => 'Минимум 3 символов в названии',
            'category_id.integer' => 'Выберите категорию из списка',

        ];

        $validator = Validator::make($request->all(), $rules, $messages)->validate();

        SubCategory::create($request->all());
        $request->session()->flash('success', 'Субкатегория добавлена');
        return redirect()->route('subcategories.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::pluck('title', 'id')->all();
        $subcategories = SubCategory::find($id);
        return view('admin.subcategories.edit', compact('subcategories', 'categories'));
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
            'category_id' => 'integer',
        ];

        $messages = [
            'title.required' => 'Заполните поле названия',
            'title.min' => 'Минимум 3 символов в названии',
            'category_id.integer' => 'Выберите категорию из списка',

        ];

        $validator = Validator::make($request->all(), $rules, $messages)->validate();

        $subcategories = SubCategory::find($id);
        $subcategories->update($request->all());
        $request->session()->flash('success', 'Изменения сохранены');
        return redirect()->route('subcategories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $subcategory = SubCategory::find($id);
        if ($subcategory->products->count()) {
            return redirect()->route('subcategories.index')->with('error', 'Error! This subcategory has article');
        }
        $subcategory->delete();
        return redirect()->route('subcategories.index')->with('success', 'Субкатегория удалена');

    }
}
