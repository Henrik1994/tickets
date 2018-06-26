<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table  = "profiles";
    protected $fillable = [
       'user_id','firstName', 'lastName', 'adress', 'city', 'country', 'postal', 'desc', 'image'
    ];

    public function user()
    {
        return $this->hasMany('App\User', 'user_id', 'id');
    }
}
