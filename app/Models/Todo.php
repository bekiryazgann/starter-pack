<?php

namespace app\Models;

use src\Database\Model;

/**
 * @method static where(string $column, string $operator = null, string $value = null, string $boolean = 'and')
 */
class Todo extends Model
{
    protected $table = 'todo';
    public $timestamps = false;
}