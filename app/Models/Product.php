<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'store_id',
        'base_price',
        'discount_price',
        'image',
        'is_discount',
    ];


    public function store(){
        return $this->belongsTo(Store::class);
    }

    public function transactions(){
        return $this->hasMany(PurchaseTransaction::class, 'product_id', 'id');
    }

}
