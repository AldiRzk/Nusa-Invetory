<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = [
        'user_id',
        'customer_name',
        'date',
        'total_amounts',
        'notes',
    ];
    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function items(){
        return $this->hasMany(Sale_item::class);
    }
}
