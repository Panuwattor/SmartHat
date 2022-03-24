<?php

namespace App\Http\Controllers;

use App\Ourwork;
use App\Promotion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class PromotionController extends Controller
{
    public function index()
    {
        $ourworke =   Ourwork::where('status', 1)->orderBy('created_at','desc')->paginate(6);
        $ourworks = [];
        foreach ($ourworke as $i => $our_) {
            $ourworks[$i]['id'] = $our_->id;
            $ourworks[$i]['note'] = $our_->note;
            $ourworks[$i]['date'] = $our_->date;
            $ourworks[$i]['file'] =  $our_->files->where('type', 1)->first() ? $our_->files->where('type', 1)->first()->file : $our_->files->first()->file;
        }
        $promotions = Promotion::where('status',1)->orderBy('created_at', 'desc')->paginate(3);
        $other_promotions = Promotion::where('status',1)->orderBy('created_at', 'desc')->paginate(6);
        return view('promotion.index', compact('promotions', 'ourworks','other_promotions'));
    }

    public function show(Promotion $promotion)
    {
        $ourworke =   Ourwork::where('status', 1)->get();
        $promotions =   Promotion::where('status',1)->get();
        $ourworks = [];
        foreach ($ourworke as $i => $our_) {
            $ourworks[$i]['id'] = $our_->id;
            $ourworks[$i]['note'] = $our_->note;
            $ourworks[$i]['date'] = $our_->date;
            $ourworks[$i]['file'] =  $our_->files->where('type', 1)->first() ? $our_->files->where('type', 1)->first()->file : $our_->files->first()->file;
        }
        return view('promotion.show', compact('promotion', 'ourworks', 'promotions'));
    }

    public function admin_index()
    {
        $promotions = Promotion::orderBy('created_at', 'desc')->get();
        return view('backend.promotion.index', compact('promotions'));
    }
    public function admin_create()
    {
        return view('backend.promotion.create');
    }

    public function admin_store()
    {
        DB::beginTransaction();
        $_file = Storage::disk('spaces')->putFile('tconBuild/ourwork/promotion', request('file'), 'public');
        $promotion =   Promotion::create([
            'name' => request('name'),
            'type' => request('type'),
            'photo' => $_file,
            'user_id' => auth()->user()->id,
            'detail' => request('detail')
        ]);

        DB::commit();
        return redirect('/admin/promotions');
    }

    public function detail(Promotion $promotion)
    {
        return view('backend.promotion.detail', compact('promotion'));
    }
    
    public function update(Promotion $promotion)
    {
        if(request('file')){
            Storage::disk('spaces')->delete($promotion->photo);
            $_file = Storage::disk('spaces')->putFile('tconBuild/ourwork/promotion', request('file'), 'public');
            $promotion->photo = $_file;
            $promotion->update();
        }
        DB::beginTransaction();
        $promotion->name = request('name');
        $promotion->detail = request('detail');
        $promotion->type = request('type');
        $promotion->status = request('status');
        $promotion->update();
        DB::commit();
        return redirect('/admin/promotion/'.$promotion->id.'/detail');
    }

    public function delete(Promotion $promotion)
    {
        DB::beginTransaction();
        Storage::disk('spaces')->delete($promotion->photo);
        $promotion->delete();
        DB::commit();
        return redirect('/admin/promotions');
    }

    public function user_receive()
    {
        $response = Http::get('https://script.googleusercontent.com/macros/echo?user_content_key=mZttEM86RjuOXybdCc4HXoIWb4MxAdpenyh6LICbJWQTb7dmIgP4tm6AW3qDdGRlksnoQZyOhHEcrFnOOg-8ISQ0bh6pjfYEm5_BxDlH2jW0nuo2oDemN9CCS2h10ox_1xSncGQajx_ryfhECjZEnERY0lkNTLASuVdX9AYWdFtGzbam6P9oobv07kzaYsiVTBePV65tNFQsOY5zPbke610S5brABrZ6hzu1YNowE3EVmy50_6Higg&lib=MdYPDIUWaWLmNSSdIR4pTeJJkq2sV7_hS');
        $responseJson = $response->json();

        $labels = [];
        $review_count = [];
        $review_labels = [];

        foreach ($responseJson as $res) {
            foreach (explode(',', $res[0]) as $lable) {
                if (trim($lable)) {
                    $labels[] = trim($lable);
                }
            }
        }

        $_labels = array_unique($labels);
        foreach($_labels as $b){
            $review_count[] = array_count_values($labels)[$b];
            $review_labels[] = $b;
        }

        $review_labels = json_encode($review_labels);
        $review_count = json_encode($review_count);

        return view('user_review', compact('review_count', 'review_labels'));
    }
}
