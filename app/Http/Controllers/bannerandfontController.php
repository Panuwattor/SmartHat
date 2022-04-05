<?php

namespace App\Http\Controllers;

use App\Bannerfont;
use App\BannerFontFile;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class bannerandfontController extends Controller
{
    public function index()
    {
        $banfont = Bannerfont::where('status', 1)->get();
        return view('backend.bannerfont.bannershow', compact('Bannerfont'));
    }
    public function bannershow()
    {
        $banner=Bannerfont::all();
        return view('backend.bannerfont.bannershow',compact('banner'));
    }
    public function fontshow()
    {
        return view('backend.bannerfont.fontshow');
    }

    public function create()
    {
        return view('backend.bannerfont.create');
    }


    public function store()
    {
        dd(request()->all());
        $ban = BannerFont::where('number', request('number'))->first();


        DB::beginTransaction();
        $ban = BannerFont::create([
            'number' => 1,
            'fontstyle' => request('note'),
            'status' => auth()->user()->id,
        ]);

        foreach (request('files') as $file) {
            $_file = Storage::disk('spaces')->putFile('tconBuild/ourwork', $file, 'public');
            BannerFontFile::create([
                'banner_font_id' =>  $ban->id,
                'file' => $_file,
                'type' => 0,
            ]);
        }
        DB::commit();
        return redirect('/admin/Bannerandfont/bannershow');
    }

    
}
