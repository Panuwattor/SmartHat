<?php

namespace App\Http\Controllers;

use App\Review;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::where('status', 1)->get();
        return view('backend.review.index', compact('reviews'));
    }
    public function create()
    {
        return view('backend.review.create');
    }
    public function store()
    {  
        Review::create([
            'name' => request('name'),
            'note' => request('note'),
            'link' => request('link'),
            'status' => 1,
            'date' => Carbon::today(),
            'user_id' => auth()->user()->id,
        ]);
        return back();
    }
    public function detail(Review $review)
    {
       
        return view('backend.review.detail', compact('review'));
    }
    public function update(Review $review)
    {
        
        $review->update([
            'name' => request('name'),
            'note' => request('note'),
            'link' => request('link'),
            'status' => request('status'),
            'date' => Carbon::now()->format('Y-m-d'),
            'user_id' => auth()->user()->id,
           
        ]);
        
        return back();
    }
    public function delete(Review $review)
    {  
            $review->delete();
            alert()->success('สำเร็จ','ลบเรียบร้อยแล้ว');
            return redirect('/admin/review/index');
    }
}
