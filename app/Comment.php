<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Ticket;


class Comment extends Model
{
    protected $table  = "comments";
    protected $fillable = [
       'user_id','ticket_id', 'comment',
    ];



}
