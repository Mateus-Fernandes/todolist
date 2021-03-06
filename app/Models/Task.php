<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'todo_id',
        'name',
        'status',
        'parent'
    ];
}
