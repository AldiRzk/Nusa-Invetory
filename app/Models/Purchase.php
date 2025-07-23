<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $fillable = [
        'user_id',
        'supplier_id',
        'date',
        'total_amounts',
        'notes',
    ];
    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function supplier(){
        return $this->belongsTo(Supplier::class, 'supplier_id', 'id');
    }
    public function items(){
        return $this->hasMany(Purchase_item::class);
    }

}
