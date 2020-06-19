<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Post;
use App\TempPost;

class PropType extends Model
{
    protected $guarded = [];

    public function post(){
        return $this->belongsTo(Post::class,'prop_types_id','id'); 
    }
    public function tempPost(){
        return $this->belongsTo(Post::class,'prop_types_id','id'); 
    }
}
