<?php

namespace App\Http\Controllers;

use App\JoinUs;
use Illuminate\Http\Request;

class joinusController extends Controller
{
 public function index()
 {
     $joinuses = JoinUs::get();
    //  dd($joinuses)
    return view('joinuscl',compact('joinuses'));
 }

 public function detail($joinus_id)
 {
  //  dd($joinus_id);
   $joinus = JoinUs::find($joinus_id);

   return view('show_user',compact('joinus'));

 }
 public function accept(JoinUs $joinus)
 {
  $joinus->accept_status = 1;
  $joinus->update();
  return back();

 }
}
