<?php

namespace App\Models;
use App\Models\Comment;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory , SoftDeletes ;
    protected $fillable = ['title' , 'content' , 'user_id', 'image'];
    function user(){
        return $this->belongsTo(User::class);
    }
    function comments(){
        return $this->morphMany(Comment::class,'commentTable');
    }
    protected static function booted() {
        static::deleting(function ($post){
            $post->comments()->delete();
        });
    }
}
