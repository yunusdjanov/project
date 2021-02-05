<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\BannerCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = BannerCategory::all();
        $banners = Banner::all();
        return view('admin.banners.index', compact('banners', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = BannerCategory::all();
        return view('admin.banners.create', compact('categories'));
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
            'type' => 'required | integer',
            'thumbnail' => 'required | image'
        ];

        $messages = [
            'type.integer' => 'Заполните поле',
            'type.required' => 'Заполните поле категория',
            'thumbnail.required' => 'Заполните поле изображение',
            'thumbnail.image' => 'Загруженный файл должен быть изображением',
        ];

        $validator = Validator::make($request->all(), $rules, $messages)->validate();

        $data = $request->all();
        $data['thumbnail'] = Banner::uploadImage($request);
        $banner = Banner::create($data);
        $request->session()->flash('success', 'Баннер добавлен');
        return redirect()->route('banners.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $banner = Banner::find($id);

        Storage::delete($banner->thumbnail);
        $banner->delete();
        return redirect()->route('banners.index')->with('success', 'Баннер удален');
    }
}
