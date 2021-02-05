<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Rubric;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rubrics = Rubric::pluck('title', 'id')->all();
        return view('admin.posts.create', compact('rubrics'));
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
            'title' => 'required',
            'content' => 'required',
            'thumbnail' => 'required|image',
            'rubric_id' => 'integer',
        ];


        $messages = [
            'title.required' => 'Заполните поле названия',
            'content.required' => 'Заполните поле контент поста',
            'thumbnail.image' => 'Загруженный файл должен быть изображением',
            'thumbnail.required' => 'Заполните поле изображение',
            'rubric_id.integer' => 'Выберите рубрику из списка',
        ];

        $validator = Validator::make($request->all(), $rules, $messages)->validate();


        $data = $request->all();
        $data['thumbnail'] = Post::uploadImage($request);
        $post = Post::create($data);
        $request->session()->flash('success', 'Пост добавлен');
        return redirect()->route('posts.index');
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
        $rubrics = Rubric::pluck('title', 'id')->all();
        $post = Post::find($id);
        return view('admin.posts.edit', compact('post', 'rubrics'));
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
            'content' => 'required',
            'rubric_id' => 'integer',
            'thumbnail' => 'image',
        ];

        $messages = [
            'title.required' => 'Заполните поле названия',
            'content.required' => 'Заполните поле контент поста',
            'thumbnail.image' => 'Загруженный файл должен быть изображением',
            'rubric_id.integer' => 'Выберите рубрику из списка',
        ];

        $validator = Validator::make($request->all(), $rules, $messages)->validate();

        $post = Post::find($id);
        $data = $request->all();
        if ($file = Post::uploadImage($request, $post->thumbnail)) {
            Storage::delete($post->thumbnail);
            $data['thumbnail'] = $file;
        }
        $post->update($data);
        $request->session()->flash('success', 'Изменения сохранены');
        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        Storage::delete($post->thumbnail);
        Post::destroy($id);
        return redirect()->route('posts.index')->with('success', 'Пост удален');
    }
}
