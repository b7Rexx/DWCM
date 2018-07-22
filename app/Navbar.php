<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Navbar extends Model
{
    protected $table = 'navbar';
    protected $fillable = ['name', 'dropdown', 'status'];

    function nav()
    {
        return $this->hasMany('app\Nav', 'navbar_id');
    }
}
