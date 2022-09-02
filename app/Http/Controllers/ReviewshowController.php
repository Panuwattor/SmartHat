<?php

namespace App\Http\Controllers;

use App\Review;
use Illuminate\Http\Request;

class ReviewshowController extends Controller
{
    public function index()
    {

    $reviews = Review::where('status', 1)->orderby('created_at', 'desc') ->paginate(9);
    
    return view('reviewfontend.index', compact('reviews'));
    
    }
    public function show(Review $review)
    {
        $reviews =  Review::where('status', 1)->orderby('created_at', 'desc')->paginate(6);
        
      
        return view('review.show', compact('review','reviews'));
    }
}
