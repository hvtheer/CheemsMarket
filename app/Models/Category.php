<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $table = 'category';

    protected $fillable = [
        'category_id',
        'parent_id',
        'name',
        'content',
    ];

    public static function getAllCategories(){
        return  Category::orderBy('category_id','DESC')->paginate();
    }

    public function getNameAttribute()
    {
        return $this->name;
    }

    // public function temporaries()
    // {
    //     return $this->hasMany(TemporaryResidenceAndAbsence::class, 'personId', 'id');
    // }

    // public function receipts()
    // {
    //     return $this->hasMany(Receipt::class, 'personId', 'id');
    // }
}
