<?php

namespace App\Http\Controllers;

use App\Housestyle;
use App\JoinUs;
use App\Ourwork;
use App\PlanToTag;
use App\Promotion;
use App\SlideShow;
use App\Tag;
use App\WebCounter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $slides = SlideShow::all();
        $plan_tos = PlanToTag::with('tag')->groupBy('tag_id')->select('tag_id')->get();
        $plans = Housestyle::inRandomOrder()->paginate(6);
        $ourworke =   Ourwork::where('status', 1)->orderby('created_at', 'desc')->paginate(3);

   
        $ourworks = [];
        foreach ($ourworke as $i => $our_) {
            $ourworks[$i]['id'] = $our_->id;
            $ourworks[$i]['cont'] = $our_-> cont;
            $ourworks[$i]['note'] = $our_-> note;
            $ourworks[$i]['date'] = $our_-> date;
            $ourworks[$i]['file'] =  $our_-> files->where('type', 1)->first() ? $our_->files->where('type', 1)->first()->file : $our_->files->first()->file;
        }

        $promotions = Promotion::where('status', 1)->orderBy('created_at', 'desc')->paginate(3);

        
        $promotion_tag = Tag::where('name', 'Promotion')->where('status', 1)->first();
        $plan_promotion_count=0;
        if ( $promotion_tag ){
            $plan_promotion_count  = PlanToTag::where('tag_id', $promotion_tag->id)->count();
        }
      

        $plan_count = Housestyle::where('status', 1)->count();
        $web_counter = WebCounter::count();

        return view('home', compact('slides', 'ourworks', 'promotions', 'plans','plan_tos', 'plan_count', 'plan_promotion_count', 'web_counter'));
    }

    public function construction()
    {
        return view('construction');
    }

    public function preparing()
    {
        return view('preparing');
    }

    public function contact()
    {
        return view('contact');
    }
    public function join_us()
    {
        return view('join_us');
    }
 
    public function store ()
    {
        // dd( request('status'));
    //   dd(request()->all())  ;
    $_file = Storage::disk('spaces')->putFile('tconBuild/portfolio', request('photo'), 'public');
        $check = JoinUs::where('tel',request('tel'))->first();   
         if($check){
            alert()->error('ผิดพลาด', 'เคยใช้เบอร์นี้สมัครเเล้ว');
             return back();
         }

    JoinUs::create([
            
            'position' => request('position'), 
            'salaryDesired' => request('salaryDesired'),
            'fritName' => request('fritName'),
            'lastName' => request('lastName'),
            'nickName' => request('nickName'),
            'idCard' => request('idCard'),
            'tel' => request('tel'),
            'email' => request('email'),
            'homeAddress' => request('homeAddress'),
            'mu' => request('mu'),
            'road' => request('road'),
            'tumbon' => request('tumbon'),
            'district' => request('district'),
            'provice' => request('provice'),
            'zipCode' => request('zipCode'),
            'birth' => request('birth'),
            'age' => request('age'),
            'race' => request('race'),
            'nationality' => request('nationality'),
            'religion' => request('religion'),
            'height' => request('height'),
            'weight' => request('weight'),
            'sex' => request('sex'),
            'status' => request('status'),
            'photo' => $_file,
            'accept_status' => 0 ,
            

        ]); 

        return back();
    }
}

