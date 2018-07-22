<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $table = 'content';
    protected $fillable = ['name', 'type', 'nav_id', 'status'];

    public function nav()
    {
        return $this->belongsTo('app\Nav', 'nav_id');
    }

    public function block()
    {
        return $this->hasMany('app\Block', 'content_id');
    }
}