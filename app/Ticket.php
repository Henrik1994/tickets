<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
   protected $table = "tickets";
   protected $fillable = [
    'user_id','role', 'creator_id', 'creator_name', 'name', 'title', 'date', 'priority', 'desc1', 'desc2', 'file'
   ];


   public function user()
   {
       return $this->belongsTo('App\User','user_id','id');
   }

   public function creator()
   {
       return $this->belongsTo('App\User','creator_id','id');
   }

   public function comment()
   {
       return $this->hasMany('App\Comment','ticket_id','id');
   }
}
