<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
    protected $table = 'block';
    protected $fillable = ['name', 'detail', 'quote', 'animation', 'content_id', 'status'];

    public function content()
    {
        return $this->belongsTo(Content::class, 'content_id');
    }

    public function ImageData()
    {
        return $this->hasOne(Image::class, 'block_id');
    }

    public function AudioData()
    {
        return $this->hasOne(Audio::class, 'block_id');
    }

    public function VideoData()
    {
        return $this->hasOne(Video::class, 'block_id');
    }

    public function GalleryData()
    {
        return $this->hasMany(Gallery::class, 'block_id');
    }
}
