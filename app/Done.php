<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Done extends Model
{
    protected $table  = "dones";
    protected $fillable = [
       'ticket_id', 'user_id', 'creator_id',
        'creator_name', 'name', 'title', 'date', 
        'priority', 'desc1', 'desc2', 'file'
    ];


    public function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }
}
