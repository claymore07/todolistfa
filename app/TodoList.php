<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\TodoList
 *
 * @property int $id
 * @property int $userId
 * @property string $title
 * @property string $description
 * @property \Carbon\Carbon|null $createdAt
 * @property \Carbon\Carbon|null $updatedAt
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Task[] $tasks
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TodoList whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TodoList whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TodoList whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TodoList whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TodoList whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TodoList whereUserId($value)
 * @mixin \Eloquent
 */
class TodoList extends Model
{
    //
    protected $fillable=[
        'title', 'description', 'user_id',
    ];

    public function tasks(){
        return $this->hasMany('App\Task', 'todolist_id');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }

}
