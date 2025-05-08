<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['content','post_id','commentTable_type','commentTable_id'];
    function commentTable(){
        return $this->morphTo();
    }
    function user(){
        return $this->belongsTo(User::class);
    }
}
