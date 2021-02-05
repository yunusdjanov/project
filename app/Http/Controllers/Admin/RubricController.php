<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Rubric;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RubricController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rubrics = Rubric::paginate(10);
        return view('admin.rubrics.index', compact('rubrics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.rubrics.create');
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
            'title' => 'required|min:3|unique:rubrics'
        ];


        $messages = [
            'title.required' => 'Заполните поле названия',
            'title.min' => 'Минимум 3 символов в названии',
            'title.unique' => 'Название должно быть уникальным',
        ];

        $validator = Validator::make($request->all(), $rules, $messages)->validate();


        Rubric::create($request->all());
        $request->session()->flash('success', 'Рубрика добавлена');
        return redirect()->route('rubrics.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rubric = Rubric::find($id);
        return view('admin.rubrics.edit', compact('rubric'));
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
        $request->validate([
            'title' => 'required|min:3'
        ]);

        $messages = [
            'title.required' => 'Заполните поле названия',
            'title.min' => 'Минимум 3 символов в названии',
        ];

        $validator = Validator::make($request->all(), $rules, $messages)->validate();
        $rubric = Rubric::find($id);
        $rubric->update($request->all());
        $request->session()->flash('success', 'Изменения сохранены');
        return redirect()->route('rubrics.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rubric = Rubric::find($id);
        if ($rubric->posts->count()) {
            return redirect()->route('rubrics.index')->with('error', 'Error! This rubric has posts');
        }
        $rubric->delete();
        return redirect()->route('rubrics.index')->with('success', 'rubrics удалена');
    }
}
