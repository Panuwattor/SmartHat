<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BannerFontFile extends Model
{
    protected $fillable=['id','banner_font_id','type','link','note'];
    public function ourwork()
    {
        return $this->belongsTo(\App\Barnnerfont::class, 'bannerfont_id');
    }
}
