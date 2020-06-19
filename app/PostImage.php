<?php

namespace App;

use App\Post;
use App\TempPost;

use Illuminate\Database\Eloquent\Model;

class PostImage extends Model
{
    protected $guarded = [];

    public function postImage(){
        return $this->belongsTo(Post::class,'post_id','id');
    }

    public function postImag(){
        return $this->belongsTo(TempPost::class,'post_id','id');
    }



}
