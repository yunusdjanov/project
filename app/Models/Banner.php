<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Banner extends Model
{
    protected $fillable = ['type', 'thumbnail'];

    public function categories(){
        return $this->belongsTo(BannerCategory::class);
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
