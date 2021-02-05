<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.profile.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
            'name' => 'required',
            'number' => 'required|integer',
            'address' => 'required',
            'thumbnail' => 'nullable',
        ];

        $messages = [
            'name.required' => 'Заполните поле Ф.И.О',
            'number.required' => 'Заполните поле телефон',
            'number.integer' => 'Заполните поле телефон',
            'address.required' => 'Заполните поле адрес',
        ];

        $validator = Validator::make($request->all(), $rules, $messages)->validate();

        $profile = User::find($id);
        $data = $request->all();
        if ($file = User::uploadImage($request, $profile->thumbnail)) {
            Storage::delete($profile->thumbnail);
            $data['thumbnail'] = $file;
        }
        $profile->update($data);
        $request->session()->flash('success', 'Изменения сохранены');
        return redirect()->route('profile.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
