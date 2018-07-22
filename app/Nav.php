<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nav extends Model
{
    protected $table = 'nav';
    protected $fillable = ['name', 'navbar_id', 'status'];

    public function navbar()
    {
        return $this->belongsTo('app\Navbar', 'navbar_id');
    }

    public function content()
    {
        return $this->hasMany('app\Content', 'nav_id');
    }
}
