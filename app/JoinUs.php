<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JoinUs extends Model
{
    protected $fillable = [
        'id', 'position', 'salaryDesired', 'fritName', 'lastName', 'nickName', 'idCard', 'tel', 'email',
        'homeAddress', 'mu', 'road', 'tumbon', 'district', 'provice', 'zipCode', 'birth',
        'age', 'race', 'nationality', 'religion', 'height', 'weight', 'sex', 'status', 'photo', 'accept_status',


    ];
    function getStateAttribute()
    {
        
        if ($this->accept_status == 0) {
            return '<small class="badge badge-danger">ยังไม่รับทราบ</small>';
        } else if ($this->accept_status == 1) {
            return '<small class="badge badge-success">รับทราบแล้ว</small>';  
    }
}
}