<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Option;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OptionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $options = Option::paginate(10);
        return view('admin.options.index', compact('options'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.options.create');
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
            'name' => 'required|min:3|unique:options',
        ];

        $messages = [
            'title.required' => 'Заполните поле опции',
            'title.min' => 'Минимум 3 символов в опции',
            'title.unique' => 'Название должно быть уникальным',
        ];

        $validator = Validator::make($request->all(), $rules, $messages)->validate();

        $data = $request->all();
        $category = Option::create($data);
        $request->session()->flash('success', 'Опция добавлена');
        return redirect()->route('options.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $option = Option::find($id);
        return view('admin.options.edit', compact('option'));
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
            'name' => 'required|min:3',
        ];

        $messages = [
            'title.required' => 'Заполните поле опции',
            'title.min' => 'Минимум 3 символов в опции',
        ];

        $validator = Validator::make($request->all(), $rules, $messages)->validate();

        $option = Option::find($id);
        $data = $request->all();
        $option->update($data);
        $request->session()->flash('success', 'Изменения сохранены');
        return redirect()->route('options.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $option = Option::find($id);
        if ($option->branches->count()) {
            return redirect()->route('options.index')->with('error', 'Опция не удалена');
        } else {
            $option->delete();
        }
        return redirect()->route('options.index')->with('success', 'Опция удалена');
    }
}
