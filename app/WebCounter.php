<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class WebCounter extends Model
{
    protected $fillable = ['ip', 'date', 'date_time'];

    public static function set_count()
    {
        $today_count = WebCounter::where('ip', $_SERVER['REMOTE_ADDR'])->where('date', Carbon::today()->format("Y-m-d"))->first();
        if(!$today_count){
            WebCounter::create([
                'ip' => $_SERVER['REMOTE_ADDR'],
                'date' => Carbon::today()->format("Y-m-d"), 
                'date_time' => Carbon::now()->format("Y-m-d H:i:s"),
            ]);
        }
    }
}
