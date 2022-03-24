<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OurworkFile extends Model
{
    protected $fillable=['ourwork_id','file','type'];
    public function ourwork()
    {
        return $this->belongsTo(\App\Ourwork::class, 'ourwork_id');
    }
    //type 1 = หน้าปก
}
