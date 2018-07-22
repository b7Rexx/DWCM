<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
    protected $table = 'block';
    protected $fillable = ['name', 'detail', 'quote', 'content_id', 'status'];

    public function content()
    {
        return $this->belongsTo('app\Content', 'content_id');
    }

    public function ImageData()
    {
        return $this->hasOne('app\Image', 'block_id');
    }

    public function AdsData()
    {
        return $this->hasOne('app\Ads', 'block_id');
    }

    public function AudioData()
    {
        return $this->hasOne('app\Audio', 'block_id');
    }

    public function CarouselData()
    {
        return $this->hasOne('app\Carousel', 'block_id');
    }

    public function VideoData()
    {
        return $this->hasOne('app\Video', 'block_id');
    }
}
