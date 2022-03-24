<?php

namespace App\Http\Controllers;

use App\Ourwork;
use App\OurworkFile;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class OutworkController extends Controller
{
    public function index()
    {
        $ourworks = Ourwork::where('status', 1)->get();
        return view('backend.ourwork.index', compact('ourworks'));
    }

    public function create()
    {
        return view('backend.ourwork.create');
    }

    public function store()
    {
        $our = Ourwork::where('note', request('note'))->first();

        if ($our) {
            alert()->error('ผิดพลาด', 'มีชื่อนี้อยู่แล้ว');
            return back();
        }

        DB::beginTransaction();
        $ourwork = Ourwork::create([
            'status' => 1,
            'date' => Carbon::today(),
            'note' => request('note'),
            'user_id' => auth()->user()->id,
        ]);

        foreach (request('files') as $file) {
            $_file = Storage::disk('spaces')->putFile('tconBuild/ourwork', $file, 'public');
            OurworkFile::create([
                'ourwork_id' => $ourwork->id,
                'file' => $_file,
                'type' => 0,
            ]);
        }
        DB::commit();
        return redirect('/admin/ourwork/index');
    }

    public function detail(Ourwork $ourwork)
    {
        return view('backend.ourwork.detail', compact('ourwork'));
    }

    public function update(Ourwork $ourwork)
    {
        $ourwork->note = request('note');
        $ourwork->status = request('status');
        $ourwork->user_id = auth()->user()->id;
        $ourwork->update();
        return  redirect('/admin/ourwork/' . $ourwork->id . '/detail');
    }
    public function delete(Ourwork $ourwork)
    {
        $ourwork->note = request('note');
        $ourwork->status = request('status');
        $ourwork->user_id = auth()->user()->id;
        $ourwork->update();
        return  redirect('/admin/ourwork/' . $ourwork->id . '/detail');
    }
    public function set_coverpage(OurworkFile $ourworkfile)
    {
        $ourworkfile_ = OurworkFile::where('ourwork_id', $ourworkfile->ourwork_id)->where('type', 1)->get();
        DB::beginTransaction();
        if ($ourworkfile_) {
            foreach ($ourworkfile_ as $file) {
                $file->type = 0;
                $file->update();
            }
        }
        $ourworkfile->type = 1;
        $ourworkfile->update();

        DB::commit();
        return  redirect('/admin/ourwork/' . $ourworkfile->ourwork_id . '/detail');
    }

    public function file_delete(OurworkFile $ourworkfile)
    {
        DB::beginTransaction();
        Storage::disk('spaces')->delete($ourworkfile->file);
        $ourworkfile->delete();
        DB::commit();
        return  redirect('/admin/ourwork/' . $ourworkfile->ourwork_id . '/detail');
    }

    public function add_file(Ourwork $ourwork)
    {
        DB::beginTransaction();
        foreach (request('files') as $file) {
            $_file = Storage::disk('spaces')->putFile('tconBuild/ourwork', $file, 'public');
            OurworkFile::create([
                'ourwork_id' => $ourwork->id,
                'file' => $_file,
                'type' => 0,
            ]);
        }
        DB::commit();
        return redirect('/admin/ourwork/' . $ourwork->id . '/detail');
    }
}
