<?php

namespace App\Models;



use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    protected $fillable = ['title', 'about', 'brand', 'characteristic', 'price', 'discount', 'quantity', 'composition', 'thumbnail', 'subcategory_id'];


    public function branches(){
        return $this->belongsToMany(Branch::class);
    }

    public function subcategory(){
        return $this->belongsTo(SubCategory::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }




    public static function uploadImage(Request $request, $image = null){
        if ($request->hasFile('thumbnail')){
            if ($image){
                Storage::delete($image);
            }
            $folder = date('Y-m-d');
            return $request->file('thumbnail')->store("images/{$folder}");
        }
        return null;
    }

    public function getImage()
    {
        if (!$this->thumbnail) {
            return asset("no-image.png");
        }
        return asset("uploads/{$this->thumbnail}");
    }



}
