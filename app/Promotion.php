<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    protected $fillable=['name','type','photo','user_id','detail','status'];
    public function user()
    {
        return $this->belongsTo(\App\User::class, 'user_id');
    }

    function getStateAttribute()
    {
        if ($this->status == 0) {
            return '<small class="badge badge-danger">ยกเลิก</small>';
        } else if ($this->status == 1) {
            return '<small class="badge badge-success">ใช้งาน</small>';
        } 
    }
}
