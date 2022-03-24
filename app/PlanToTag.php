<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlanToTag extends Model
{
    protected $fillable=['plan_id','tag_id'];
    
    public function tag()
    {
        return $this->belongsTo(\App\Tag::class, 'tag_id');
    }
    public function toplan()
    {
        return $this->belongsTo(\App\Housestyle::class, 'plan_id');
    }
}
