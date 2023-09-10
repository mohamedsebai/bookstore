<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;


    protected $fillable =  ['title','descreption','img','auther','price','discount','quantity','product_code','pages_num'];
    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

    public function categories(){
        return $this->belongsToMany(Category::class);
    }

    public function favourites(){
        return $this->hasMany(Favourite::class);
    }
}
