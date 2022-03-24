<?php

namespace App\Http\Controllers;

use App\Branch;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Carbon\Carbon;

class UserController extends Controller
{
    public function index()
    {
        return view('users.index');
    }

    public function name(User $user)
    {
        if (request('name')) {
            $user->name = request('name');
            $user->update();
        }

        return back();
    }

    public function photo(User $user)
    {
        if (request('photo')) {
            $file = Storage::disk('spaces')->putFile('uploads', request('photo'), 'public');
        } else {
            $file = $user->photo;
        }

        $user->photo = $file;
        $user->update();

        return back();
    }

    public function updatePassword(User $user)
    {
        if (Hash::check(request('old_password'), $user->password)) {
            if (request('new_password') == request('confirm_password')) {
                $user->password = Hash::make(request('new_password'));
                $user->update();

                alert()->success('แก้ไข', 'สำเร็จ');
            } else {
                alert()->error('รหัสผ่านไม่ตรงกัน', 'ไม่สำเร็จ');
            }
        } else {
            alert()->error('รหัสผ่านเดิมไม่ถูกต้อง', 'ไม่สำเร็จ');
        }

        return back();
    }

    public function lists()
    {
        $users = User::get();
        $permissions = Permission::orderBy('note')->get();
        $roles = Role::orderBy('note')->get();
        $branchs = Branch::all();

        return view('users.lists', compact('users', 'permissions', 'roles', 'branchs'));
    }

    public function update(User $user)
    {
        if (request('photo')) {
            $file = Storage::disk('spaces')->putFile('uploads', request('photo'), 'public');
        } else {
            $file = $user->photo;
        }

        if (request('signature')) {
            $signature = Storage::disk('spaces')->putFile('uploads', request('signature'), 'public');
        } else {
            $signature = $user->signature;
        }

        if (request('password')) {
            $password = Hash::make(request('password'));
        } else {
            $password = $user->password;
        }

        $user->update(array_merge(request()->all(), ['password' => $password, 'photo' => $file, 'signature' => $signature]));

        if ($user->roles) {
            foreach ($user->roles as $removerole) {
                $user->removeRole($removerole);
            }
        }
        if ($user->permissions) {
            foreach ($user->permissions as $removeperm) {
                $user->revokePermissionTo($removeperm);
            }
        }

        if (request('roles')) {
            foreach (request('roles') as $requestrole) {
                $role = Role::find($requestrole);
                $user->assignRole($role);
            }
        }

        if (request('permissions')) {
            foreach (request('permissions') as $id) {
                $permission = Permission::find($id);
                $user->givePermissionTo($permission);
            }
        }

        alert()->success('แก้ไข', 'สำเร็จ');

        return back();
    }

    public function store()
    {

        if (request('photo')) {
            $file = Storage::disk('spaces')->putFile('uploads', request('photo'), 'public');
        } else {
            $file = Null;
        }

        if (request('signature')) {
            $signature = Storage::disk('spaces')->putFile('uploads', request('signature'), 'public');
        } else {
            $signature = Null;
        }

        $password = Hash::make(request('password'));

        $user = User::create(array_merge(request()->all(), ['password' => $password, 'photo' => $file, 'signature' => $signature]));

        if (request('roles')) {
            foreach (request('roles') as $requestrole) {
                $role = Role::find($requestrole);
                $user->assignRole($role);
            }
        }

        if (request('permissions')) {
            foreach (request('permissions') as $id) {
                $permission = Permission::find($id);
                $user->givePermissionTo($permission);
            }
        }
        return back();
    }

    public function show()
    {
      $today = Carbon::today();
      $from = request('from') ?: $today->format('Y-m-d');
      $to = request('to') ?: $today->format('Y-m-d');
  
        $gets = file_get_contents('https://mytcg.net/get/users');
        $objs = json_decode($gets);
        $user = auth()->user();
         if($user->match){
          $match_get = file_get_contents('https://mytcg.net/get/user/find/' . $user->match->match_id);
          $matchget = json_decode($match_get);
         }else{
          $matchget = Null;
         }
        $points = $user->points()->orderBy('id','desc')->whereBetween('created_at', [Carbon::createFromFormat('Y-m-d H:i:s', $from . ' 00:00:00'), Carbon::createFromFormat('Y-m-d H:i:s', $to . ' 23:59:59')])->get();

        return view('users.show', compact('user','objs','matchget','from','to','points'));
    }

    public function auth_update(User $user)
    {
        if(request('password')){
          $password = Hash::make(request('password'));
        }else{
          $password = $user->password;
        }
  
        if (request('photo')) {
            $photo = Storage::disk('spaces')->putFile('uploads', request('photo'), 'public');
        } else {
            $photo = $user->photo;
        }
  
        $user->update(array_merge(request()->all(),['password'=>$password,'photo'=>$photo]));
  
        alert()->success('แก้ไข', 'สำเร็จ')->persistent('ตกลง');
        return back();
    }

    public function manage_user()
    {
        $user = User::find(request('user_id'));
        $user->update([
            'concretePoint'=>request('status')
        ]);
        alert()->success('ทำรายการ', 'สำเร็จ')->persistent('ตกลง');
        return back();
    }
    
    public function point()
    {
      $users = User::with('branch')->where('status',1)->get();
      return view('users.point', compact('users'));
    }
    
}
