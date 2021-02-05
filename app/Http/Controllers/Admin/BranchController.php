<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Option;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $branches = Branch::paginate(10);
        return view('admin.branch.index', compact('branches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $options = Option::pluck('name', 'id')->all();
        return view('admin.branch.create', compact('options'));
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
            'branch' => 'required',
            'thumbnail' => 'required | image',
            'option_id' => 'required|integer',
        ];

        $messages = [
            'branch.required' => 'Заполните поле свойства',
            'thumbnail.image' => 'Загруженный файл должен быть изображением',
            'thumbnail.required' => 'Заполните поле изображения',
            'option_id.integer' => 'Выберите Опцию из списка',
            'option_id.required' => 'Выберите Опцию из списка',
        ];

        $validator = Validator::make($request->all(), $rules, $messages)->validate();


        $data = $request->all();
        $data['thumbnail'] = Branch::uploadImage($request);
        $banner = Branch::create($data);
        $request->session()->flash('success', 'branch добавлена');
        return redirect()->route('branch.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $branch = Branch::find($id);
        $options = Option::pluck('name', 'id')->all();
        return view('admin.branch.edit', compact('branch', 'options'));
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
            'branch' => 'required',
            'option_id' => 'required|integer',
        ];

        $messages = [
            'title.required' => 'Заполните поле',
            'option_id.integer' => 'Выберите опцию из списка',
            'option_id.required' => 'Выберите опцию из списка',

        ];

        $validator = Validator::make($request->all(), $rules, $messages)->validate();

        $branch = Branch::find($id);
        $data = $request->all();
        if ($file = Branch::uploadImage($request, $branch->thumbnail)) {
            Storage::delete($branch->thumbnail);
            $data['thumbnail'] = $file;
        }
        $branch->update($data);
        $request->session()->flash('success', 'Изменения сохранены');
        return redirect()->route('branch.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $branch = Branch::find($id);
        if ($branch->products->count()) {
            return redirect()->route('branch.index')->with('success', 'свойства не удалена');
        } else {
            $branch->delete();
            return redirect()->route('branch.index')->with('success', 'свойства удалена');
        }

    }
}
