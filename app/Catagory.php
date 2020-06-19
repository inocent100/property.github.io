<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Catagory extends Model
{
    protected $guarded = [];

    public function children(){
        return $this->hasMany(Catagory::class,'parent_id','id');
    }

    public function parent(){
        return $this->belongsTo(Catagory::class,'parent_id','id');
    }
}
