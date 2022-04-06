<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SlideShowfont extends Model
{
    protected $fillable = ['slide_show_id', 'type', 'link', 'note'];
}
