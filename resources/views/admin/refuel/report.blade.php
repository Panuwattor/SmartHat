@extends('master')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">รายงานเติมน้ำมันทั้งหมด</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item"><a href="/order/orders">Orders</a></li>
          <li class="breadcrumb-item active">รายงานเติมน้ำมันทั้งหมด</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="form-group">
     <form method="get">
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text">
              รายงานประจำวันที่ :
            </span>
          </div>
          <input type="text" class="form-control text-center" name="fromDate" id="fromDate" data-date-format="yyyy-mm-dd" value="{{$fromDate->format('Y-m-d')}}" data-provide="datepicker" autocomplete="off">
          <div class="input-group-prepend">
            <span class="input-group-text">
              >
            </span>
          </div>
          <input type="text" class="form-control text-center" name="toDate" id="toDate" data-date-format="yyyy-mm-dd" value="{{$toDate->format('Y-m-d')}}" data-provide="datepicker" autocomplete="off">
          <div class="input-group-prepend">
            <button type="submit" class="btn btn-success btn-flat">ค้นหา</button>
          </div>
        </div>
      </form>
    </div>
  <div class="row justify-content-center">
      <div class="col-12">
          <div class="card">
              <div class="card-header">
                  <h3 class="card-title">  <i class="fa fa-list-alt"></i> รายงานเติมน้ำมัน ทั้งหมด</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive">
                <table  id="example1" class="table table-bordered table-striped">
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
                      <td>{{$refuel->id}}</td>
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
                      <th colspan="1"></th>
                    </tr>
                  </tfoot>
                 </table>
              </div>
          </div>
      </div>
  </div>
</section>
@endsection
@section('header')
<link rel="stylesheet" href="{{ asset('/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
@endsection
@section('footer')
<script src="{{ asset('/admin/plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>

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
