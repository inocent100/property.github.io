<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

use App\User;
use App\UserProfile;
use App\PostImage;
use App\Catagory;
use App\PropType;

class TempPost extends Model
{
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }



    //is mein first id represent kar raha hei user ka table ko
    //second user_id belongs to userprofile
    //third argument user_id belong to like where class 
    //and fourth na be dain tu chalay ga normally treat as a local key
    public function profile(){
        return $this->hasOneThrough(UserProfile::class,User::class,'id','user_id','user_id','id');
    }

    public function postImages(){
        return $this->hasMany(PostImage::class,'post_id','id');
    }

    public function postVideos(){
        return $this->hasMany(PostImage::class,'post_id','id');
    }

    public function propType(){
        return $this->hasOne(PropType::class,'id','prop_types_id');
    }

         //Relationship many to many
    public function catagories(){
    return $this->belongsToMany(Catagory::class,'catagories_posts','post_id','catagory_id','id','id');
}

public function getFacingsAttribute()
  {
    return explode('/', $this->facings);
  }
}
