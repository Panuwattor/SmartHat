@extends('master')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">ถังน้ำมัน</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item active">Tanks</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="row justify-content-center">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Bordered Table</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#createTanksModel"> <i class="fa fa-plus"></i> เพิ่ม</button>
          </div>
          <div class="modal fade" id="createTanksModel" tabindex="-1" role="dialog" aria-labelledby="createTanksModelLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <form method="post" class="form-horizontal" action="/admin/oil/tank">
                  {{ csrf_field() }}
                  <div class="modal-header">
                    <h3> <i class="fa fa-plus"></i> เพิ่มถังน้ำมัน</h3>
                  </div> 
                  <div class="modal-body">
                   <div class="form-group">
                      <label>สินค้า</label>
                      <select class="form-control is-warning" name="spec_id">
                        @foreach($specs as $spec)
                          <option value="{{$spec->id}}">{{$spec->name}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label>ชื่อถัง</label>
                      <input type="text" name="name" value="" class="form-control" autocomplete="off" require>
                    </div>
                    <div class="form-group">
                      <label>เลขปัจจุบัน</label>
                      <input type="number" name="number" value="" step="any" class="form-control" autocomplete="off" require>
                    </div>
                    <div class="form-group">
                      <label>ยอดน้ำมันในถัง</label>
                      <input type="number" name="volume" value="" step="any" class="form-control" autocomplete="off" require>
                    </div>
                    <div class="form-group">
                      <label>บรรจุสูงสุดในถัง</label>
                      <input type="number" name="volumeMax" value="" step="any" class="form-control" autocomplete="off" require>
                    </div>
                    <div class="form-group">
                      <label>ราคาต่อลิตร</label>
                      <input type="number" name="price" value="" step="any" class="form-control" autocomplete="off" require>
                    </div>
                    <div class="form-group">
                      <label>สถานะ</label>
                      <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" value="1" id="customRadio1" name="status" checked="">
                        <label for="customRadio1" class="custom-control-label text-success">ใช้งาน</label>
                      </div>
                      <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" value="0" id="customRadio2" name="status">
                        <label for="customRadio2" class="custom-control-label text-danger">ไม่ใช้งาน</label>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                    <button type="submit" class="btn btn-primary">ยืนยันบันทึก</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table class="table table-bordered">
            <thead>                  
              <tr class="text-center">
                <th>#</th>
                <th>ชื่อถัง</th>
                <th>น้ำมัน</th>
                <th>เลขปัจจุบัน</th>
                <th>ยอดน้ำมันในถัง</th>
                <th>บรรจุสูงสุดในถัง</th>
                <th>ราคาต่อลิตร</th>
                <th>สถานะ</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($tanks as $tank)
              <tr class="text-center">
                <td>{{$tank->id}}</td>
                <td>{{$tank->name}}</td>
                <td>{{$tank->spec->name}}</td>
                <td>{{$tank->number}}</td>
                <td>{{$tank->volume}}</td>
                <td>{{$tank->volumeMax}}</td>
                <td>{{$tank->price}}</td>
                <td>@if($tank->status == 1) <span class="text-success">ใช้งาน</span>  @else <span class="text-danger">ไม่ใช้งาน</span>  @endif</td>
                <td>
                <div class="card-tools">
                  <button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#editTank{{$tank->id}}"> <i class="fa fa-edit"></i> แก้ไข</button>
                </div>
                </td>
              </tr>
              <div class="modal fade" id="editTank{{$tank->id}}" tabindex="-1" role="dialog" aria-labelledby="editTankLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <form method="post" class="form-horizontal" action="/admin/oil/tank/{{$tank->id}}">
                      {{ csrf_field() }}
                      <div class="modal-header">
                        <h3> <i class="fa fa-edit"></i> แก้ไขถังน้ำมัน</h3>
                      </div> 
                      <div class="modal-body">
                        <div class="form-group">
                          <label>สินค้า</label>
                          <select class="form-control is-warning" name="spec_id">
                            @foreach($specs as $spec)
                              <option value="{{$spec->id}}" @if($tank->spec_id == $spec->id) selected @endif>{{$spec->name}}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="form-group">
                          <label>ชื่อถัง</label>
                          <input type="text" name="name" value="{{$tank->name}}" class="form-control" autocomplete="off" require>
                        </div>
                        <div class="form-group">
                          <label>เลขปัจจุบัน</label>
                          <input type="number" name="number" value="{{$tank->number}}" step="any" class="form-control" autocomplete="off" require>
                        </div>
                        <div class="form-group">
                          <label>ยอดน้ำมันในถัง</label>
                          <input type="number" name="volume" value="{{$tank->volume}}" step="any" class="form-control" autocomplete="off" require>
                        </div>
                        <div class="form-group">
                          <label>บรรจุสูงสุดในถัง</label>
                          <input type="number" name="volumeMax" value="{{$tank->volumeMax}}" step="any" class="form-control" autocomplete="off" require>
                        </div>
                        <div class="form-group">
                          <label>ราคาต่อลิตร</label>
                          <input type="number" name="price" value="{{$tank->price}}" step="any" class="form-control" autocomplete="off" require>
                        </div>
                        <div class="form-group">
                          <label>สถานะ</label>
                          <div class="custom-control custom-radio">
                            <input class="custom-control-input" type="radio" value="1" id="customRadio3" name="status" @if($tank->status == 1) checked @endif>
                            <label for="customRadio3" class="custom-control-label text-success">ใช้งาน</label>
                          </div>
                          <div class="custom-control custom-radio">
                            <input class="custom-control-input" type="radio" value="0" id="customRadio4" name="status" @if($tank->status == 0) checked @endif>
                            <label for="customRadio4" class="custom-control-label text-danger">ไม่ใช้งาน</label>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                        <button type="submit" class="btn btn-primary">ยืนยันบันทึก</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
          <ul class="pagination pagination-sm m-0 float-right">
            <li class="page-item"><a class="page-link" href="#">«</a></li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">»</a></li>
          </ul>
        </div>
      </div>
    </div>
</div>
@endsection
