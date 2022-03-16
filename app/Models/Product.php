<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = [
        'title',
        'view_count',
        'description',
        'content',
        'price',
        'inventory',
        'category_id',
        'slug',
        'image'
    ];

    public function category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }

    public function comments(){
        return $this->hasMany(Comment::class,'product_id','id');
    }

    public function imageUrl(){
        return '/image/product/'.$this->image;
    }
}
