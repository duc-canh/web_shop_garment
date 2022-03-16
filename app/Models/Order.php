<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'roders';
    protected $fillable = [
        'title',
        'name',
        'phone',
        'email',
        'total_count',
        'price',
        'total_money',
        'user_id',
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
