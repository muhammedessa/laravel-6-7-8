<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'user_id', 'post_id', 'parent_id', 'description'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User' );
    }

    public function replies()
    {
        return $this->hasMany('App\Models\Comment' , 'parent_id');
    }
}
