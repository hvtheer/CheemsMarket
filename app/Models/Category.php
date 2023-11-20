<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    
    protected $fillable = [
        'name',
        'content',
        'parent_id',
    ];

    public function parent()
    {
        return $this->belongsTo(Category::class); 
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    // Setter 
    public function setNameAttribute($value)
    {
     $this->attributes['name'] = strtolower($value);
    }

    // Getter
    public function getNameAttribute($value)
    {
        return ucwords($value);
    }
}