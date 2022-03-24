@extends('master')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark"> รายการออกใบเสร็จ</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item"><a href="/admin/refuels">refuels</a></li>
          <li class="breadcrumb-item active">รายการออกใบเสร็จ</li>
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
                  <h3 class="card-title">  <i class="fa fa-bell"></i> รายการออกใบเสร็จ ทั้งหมด</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive">
                <table  id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr class="text-center">
                    <th>บิลที่</th>
                    <th style="width:40%">รายละเอียดลูกค้า</th>
                    <th>ผู้ออกบิล</th>
                    <th>วันที่ออกบิล</th>
                    <th>สถานะ</th>
                    <th>ยอดรวม</th>
                    <th>ใบเสร็จ</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($receipts as $receipt)
                    <tr class="text-center">
                      <td class="text-left"><a href="/oil/receipt/show/{{$receipt->id}}">{{$receipt->code}}</a></td>
                      <td class="text-left">{{$receipt->billing->note}}</td>
                      <td>{{$receipt->user->name}}</td>
                      <td>{{$receipt->date}}</td>
                      <td>{!!$receipt->state!!}</td>
                      <td class="text-right">{{ number_format($receipt->priceTotal,2)}}</td>
                      <td>
                        <a href="/billing/admin/refuel/receipt/{{$receipt->id}}/show"> <button type="button" class="btn btn-block btn-outline-success btn-xs"><i class="fa fa-print"></i> Receipt </br> {{$receipt->code}}</button></a>
                      </td>
                     </tr>
                     @endforeach
                  </tbody>
                  <thead>
                  <tr>
                    <th colspan="5" class="text-center">รวม</th>
                    <th class="text-right">{{number_format($receipts->sum('priceTotal'),2)}}</th>
                    <th></th>
                  </tr>
                  </thead>
                 </table>
              </div>
          </div>
      </div>
    </div>
  </div>
</section>
@endsection
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
      pageLength: 100,
      lengthChange: true,
      searching: true,
      ordering: false,
			}
    );
  });
</script>
@endsection