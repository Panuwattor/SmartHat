@extends('master')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">เติมน้ำมัน</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item active">Refuels</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content" id="Oil">
  <div class="row">
    @foreach($tanks as $tank)
    <div class="col-12 col-sm-6 col-md-4">
      <div class="info-box" data-toggle="modal" data-target="#createRefuelModel{{$tank->id}}">
        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-fax"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">{{$tank->name}}</span>
          <span class="badge badge-warning float-right">{{$tank->price}} ฿</span>
          <span class="info-box-number">
            {{$tank->number}}
          </span>
          <div class="progress">
            <div class="progress-bar bg-primary" style="width: {{($tank->volume * 100) / $tank->volumeMax}}%"></div>
          </div>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
      <button type="button" class="btn btn-outline-warning btn-sm" data-toggle="modal" data-target="#editTank{{$tank->id}}"> <i class="fa fa-edit"></i> แก้ไขราคา</button>
      <div class="modal fade" id="editTank{{$tank->id}}" tabindex="-1" role="dialog" aria-labelledby="editTankLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <form method="post" class="form-horizontal" action="/admin/oil/tank/price/{{$tank->id}}">
              {{ csrf_field() }}
              <div class="modal-header">
                <h3> <i class="fa fa-edit"></i> แก้ไขราคา น้ำมัน</h3>
              </div>
              <div class="modal-body">
                <div class="form-group">
                  <label>ราคาต่อลิตร</label>
                  <input type="number" name="price" step="any" value="{{$tank->price}}" class="form-control" autocomplete="off" require>
                  </br>
                  <label>ราคาตลาด</label>
                  <input type="number" name="price_ptt" :value="DieselPrice" class="form-control is-valid" autocomplete="off" readonly>
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
    <div class="modal fade" id="createRefuelModel{{$tank->id}}" tabindex="-1" role="dialog" aria-labelledby="createTanksModelLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <form method="post" class="form-horizontal" action="/admin/refuel/{{$tank->id}}">
            {{ csrf_field() }}
            <div class="modal-header">
              <h3> <i class="fa fa-fax"></i> เติมน้ำมัน <small class="text-info">{{$tank->name}}</small></h3>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-6">
                  <div class="form-group">
                    <label>เลขก่อนเติม</label>
                    <input type="text" name="fromAmount" value="{{$tank->number}}" id="fromAmount" class="form-control" autocomplete="off" readonly>
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label>เลขหลังเติม</label>
                    <input type="number" name="toAmount" value="" step="any" id="toAmount" min="{{$tank->number}}" class="form-control form-control-lg calculate" autocomplete="off" required>
                  </div>
                </div>
                <div class="col-4">
                  <div class="form-group">
                    <label>จำนวนที่เติม</label>
                    <input type="number" name="amount" value="0" step="any" id="amount" class="form-control" autocomplete="off" readonly>
                  </div>
                </div>
                <div class="col-4">
                  <div class="form-group">
                    <label>ราคาต่อลิตร</label>
                    <input type="number" name="price" value="{{$tank->price}}" id="price" step="any" class="form-control" autocomplete="off" readonly>
                  </div>
                </div>
                <div class="col-4">
                  <div class="form-group">
                    <label>ราคารวม</label>
                    <input type="number" name="priceTotal" value="0" step="any" id="priceTotal" class="form-control is-valid" autocomplete="off">
                  </div>
                </div>
                <div class="col-12">
                  <label>เลือกรถ</label>
                  <div class="form-group ">
                    <div class="icheck-success d-inline ml-2">
                      <input class="choose" type="radio" value="1" name="carType" checked="" id="radioSuccess1">
                      <label for="radioSuccess1">
                        รถภายใน
                      </label>
                    </div>
                    <div class="icheck-success d-inline ml-2">
                      <input class="choose" type="radio" value="2" name="carType" id="radioSuccess2">
                      <label for="radioSuccess2">
                        รถในเครือ
                      </label>
                    </div>
                    <div class="icheck-success d-inline ml-2">
                      <input class="choose" type="radio" value="3" name="carType" id="radioSuccess3">
                      <label for="radioSuccess3">
                        รถภายนอก
                      </label>
                    </div>
                  </div>
                  <div class="form-group car">
                    <select class="form-control is-warning" name="car_id">
                      <option value="0">กรุณาเลือกรถภายใน</option>
                      @foreach($cars as $car)
                      <option value="{{$car->id}}">{{$car->name}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group group">
                    <select class="form-control is-warning" name="group_car_id">
                      <option value="0">กรุณาเลือกสาขา</option>
                      @foreach($groups as $group)
                      <option value="{{$group->id}}">{{$group->name}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-12">
                  <label>การชำระ</label>
                  <div class="form-group">
                    <div class="icheck-primary d-inline ml-2">
                      <input type="radio" name="type" value="1" id="radioPrimary1">
                      <label for="radioPrimary1">
                        เงินสด
                      </label>
                    </div>
                    <div class="icheck-primary d-inline ml-2">
                      <input type="radio" name="type" value="2" id="radioPrimary2">
                      <label for="radioPrimary2">
                        เงินโอน
                      </label>
                    </div>
                    <div class="icheck-primary d-inline ml-2">
                      <input type="radio" name="type" value="3" checked="" id="radioPrimary3">
                      <label for="radioPrimary3">
                        เครดิต
                      </label>
                    </div>
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-group">
                    <label>หมายเหตุ</label>
                    <textarea type="text" name="note" class="form-control" autocomplete="off" placeholder="ทะเบียนรถ และ ผู้มาเติม"></textarea>
                  </div>
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
    <div class="col-12 col-sm-6 col-md-6">
      <div style="padding: 20px;">
        <div style="padding: 10px; border-radius: 10px; color: #fff;">
          <div class="row" style="border: 2px solid #c7c7c7;">
            <div class="col-6" style="padding: 0px; background-color: #0171bb; text-align: center;">
              <span>ดีเซล</span> <span style="font-size: 18pt;">Diesel</span>
            </div>
            <div class="col-6" style="padding: 0px; text-align: center; background-color: #ffffff;">
              <span style="font-size: 18pt; color: rgb(1, 113, 187);">@{{DieselPrice}}</span>
            </div>
          </div>
          <small><span style="color: gray">ข้อมูลอ้างอิงเว็บไซต์</span> <a target="bank" href="https://www.pttor.com/oilprice-capital.aspx">https://www.pttor.com/oilprice-capital.aspx</a></small>
        </div>
      </div>
    </div>

  </div>
  <div class="row justify-content-center">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">รายการเติมน้ำมัน</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered">
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
                  <th>Action</th>
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
                  <td>@if($refuel->status == 1 ) <span class="badge badge-success">ปกติ</span> @elseif($refuel->status == 0 ) <span class="badge badge-danger">ยกเลิก</span> @else <span class="badge badge-info">รอชำระเงิน</span> @endif</td>
                  <td>
                    @if($on == 0 && $refuel->status != 0 && $refuel->created_at > Carbon\Carbon::today() )
                    <form method="post" class="form-horizontal" action="/admin/refuel/{{$refuel->id}}/cancel">
                      {{ csrf_field() }}
                      <button type="submit" class="btn btn-sm btn-danger" name="status" value="complete"> X ยกเลิก</button>
                    </form>
                    @endif
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
          {{$refuels->links()}}
        </div>
      </div>
    </div>
  </div>
  @endsection
  @section('footer')
  <script src="https://cdn.jsdelivr.net/npm/vue@2.6.11"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.min.js" integrity="sha256-T/f7Sju1ZfNNfBh7skWn0idlCBcI3RwdLSS4/I7NQKQ=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/x2js/1.2.0/xml2json.min.js" integrity="sha256-RbFvov4fXA9DW/RzOAcIC0ZHIDmghGdsoug5slJHMMI=" crossorigin="anonymous"></script>

  <script>
    var app = new Vue({
      el: '#Oil',
      data() {
        return {
          mdata: "good luck",
          DieselPrice: 0,
        }
      },
      created() {
        this.getOil();
      },
      methods: {
        getOil: async function() {
          // /getOil
          var res = await axios.get('/getOil');
          var oil_res = res.data.data;
          for (var i = 0; i < oil_res.length; i++) {
            if (oil_res[i].nameEn == "Diesel B7") {
              this.DieselPrice = oil_res[i].price;
            }
          }
        }
      },
    });
  </script>

  <script>
    $(function() {
      $('.group').hide();
      $('.choose').on('change', function() {
        if ($(this).val() == '1') {
          $('.car').show();
          $('.group').hide();
          document.getElementById("radioPrimary3").checked = true;
        } else if ($(this).val() == '2') {
          $('.car').hide();
          $('.group').show();
          document.getElementById("radioPrimary3").checked = true;
        } else {
          $('.car').hide();
          $('.group').hide();
          document.getElementById("radioPrimary1").checked = true;
        }
      });

      $('.calculate').on('keyup', toAmount);

      function toAmount() {
        var toAmount = $('#toAmount').val();
        var fromAmount = $('#fromAmount').val();
        var price = $('#price').val();
        $('#amount').val((toAmount - fromAmount).toFixed(2));
        var amount = $('#amount').val();
        $('#priceTotal').val(amount * price).toFixed(2);
      }

    });
  </script>
  @endsection