@extends('master')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">รายงานเติมน้ำมัน รอวางบิล</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item"><a href="/admin/refuels">refuels</a></li>
          <li class="breadcrumb-item active">รายงานเติมน้ำมัน รอวางบิล</li>
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
          <form method="post" class="form-horizontal" action="/admin/billing/refuel/create" enctype="multipart/form-data">
                  {{ csrf_field() }}
              <div class="card-header">
                  <h3 class="card-title">  <i class="fa fa-list-alt"></i> รายงานเติมน้ำมัน รอวางบิล ทั้งหมด</h3>
              </div>
              <div class="card-body table-responsive">
                <div class="mailbox-controls m-2">
                  <div class="btn-group">
                    <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-file"></i> วางบิล</button>
                  </div>
                </div>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr class="text-center">
                      <th>#</th>
                      <th>ผู้ทำ</th>
                      <th>ถัง</th>
                      <th>จาก-ถึง</th>
                      <th>จำนวน</th>
                      <th>ราคา/หน่วย</th>
                      <th>ราคารวม</th>
                      <th>การชำระ</th>
                      <th>ประเภทรถ</th>
                      <th>หมายเหตุ</th>
                      <th>สถานะ</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($refuels as $on=>$refuel)
                    <tr class="text-center">
                      <td>                         
                        <div class="icheck-primary">
                           <input type="checkbox" value="{{$refuel->id}}" name="checks[]" id="check{{$refuel->id}}">
                           <label for="check{{$refuel->id}}"> # {{$refuel->group_car_id}}</label>
                        </div>
                      </td>
                      <td>{{$refuel->user->name}}</td>
                      <td>{{$refuel->tank->name}}</td>
                      <td>{{$refuel->fromAmount}} - {{$refuel->toAmount}} </br> <small class="text-success">{{$refuel->created_at}}</small> </td>
                      <td>{{number_format($refuel->amount,2)}}</td>
                      <td>{{number_format($refuel->price,2)}}</td>
                      <td>{{number_format($refuel->priceTotal,2)}}</td>
                      <td>@if($refuel->type == 1 ) เงินสด @elseif($refuel->type == 2) เงินโอน @else เครดิต @endif</td>
                      <td>@if($refuel->carType == 1 ) รถภายใน </br> {{$refuel->car ? $refuel->car->name : '-'}} @elseif($refuel->carType == 2) รถในเครือ </br>{{$refuel->group ? $refuel->group->name : '-'}}@else รถภายนอก @endif</td>
                      <td>{{$refuel->note}}</td>
                      <td>@if($refuel->status == 1 ) <span class="badge badge-success">ปกติ</span>   @elseif($refuel->status == 0 ) <span class="badge badge-danger">ยกเลิก</span>  @else  <span class="badge badge-info">รอชำระเงิน</span>  @endif</td>
                    </tr>
                    @endforeach
                  </tbody>
                  <tfoot>
                    <tr class="text-center">
                      <th colspan="4"> รวม </th>
                      <th class="text-right">{{ number_format($refuels->sum('amount'),2) }}</th>
                      <th class="text-right"></th>
                      <th class="text-right">{{ number_format($refuels->sum('priceTotal'),2) }}</th>
                      <th colspan="4"></th>
                    </tr>
                  </tfoot>
                 </table>
              </div>
              </form>
          </div>
      </div>
  </div>
</section>
@endsection
@section('header')
@section('header')
<link rel="stylesheet" href="https://taweechai-bucket.s3-ap-southeast-1.amazonaws.com/upvc/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://taweechai-bucket.s3-ap-southeast-1.amazonaws.com/upvc/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
@endsection

@section('footer')
<script src="https://taweechai-bucket.s3-ap-southeast-1.amazonaws.com/upvc/admin/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="https://taweechai-bucket.s3-ap-southeast-1.amazonaws.com/upvc/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="https://taweechai-bucket.s3-ap-southeast-1.amazonaws.com/upvc/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="https://taweechai-bucket.s3-ap-southeast-1.amazonaws.com/upvc/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable(
      {
  				pageLength: 100
			}
    );
  });
</script>
@endsection
