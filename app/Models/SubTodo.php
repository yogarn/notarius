<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubTodo extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'todo_id', 'title', 'detail', 'priority', 'isCompleted'];

    public function todo() {
        return $this->hasOne('App/Models/Todo');
    }
}
