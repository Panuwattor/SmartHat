@extends('master')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Order Receipt</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item"><a href="/admin/refuels">refuels</a></li>
          <li class="breadcrumb-item active">Receipt</li>
        </ol>
      </div>
    </div>
  </div>
</div>
<div class="card">
  <div class="card-header">
    <h3 class="card-title">ใบเสร็จรับเงิน</h3>
  </div>
  <div class="card-body">
    <div class="row">
      <div class="col-12 col-md-2">
        <span><b>เลขที่</b></span>
        <br>
        <span class="text-muted">{{$receipt->code}}</span>
      </div>
      <div class="col-12 col-md-2">
        <span><b>วันที่</b></span>
        <br>
        <span class="text-muted">{{$receipt->date->format('Y-m-d')}}</span>
      </div>
      <div class="col-12 col-md-2">
        <span><b>ลูกค้า</b></span>
        <br>
        <span class="text-muted">{{$receipt->billing->note}}</span>
      </div>
    </div>
    <div class="card-body table-responsive p-0 mt-2">
      <table class="table table-hover text-nowrap">
        <thead>
          <tr class="text-center" style="background-color: #ddd;">
            <th>#</th>
            <th>ถัง</th>
            <th>ประเภทรถ</th>
            <th>หมายเหตุ</th>
            <th>จำนวน</th>
            <th>ราคา/หน่วย</th>
            <th>รวม</th>
          </tr>
        </thead>
        <tbody>
          @foreach($receipt->billings as $billing)
          @foreach($billing->refuels as $on=>$refuel)
          <tr class="text-center">
            <td> {{$on+1}}</td>
            <td>{{$refuel->tank->name}}</td>
            <td>@if($refuel->carType == 1 ) รถภายใน </br> {{$refuel->car ? $refuel->car->name : '-'}} @elseif($refuel->carType == 2) รถในเครือ </br>{{$refuel->group ? $refuel->group->name : '-'}}@else รถภายนอก @endif</td>
            <td>{{$refuel->note}}</td>
            <td>{{number_format($refuel->amount,2)}}</td>
            <td>{{number_format($refuel->price,2)}}</td>
            <td>{{number_format($refuel->priceTotal,2)}}</td>
          </tr>
          @endforeach
          @endforeach
        </tbody>
      </table>
    </div>
    <div class="row">
      <div class="col-12 col-md-4">
        <h5 style="color: gray;">Receipt Method</h5>
        @foreach($receipt->payments as $payment)
        <div class="row mb-3">
          <div class="col-5">
            <input type="text" readonly class="form-control form-control-sm" value="{{$payment->bank_account->code}}: {{$payment->bank_account->name}}" title="{{$payment->bank_account->code}}: {{$payment->bank_account->name}}">
          </div>
          <div class="col-3">
            <input type="text" readonly class="form-control form-control-sm" value="{{$payment->payment_date}}" title="{{$payment->payment_date}}">
          </div>
          <div class="col-3">
            <input type="text" readonly class="form-control form-control-sm" value="{{number_format($payment->payment_amount,2)}}" title="{{number_format($payment->payment_amount,2)}}">
          </div>
        </div>
        @endforeach
      </div>
      <div class="col-12 col-md-4">
        <h5 style="color: gray;">Account View</h5>
        <div class="table-responsive p-0">
          <table class="table text-nowrap" style="color: gray;">
            <thead>
              <tr>
                <th>No</th>
                <th>Account</th>
                <th class="text-right">Debit</th>
                <th class="text-right">Credit</th>
              </tr>
            </thead>
            <tbody>
              @foreach($receipt->account_views as $x => $account_view)
              <tr>
                <td>{{$x + 1}}</td>
                <td>{{$account_view->accounting->code}}: {{$account_view->accounting->name}}</td>
                <td class="text-right">{{number_format($account_view->debit,2)}}</td>
                <td class="text-right">{{number_format($account_view->credit,2)}}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
      <div class="col-12 col-md-4" style="color: gray;">
        <h5 style="color: gray;">Payment</h5>
        <div style="padding: 5px;">
          <div class="form-group row">
            <label class="col-sm-4 col-form-label">TOTAL</label>
            <div class="col-sm-8 text-right">
              {{number_format($receipt->priceTotal,2)}}
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-4 col-form-label">DISCOUNT</label>
            <div class="col-sm-8 text-right">
              {{number_format($receipt->discount,2)}}
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-4 col-form-label">TAX BASE</label>
            <div class="col-sm-8 text-right">
              {{number_format($receipt->priceTotal - $receipt->discount,2)}}
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-4 col-form-label">GRAN TOTAL</label>
            <div class="col-sm-8 text-right">
              {{number_format($receipt->priceTotal - $receipt->discount,2)}}
            </div>
          </div>
        </div>
      </div>
    </div>
    @if($receipt->status == 0)
    <div class="row">
      <div class="col-12">
        <form action="/billing/admin/refuel/receipt/{{$receipt->id}}/approve" method="post" onsubmit="return confirm('ยืนยัน ?')">
            @csrf
            <button type="submit" class="btn btn-outline-success btn-sm" style="float: right;">ยืนยัน</button>
        </form>
        <span style="float: right;" class="text-danger"><i class="fa fa-warning"></i> กรุณาตรวจสอบยอดเงินให้ถูกต้องก่อนยืนยัน&nbsp;&nbsp;</span>
        <form action="/billing/admin/refuel/receipt/{{$receipt->id}}/cancel" method="post" onsubmit="return confirm('ยืนยัน ยกเลิก ?')">
            @csrf
            <button type="submit" class="btn btn-outline-danger btn-sm">ยกเลิก</button>
        </form>
      </div>
    </div>
    @endif
  </div>
</div>
@endsection

@section('header')

@endsection

@section('footer')

@endsection