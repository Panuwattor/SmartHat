<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Housestyle extends Model
{
    protected $fillable = ['codePlan', 'img', 'plan', 'space', 'floor', 'bedroom', 'toilet', 'car', 'buildingWide', 'buildingLong', 'minimumWide', 'minimumLong', 'status', 'price'];

    public function totag()
    {
        return $this->hasMany(\App\PlanToTag::class, 'plan_id');
    }

    public function getTextStatusAttribute()
    {
        if ($this->status == 1) {
            return '<span class="right badge badge-success">ใช้งาน</span>';
        } else {
            return '<span class="right badge badge-danger">ยกเลิก</span>';
        }
    }
}
