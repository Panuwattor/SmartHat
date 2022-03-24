@extends('backend.master')

@section('content')
<div class="row justify-content-center" style="padding-right: 1rem; padding-top: 1rem;   padding-bottom: 1rem; padding-left: 1rem;">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title"> <i class="nav-icon fa fa-plus-square-o  mr-1"></i> แต้มพนักงาน </h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body table-responsive p-0">
        <table class="table table-hover">
          <thead>
            <tr class="text-center">
              <th>ลำดับ</th>
              <th>รูป</th>
              <th class="text-left">ชื่อ</th>
              <th>แต้ม</th>
              <th>แลกแต้ม</th>
              <th>เพิ่มแต้ม</th>
              <th>ตัดแต้ม</th>
            </tr>
          </thead>
          </tbody>
          @foreach ($users as $no=>$user)
          <tr class="text-center">
            <td>{{$no+1}}</td>
            <td>
              @if($user->photo)
              <img src="{{ Storage::disk('spaces')->url($user->photo) }}" alt="User profile picture" class="img-fluid img-circle img-size-32 mr-2">
              @else
              <img src="https://www.wisible.io/wp-content/uploads/2019/08/avatar-human-male-profile-user-icon-518358.png" alt="User Avatar" class="img-fluid img-circle img-size-32 mr-2">
              @endif
            </td>
            <td class="text-left">{{$user->name}}</td>
            <td> <a href="/admin/manage/user/point/{{$user->id}}/detals" target="back_"> {{$user->point}}</a></td>
            <td>
              @if($user->exchangePoint == 0) <font class="text-danger">ไม่มีสิทธิ</font> @else <font class="text-success">มีสิทธิ</font> @endif
              <button type="button" class="btn btn-default btn-sm ml-2" data-toggle="modal" data-target="#editUser{{$user->id}}">
                <i class="fa fa-edit"></i>
              </button>
            </td>
            <td><button type="submit" class="btn btn-sm btn-success" data-toggle="modal" data-target="#exampleModalAdd{{$user->id}}"><i class="fa fa-plus"></i></button></td>
            <td><button type="submit" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#exampleModalSub{{$user->id}}"><i class="fa fa-minus"></i></button></td>
          </tr>
          @endforeach
          </tbody>
        </table>
      </div>

      @foreach ($users as $no=>$user)
      <div class="modal fade" id="exampleModalSub{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title text-danger" id="exampleModalLabel"> <i class="fa fa-plus"></i> ตัดแต้มของ ({{$user->name}})</h5>
            </div>
            <form method="post" class="form-horizontal" action="/admin/cut/point/{{$user->id}}" enctype="multipart/form-data">
              {{ csrf_field() }}
              <div class="modal-body">
                <div class="form-group">
                  <div class="col-md-12 form-group"><input type="number" step="any" class="form-control" name="addpoint" id="addpoint" placeholder="ใส่จำนวนแต้ม"></div>
                </div>
                <div class="form-group">
                  <div class="col-md-12 form-group"><input type="text" class="form-control" name="note" id="note" placeholder="เหตุผล"></div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                <button type="submit" class="btn  btn-outline-danger btn-lg">ยืนยัน</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="modal fade" id="exampleModalAdd{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title text-success" id="exampleModalLabel"> <i class="fa fa-plus"></i> เพิ่มแต้มให้ ({{$user->name}})</h5>
            </div>
            <form method="post" class="form-horizontal" action="/admin/add/point/{{$user->id}}" enctype="multipart/form-data">
              {{ csrf_field() }}
              <div class="modal-body">
                <div class="form-group">
                  <div class="col-md-12 form-group"><input type="number" step="any" class="form-control" name="addpoint" id="addpoint" placeholder="ใส่จำนวนแต้ม"></div>
                </div>
                <div class="form-group">
                  <div class="col-md-12 form-group"><input type="text" class="form-control" name="note" id="note" placeholder="เหตุผล"></div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                <button type="submit" class="btn  btn-outline-success btn-lg">ยืนยัน</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="modal fade" id="editUser{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa-edit"></i> แก้ไข User</h5>
            </div>
            <form method="post" class="form-horizontal" action="/admin/auth/user/update/{{$user->id}}" enctype="multipart/form-data">
              {{ csrf_field() }}
              <div class="modal-body">
                <div class="form-group">
                  <label>สิทธิ์แลกแต้ม</label>
                  <select class="form-control" name="exchangePoint">
                    <option value="0" @if($user->exchangePoint == 0) selected @endif>ไม่มีสิทธิ</option>
                    <option value="1" @if($user->exchangePoint == 1) selected @endif>มีสิทธิ</option>
                  </select>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      @endforeach
      
    </div>
  </div>
</div>
@endsection