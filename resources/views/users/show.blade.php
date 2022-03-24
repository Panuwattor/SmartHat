@extends('backend.master')

@section('content')
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">User Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-success card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                 @if(auth()->user()->photo)
                  <img src="{{ Storage::disk('spaces')->url(auth()->user()->photo) }}" alt="User profile picture" class="profile-user-img img-fluid img-circle">
                  @else
                  <img src="https://www.wisible.io/wp-content/uploads/2019/08/avatar-human-male-profile-user-icon-518358.png" alt="User Avatar" class="profile-user-img img-fluid img-circle">
                  @endif
                </div>

                <h3 class="profile-username text-center">{{$user->name}}</h3>

                <p class="text-center text-success">{{$user->email}}</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>แต้ม</b> <a class="float-right  text-success">{{$user->point}}</a>
                  </li>
                </ul>

                <button data-toggle="modal" data-target="#editUserModal{{$user->id}}" class="btn btn-block"> <i class="fa fa-edit"></i> แก้ไขข้อมูล</button>
              </div>
              <div class="modal fade" id="editUserModal{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa-edit"></i> แก้ไข User</h5>
                    </div>
                      <form method="post" class="form-horizontal" action="/admin/auth/user/update/{{$user->id}}" enctype="multipart/form-data">
                          {{ csrf_field() }}
                        <div class="modal-body">
                          <div class="form-group">
                            <label>รุป</label>
                            <input class="form-control" type="file" name="photo" multiple>
                          </div>
                          <div class="form-group">
                              <label for="inputPassword3" class="col-control-label">ชื่อ</label>
                              <div class="col-sm-12">
                                  <input type="text" placeholder="ชื่อ" class="form-control" value="{{$user->name}}" name="name" required>
                              </div>
                          </div>
                          <div class="form-group">
                              <label for="inputPassword3" class="col-control-label">Password</label>
                              <div class="col-sm-12">
                                  <input type="text" placeholder="ถ้าไม่เปลี่ยนไม่ต้องกรอก Password" class="form-control" name="password" minlength="4" maxlength="20">
                              </div>
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
            </div>
            <!-- /.card -->
         
          </div>
          <!-- /.col -->
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
                 <form role="form" method="get">
                  <div class="input-group">
                      <input type="date" class="form-control text-center" name="from" id="from" data-date-format="yyyy-mm-dd" value="{{$from}}" data-provide="datepicker" autocomplete="off">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          >
                        </span>
                      </div>
                      <input type="date" class="form-control text-center" name="to" id="to" data-date-format="yyyy-mm-dd" value="{{$to}}" data-provide="datepicker" autocomplete="off">
                      <div class="input-group-append">
                        <button class="btn btn-success btn-flat">ค้นหา</button>
                      </div>
                  </div>
                </form>
            </div>
            <div class="card card-success card-outline">
              <div class="card-header">
               <h3 class="card-title"> <i class="fa fa-plus-square-o  mr-1"></i> รายงานแต้มที่ได้รับ</h3>
              </div><!-- /.card-header -->
              <div class="card-body">
              <div class="table-responsive">
              <table class="table table-bordered">
                  <thead>
                    <tr class="text-center">
                      <th style="width: 10px">ลำดับ</th>
                      <th>แต้มจากรายการ</th>
                      <th>หมายเหตุ</th>
                      <th>จาก - ถึง </th>
                      <th>จำนวนแต้ม</th>
                      <th>เมื่อ</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($points as $on=>$point)
                  <tr  class="text-center">
                    <td>{{$on+1}}</td>
                    <td> <a href="{{$point->link}}" target="back_"> {{$point->type}}</a></td>
                    <td>{{$point->note}} </td>
                    <td>{{$point->from_point}} - {{$point->to_point}} </td>
                    <td>
                      @if($point->point >= 0)
                      <span class="badge bg-success">{{$point->point}}</span>
                      @else
                      <span class="badge bg-danger">{{$point->point}}</span>
                      @endif
                    </td>
                    <td>{{$point->created_at}} </td>
                  </tr>
                  @endforeach
                  </tbody>
              </table>
                <!-- /.tab-content -->
                </div>
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
@endsection
