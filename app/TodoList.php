<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TodoList extends Model
{
    //
    protected $fillable=[
        'title', 'description', 'user_id',
    ];

    public function tasks(){
        return $this->hasMany('App\Task');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }

}
