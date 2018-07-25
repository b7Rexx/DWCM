<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $table = 'content';
    protected $fillable = ['name', 'type', 'nav_id', 'placement','status'];

    public function nav()
    {
        return $this->belongsTo(Nav::class, 'nav_id');
    }

    public function block()
    {
        return $this->hasMany(Block::class, 'content_id');
    }

    public function activeBlock(){
        return $this->hasMany(Block::class, 'content_id')->where('status','=','1');
    }
}