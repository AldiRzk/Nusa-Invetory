<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Purchase_item extends Model
{
    protected $fillable = [
        'purchase_id',
        'product_id',
        'quantity',
        'price',
        'total',
    ];
    public function product(){
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
    public function purchase(){
        return $this->belongsTo(Purchase::class, 'purchase_id', 'id');
    }
}
