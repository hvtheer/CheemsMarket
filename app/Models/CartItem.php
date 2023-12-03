<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cart_items';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = ['product_id', 'user_id'];

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id',
        'user_id',
        'sku',
        'discount',
        'quantity',
    ];

    /**
     * Get the product associated with the cart item.
     */
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    /**
     * Get the user associated with the cart item.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

