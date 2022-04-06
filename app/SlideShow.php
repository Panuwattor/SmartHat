<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SlideShow extends Model
{
    protected $fillable = ['number', 'photo', 'font_style', 'status'];

    public function fonts()
    {
        return $this->hasMany(\App\SlideShowFont::class, 'slide_show_id');
    }
}
