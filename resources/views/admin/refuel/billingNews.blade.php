@extends('master')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark"> บิลยังไม่ชำระเงิน</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item"><a href="/admin/refuels">refuels</a></li>
          <li class="breadcrumb-item active">บิลยังไม่ชำระเงิน</li>
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
          <h3 class="card-title"> <i class="fa fa-bell"></i> รายการบิลยังไม่ชำระเงิน ปกติ ทั้งหมด</h3>
        </div>

        <form action="/billing/admin/refuel/new/create/receipt" method="get">
          @csrf
          <div class="card-body">
            <button type="submit" class="btn btn-sm btn-outline-success">ออกใบเสร็จ</button>

            <div class="table-responsive mt-2">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr class="text-center">
                    <th>เลือก</th>
                    <th># บิลเลขที่</th>
                    <th>รายละเอียดลูกค้า</th>
                    <th>ผู้ออกบิล</th>
                    <th>ยอดรวม</th>
                    <th>วันที่ออกบิล</th>
                    <th>ยกเลิก</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($billings as $billing)
                  <tr class="text-center">
                    <td>
                      <div class="icheck-primary d-inline">
                        <input type="checkbox" id="checkboxBilling{{$billing->id}}" name="bllings_id[]" value="{{$billing->id}}">
                        <label for="checkboxBilling{{$billing->id}}">
                        </label>
                      </div>
                    </td>
                    <td><a href="/billing/admin/refuel/new/{{$billing->id}}/show"> <button type="button" class="btn btn-block btn-outline-info btn-xs"> # {{$billing->name}}</button></a></td>
                    <td>{{$billing->note}}</td>
                    <td>{{$billing->user->name}}</td>
                    <td>{{ number_format($billing->priceTotal,2)}}</td>
                    <td>{{$billing->date}}</td>
                    <td class="text-center">
                      @if($billing->created_at > Carbon\Carbon::today())
                      <button onclick="event.preventDefault(); document.getElementById('billngForm{{$billing->id}}').submit();" type="button" class="btn btn-outline-danger btn-xs">X ยกเลิก</button>
                      @endif
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </form>

        @foreach($billings as $billing)
        @if($billing->created_at > Carbon\Carbon::today())
        <form id="billngForm{{$billing->id}}" method="post" class="form-horizontal" action="/billing/admin/refuel/new/{{$billing->id}}/cancel" onSubmit="if(!confirm('ยืนยัน ยกเลิก ใบวางบิล ใช่หรือไม่ ?')){return false;}">
          {{ csrf_field() }}
        </form>
        @endif
        @endforeach
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
@endsection