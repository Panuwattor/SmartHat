<?php

namespace App\Http\Controllers;

use App\Housestyle;
use App\PlanToTag;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

use function PHPUnit\Framework\returnSelf;

class HousestyleController extends Controller
{

    public function admin_index()
    {
        $homestyles = Housestyle::where('status', 1)->get();
        return view('housestyle.admin.index', compact('homestyles'));
    }
    public function admin_create()
    {
        $tags = Tag::where('status', 1)->get();
        return view('housestyle.admin.create', compact('tags'));
    }
    public function admin_store()
    {
        if (Housestyle::where('codePlan', request('codePlan'))->exists()) {
            return back();
        }

        $input = request('price');
        $output = '';
        $tmp = explode(',', $input);

        foreach ($tmp as $t) {
            $output = $output . $t;
        }

        $_file = Storage::disk('spaces')->putFile('tconBuild/plan', request('img'), 'public');
        $_file_plan = Storage::disk('spaces')->putFile('tconBuild/plan', request('plan'), 'public');
       $home = Housestyle::create([
            'codePlan' => request('codePlan'),
            'img' => $_file,
            'plan' => $_file_plan,
            'space' => request('space'),
            'floor' => request('floor'),
            'bedroom' => request('bedroom'),
            'toilet' => request('toilet'),
            'car' => request('car'),
            'buildingWide' => request('buildingWide'),
            'buildingLong' => request('buildingLong'),
            'minimumWide' => request('minimumWide'),
            'minimumLong' => request('minimumLong'),
            'status' => 1,
            'price' => $output,
        ]);

        if (request('tags')) {
            foreach (request('tags') as $tag) {
                PlanToTag::create([
                    'plan_id' => $home->id,
                    'tag_id' => $tag
                ]);
            }
        }

        return  redirect('/admin/housestyles');
    }

    public function admin_update(Housestyle $housestyle)
    {
        if (request('img')) {
            $_file = Storage::disk('spaces')->putFile('tconBuild/plan', request('img'), 'public');
            Storage::disk('spaces')->delete($housestyle->img);
            $housestyle->img =  $_file;
            $housestyle->update();
        }
        if (request('plan')) {
            $_file_plan = Storage::disk('spaces')->putFile('tconBuild/plan', request('plan'), 'public');
            Storage::disk('spaces')->delete($housestyle->plan);
            $housestyle->plan =  $_file_plan;
            $housestyle->update();
        }

        DB::beginTransaction();
        $housestyle->codePlan = request('codePlan');
        $housestyle->space = request('space');
        $housestyle->floor = request('floor');
        $housestyle->bedroom = request('bedroom');
        $housestyle->toilet = request('toilet');
        $housestyle->car = request('car');
        $housestyle->buildingWide = request('buildingWide');
        $housestyle->buildingLong = request('buildingLong');
        $housestyle->minimumWide = request('minimumWide');
        $housestyle->minimumLong = request('minimumLong');
        $housestyle->status = request('status');
        $housestyle->price = request('price');
        $housestyle->update();
        DB::commit();
        return redirect('/admin/housestyle/' . $housestyle->id . '/detail');
    }

    public function index()
    {
        $floors  = request('floor') ?  explode(',', request('floor')) : [1, 2, 3];
        $toilet = request('bathroom') ?  explode(',', request('bathroom')) : [1, 2, 3, 4, 5, 6, 7];
        $bedrooms  = request('bedroom') ?  explode(',', request('bedroom')) : [1, 2, 3, 4, 5, 6, 7];
        $area =   request('area') ? explode(',', request('area'))  : [0, 1000];
        $price =  request('price') ? explode(',', request('price'))  : [0., 100000000];

        $floor = request('floor') ? request('floor') : '';
        $bathroom = request('bathroom') ? request('bathroom') : '';
        $bedroom = request('bedroom') ? request('bedroom') : '';
        $string_area = request('area') ? request('area') : '';
        $string_price = request('price') ? request('price') : '';

        if (request('floor') == '' && request('bathroom') == '' && request('bedroom') == '' && request('area') == '' && request('price') == ''  && request('planName') == '') {
            $homestyles = Housestyle::where('status', 1)->orderBy('created_at', 'desc')->paginate(9);
        } else {
            $homestyles = Housestyle::whereBetween('price', $price)->whereBetween('space', $area)->whereIn('floor', $floors)->whereIn('toilet', $toilet)->whereIn('bedroom', $bedrooms)->where('status', 1)->orderBy('created_at', 'desc')->paginate(9);
        }

        if (sizeof($homestyles)  == 0) {
            Alert()->warning('', 'ไม่พบแบบบ้านที่ค้นหา');
        }



        if (request('tag')) {
            $plan_ids = PlanToTag::where('tag_id', request('tag'))->select('plan_id')->pluck('plan_id')->toArray();
            $homestyles = Housestyle::whereIn('id', $plan_ids)->where('status', 1)->orderBy('created_at', 'desc')->paginate(9);
        }
        $tages = Tag::get();

        return view('housestyle.index', compact('homestyles', 'floor', 'bathroom', 'bedroom', 'string_area', 'string_price', 'tages'));
    }

    public function admin_detail(Housestyle $housestyle)
    {
        $tags = Tag::where('status', 1)->get();
        return view('housestyle.admin.detail', compact('housestyle', 'tags'));
    }

    public function tag_index()
    {
        $tages = Tag::where('status', 1)->get();
        return view('backend.tag.index', compact('tages'));
    }

    public function tag_create()
    {
        return view('backend.tag.create');
    }
    public function tag_store()
    {
        foreach (request('name') as $name) {
            Tag::create([
                'name' => $name,
                'status' => 1,
            ]);
        }
        return redirect('/admin/tag/index');
    }

    public function tag_update(Tag $tag)
    {
        DB::beginTransaction();
        $tag->name = request('name');
        $tag->status = request('status');
        $tag->update();
        DB::commit();
        return redirect('/admin/tag/index');
    }

    public function update_tag(Housestyle $housestyle)
    {
        DB::beginTransaction();
        foreach (request('tag') as $tag) {
            if (PlanToTag::where('plan_id', $housestyle->id)->where('tag_id', $tag)->exists()) {
            } else {
                PlanToTag::create([
                    'plan_id' => $housestyle->id,
                    'tag_id' => $tag,
                ]);
            }
        }
        DB::commit();
        return redirect('/admin/housestyle/' . $housestyle->id . '/detail');
    }

    public function tage_delete(PlanToTag $plantotag)
    {
        $plantotag->delete();
        return back();
    }

    public function show(Housestyle $housestyle)
    {
        $tag_ids = $housestyle->totag->pluck('tag_id');
        $homenearbys = PlanToTag::where('plan_id', '!=', $housestyle->id)->inRandomOrder()->paginate(4);
        return view('housestyle.show', compact('housestyle', 'homenearbys'));
        
    }
}
