<?php

namespace App\Http\Controllers;

use App\SlideShow;
use App\SlideShowfont;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BannershowController extends Controller
{
    public function index()
    {
        dd(request()->all());
        return view('backend.bannerfont.bannershow');
    }
    public function bannershow()
    {
        $slides = SlideShow::all();

        return view('backend.bannerfont.bannershow', compact('slides'));
    }
    public function fontshow()
    {
        return view('backend.bannerfont.fontshow');
    }

    public function create()
    {
        
        return view('backend.bannerfont.create');
    }

    public function edit(SlideShow $slide)
    {
        return view('backend.bannerfont.edit', compact('slide'));
    }

    public function edittest()
    {
        
        return view('backend.bannerfont.edittext');
    }

    public function edittext(SlideShowfont $slidefont)
    {
        return view('backend.bannerfont.edittext', compact('slidefont'));
    }

    public function edittextup(SlideShowfont $font)
    {
       
        $font->update([

            'type' => request('type'),
            'note' => request('note'),
            'link' => request('link')

        ]);
        return back();
    }

    public function update(SlideShow $slide)
    {
        if (!request('photo')) {
            alert()->warning('', 'โปรดเลือกรูปที่จะแสดง');
            return back();
        }
        $path = Storage::disk('spaces')->putFile('tconBuild/ourwork', request('photo'), 'public');

        $slide->update([

            'number' => request('number'),
            'photo' => $path,
            'font_style' => request('font_style'),
            'note' => request('note')

        ]);
        return redirect('admin/Bannerandfont/bannershow');
    }

    public function delete(SlideShow $slide)
    {

        $slidefonts = SlideShowfont::where('slide_show_id', $slide->id)->get();
        foreach ($slidefonts as $slidefont) {

            $slidefont->delete();
            
           
        }
        $slide->delete();
        
        return back();
    }

    public function store()
    {
        $slide = SlideShow::where('number', request('number'))->first();
        if ($slide) {
            alert()->warning('', 'มีลำดับนี้เเล้ว');
            return back();
        }

        if (!request('photo')) {
            alert()->warning('', 'โปรดเลือกรูปที่จะแสดง');
            return back();
        }

        DB::beginTransaction();


        $path = Storage::disk('spaces')->putFile('tconBuild/ourwork', request('photo'), 'public');
        $slide = SlideShow::create([
            'number' => request('number'),
            'photo' => $path,
            'font_style' => request('font_style'),
        ]);
        DB::commit();

        return redirect('/admin/Bannerandfont/bannershow');
    }

    public function addFont(SlideShow $slide)
    {
        return view('backend.bannerfont.add_font', compact('slide'));
    }

    public function storeFont(SlideShow $slide)
    {
        SlideShowfont::create([

            'slide_show_id' => $slide->id,
            'type' => request('type'),
            'link' => request('link'),
            'note' => request('note'),

        ]);

        return redirect('/admin/Bannerandfont/bannershow');
    }
}
