<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Main extends Model
{
    protected $table = 'main';
    protected $fillable = ['name', 'value', 'status'];
}
