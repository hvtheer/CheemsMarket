<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model {
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',
        'title',
        'rating',
        'description',
        'parent',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function parentComment()
    {
        return $this->belongsTo(Comment::class, 'parent');
    }

    public function childComments()
    {
        return $this->hasMany(Comment::class, 'parent');
    }
}