<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BannerCategory extends Model
{
    protected $fillable = ['name'];

    public function banners(){
        return $this->hasMany(Banner::class);
    }
}
