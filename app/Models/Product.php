<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    
    protected $fillable = [
        'productName',
        'description',
        'price',
        'category_id',
        'seller_id',
        'image',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function seller() 
    {
        return $this->belongsTo(User::class, 'seller_id');
    }

    // Format price
    public function getPriceAttribute($value) 
    {
        return number_format($value, 2);
    }   
}