<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;





class Follow extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'follows';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'follower_id',
    ];

    /**
     * Get the user who is being followed.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get the user who is the follower.
     */
    public function follower()
    {
        return $this->belongsTo(User::class, 'follower_id');
    }
}
