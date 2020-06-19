<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;

use App\Country;

class UserProfile extends Model
{
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function country(){
        return $this->hasOne(Country::class,'country_id','id');
    }
}
