<?php

namespace App\Http\Controllers;

use App\Ourwork;
use App\OurworkFile;
use Illuminate\Http\Request;

class OurworkController extends Controller
{
    public function index()
    {
        $ourworks =   Ourwork::where('status', 1)->paginate(9);
        return view('ourwork.index', compact('ourworks'));
    }

    public function show(Ourwork $ourwork)
    {
      
        $ourworke =   Ourwork::where('status', 1)->get();
        $ourworks = [];
        //ถ้าไม่มี contoller นี้จะไม่สามารถลิงค์ได้ เเต่ไม่เกี่ยวกับหน้าที่เอาขึ้นไป show
        foreach ($ourworke as $i => $our_) {
            $ourworks[$i]['id'] = $our_->id;
            $ourworks[$i]['note'] = $our_->note;
            $ourworks[$i]['detail'] = $our_->detail;
            $ourworks[$i]['date'] = $our_->date;
            $ourworks[$i]['file'] =  $our_->files->where('type', 1)->first() ? $our_->files->where('type', 1)->first()->file : $our_->files->first()->file;
        }
      
        return view('ourwork.show', compact('ourwork', 'ourworks'));
    }

}
