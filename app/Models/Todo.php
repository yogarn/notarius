<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'title', 'detail', 'due', 'scheduled', 'priority', 'isCompleted'];

    public function subtodo() {
        return $this->hasMany('App\Models\SubTodo');
    }    
}
