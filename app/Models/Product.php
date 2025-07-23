<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'category_id',
        'code',
        'description',
        'unit',
        'stock',
        'price',
    ];
    public function category(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
