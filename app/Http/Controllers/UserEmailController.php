<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserEmail;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class UserEmailController extends Controller
{
    public function store()
    {
        DB::beginTransaction();
        $count = UserEmail::whereBetween('created_at', [Carbon::today()->format('Y-m-d' . ' 00:00:00'), Carbon::today()->format('Y-m-d' . ' 23:23:59')])->count();
        if($count >= 10){
            alert()->warning('Bad Request', 'โควต้ารับข่าวสารสำหรับวันนี้เต็มแล้ว');
            return back();
        }

        if(UserEmail::where('email', request('email'))->first()){
            alert()->warning('Bad Request', 'มี Email นี้แล้ว');
            return back();
        }

        UserEmail::create([
            'email' => request('email')
        ]);
        DB::commit();

        alert()->success('Bad Request', 'เรียบร้อย');
        return back();
    }
}
