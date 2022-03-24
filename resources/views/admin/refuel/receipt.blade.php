@extends('master')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Oil Receipt</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item"><a href="/admin/refuels">refuels</a></li>
          <li class="breadcrumb-item active">receipt</li>
        </ol>
      </div>
    </div>
  </div>
</div>

<section class="content">
  <div class="row">
    <div class="col-md-8">
      <div class="card bg-light">
        @include('admin.refuel.new_page')
      </div>
    </div>

    <div class="col-md-4">
      <div class="card card-secondary">
        <div class="card-header">
          <h3 class="card-title">ออกใบเสร็จ</h3>
        </div>
        <form method="post" class="form-horizontal" action="/billing/admin/refuel/new/receipt" onSubmit="if(!confirm('ยืนยัน การทำรายการ หรือ ไม่ ?')){return false;}" enctype="multipart/form-data">
          {{ csrf_field() }}

          @foreach($billings as $billing)
          <input type="hidden" name="billings_id[]" value="{{$billing->id}}">
          @endforeach
          <div class="card-body">
            <div class="form-group">
              <label>ยอดรวมทั้งหมด</label>
              <input type="number" id="priceTotal" class="form-control" value="{{$billings->sum('priceTotal')}}" readonly>
            </div>
            <div class="form-group">
              <label>Vat 7%</label>
              <input type="number" id="tax" name="tax" class="form-control" value="0" readonly>
            </div>
            <div class="form-group">
              <label>ส่วนลด</label>
              <input type="number" id="discount" name="discount" class="form-control" value="0" min="0" max="{{$billings->sum('priceTotal')}}">
            </div>
            <div class="form-group text-success">
              <label>ยอดที่ต้องชำระ</label>
              <input type="number" id="priceSum" name="priceSum" class="form-control text-success  is-valid" value="{{$billings->sum('priceTotal')}}" readonly>
            </div>

            <div class="row" id="app" v-cloak>
              <div class="col-12">
                <span class="text-info" style="cursor: pointer;" @click="add"><i class="fa fa-plus"></i> Add Account</span>
                <br>
                <br>
                <div class="row" v-for="(payment, index) in payments" style="padding: 5px; border: 2px solid #ddd;">
                  <div class="col-6">
                    <div class="form-group">
                      <span>Select Type : </span>
                      <select required name="payment_type_id[]" v-model="payment.payment_type_id" @change="getAccount(index)" class="form-control form-control-sm">
                        @foreach($payment_types as $payment_type)
                        <option value="{{$payment_type->id}}">{{$payment_type->name}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <span>Bank account : </span>
                      <select required name="bank_account_id[]" v-model="payment.bank_account_id" @change="check_bank_account(index)" class="form-control form-control-sm">
                        <option v-for="item in payment.accounts" v-bind:value="item.id">@{{item.code}}: @{{item.name}}</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <span>Date : </span>
                      <my-date-picker v-model="payment.date"></my-date-picker>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <span>Description : </span>
                      <input type="text" v-model="payment.description" required name="description[]" class="form-control form-control-sm">
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <span>Amount : </span>
                      <input v-model="payment.amount" required autocomplete="off" class="form-control form-control-sm" type="text" name="payment_amount[]" @keyup="payments_sum">
                    </div>
                  </div>
                  <div class="col-2">
                    <div class="form-group">
                      <br>
                      <span v-if="index == payments.length - 1 && payments.length > 1" class="text-danger" style="cursor: pointer;" @click="remove(index)"><i class="fas fa-trash-alt"></i> ลบ</span>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12 text-right">
                    <br>
                    <b><span class="text-info">Total : @{{numer(payment_sum)}} THB.</span></b>
                  </div>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label>หมายเหตุ</label>
              <textarea type="text" id="note" name="note" class="form-control"></textarea>
            </div>
          </div>
          <div class="row card-footer">
            <div class="col-12">
              <a href="/order/work/late/billings" class="btn btn-secondary">ยกเลิก</a>
              <button type="submit" id="submit" class="btn btn-success float-right">ยืนยันออกใบเสร็จ</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

</section>
@endsection

@section('header')
<style>
  .table-bordered th {
    border: 1px solid #dee2e6;
  }

  .table-bordered td {
    border: 0px solid #dee2e6;
    border-left: 1px solid #dee2e6;
    border-right: 1px solid #dee2e6;
  }
</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker3.standalone.min.css">
<link rel="stylesheet" href="https://taweechai-bucket.s3-ap-southeast-1.amazonaws.com/upvc/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://taweechai-bucket.s3-ap-southeast-1.amazonaws.com/upvc/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
@endsection

@section('footer')
<script>
  $(function() {
    $('#discount').on('keyup', discount);
    $('#payment').on('keyup', payment);

    function discount() {
      var priceTotal = $('#priceTotal').val();
      var discount = $('#discount').val();
      $('#priceSum').val(priceTotal - discount);
      $('#payment').val(0);
    }

    function payment() {
      var priceSum = $('#priceSum').val();
      var payment = $('#payment').val();
      $('#change').val(payment - priceSum);
    }
  });

  function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
  }

  async function PrintDiv() {
    var printContents = document.getElementById('billing').innerHTML;
    var originalContents = document.body.innerHTML;
    document.body.innerHTML = printContents;
    await sleep(1000);
    window.print();
    document.body.innerHTML = originalContents;
  }

  function onSelect_type() {
    var select_type = document.getElementById('type').value

    if (select_type == 'เงินโอน') {
      document.getElementById('money_transfer').style.display = 'block';
      document.getElementById('photo').required = true;
    } else {
      document.getElementById('money_transfer').style.display = 'none';
      document.getElementById('photo').required = false;
    }
  }
</script>

<!-- vue cdn -->
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha256-bqVeqGdJ7h/lYPq6xrPv/YGzMEb6dNxlfiTUHSgRCp8=" crossorigin="anonymous"></script>

<script>
    Vue.component('my-date-picker',{
        template: '<input required autocomplete="off" type="text" name="payment_date[]" class="form-control form-control-sm" v-datepicker :value="value" @input="update($event.target.value)">',
        directives: {
            datepicker: {
                inserted (el, binding, vNode) {
                    $(el).datepicker({
                        autoclose: true,
                        format: 'yyyy-mm-dd'
                    }).on('changeDate',function(e){
                        vNode.context.$emit('input', e.format(0))
                    })
                }
            }
        },
        props: ['value'],
        methods: {
            update (v){
                this.$emit('input', v)
            }
        }
    })

    var app = new Vue({
        el: '#app',
        data() {
            return {
                total_price: 0,
                special_discount: 0,
                sum_price: 0,
                vat_amount: 0,
                payments: new Array(),
                sum: 0,
                payment_sum: 0,
            }
        },
        mounted: async function() {
            await this.payments.push({
                payment_type_id: '',
                bank_account_id: '',
                date: "{{\Carbon\Carbon::today()->format('Y-m-d')}}",
                amount: this.sum,
                accounts: '',
                description: '',
            });

            this.payments_sum();
        },
        methods: {
            numer(num) {
                return numeral(num).format('0,0.00');
            },
            add: async function() {
                var payments_amount = 0;
                for(var i =0; i< this.payments.length; i++){ 
                    payments_amount = parseFloat(payments_amount) + parseFloat(this.payments[i].amount);
                }

                await this.payments.push({
                    payment_type_id: '',
                    bank_account_id: '',
                    date: "{{\Carbon\Carbon::today()->format('Y-m-d')}}",
                    amount: 0,
                    accounts: '',
                    description: '',
                });
            },
            getAccount: async function(index) {    
                var res = await axios.get('/getAccount', {params:{
                    payment_type_id: this.payments[index].payment_type_id
                }});

                this.payments[index].accounts = res.data; 
            },
            payments_sum(){
                this.payment_sum = 0;
                for(var i1 = 0; i1<this.payments.length; i1++){
                    console.log(this.payments[i1].amount)
                    this.payment_sum = parseFloat(this.payment_sum) + parseFloat(this.payments[i1].amount);
                }

                var sum = document.getElementById('priceSum').value

                if (parseFloat(this.payment_sum) == parseFloat(sum)) {
                  document.getElementById('submit').disabled = false;
                } else {
                  document.getElementById('submit').disabled = true;
                }
            },
            check_bank_account(index){
                var bank_array = new Array();

                for(var i =0; i< this.payments.length; i++){ 
                    bank_array.push(this.payments[i].bank_account_id); 
                }

                var d = this.hasDuplicates(bank_array);
                if(d){
                    alert('บัญชีซ้ำกัน');
                    this.payments.splice(index, 1);
                }
            },
            hasDuplicates(arr)
            {
                return new Set(arr).size !== arr.length; 
            },
            remove(index){
              this.payments.splice(index, 1);
            }
        },
    });
</script>
@endsection