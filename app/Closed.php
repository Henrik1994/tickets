<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Closed extends Model
{
    protected $table  = "closeds";
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
