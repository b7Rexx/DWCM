<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Navbar extends Model
{
    protected $table = 'navbar';
    protected $fillable = ['name', 'dropdown','placement','status'];

    function nav()
    {
        return $this->hasMany(Nav::class, 'navbar_id');
    }
}
