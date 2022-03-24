@extends('backend.master')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">เพิ่มแบบบ้าน</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>

                    <li class="breadcrumb-item active">เพิ่มแบบบ้าน</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<form id="app" v-cloak action="/admin/housestyle/store" method="post" enctype="multipart/form-data" onsubmit="return confirm('ยืนยันเพิ่ม ?')">
    @csrf
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="">รหัสแบบบ้าน <code>*</code></label>
                        <input type="text" name="codePlan" class="form-control form-control-sm" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="">ภาพตัวอย่างบ้าน <code>*</code> </label>
                        <input type="file" name="img" class="form-control form-control-sm" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="">ภาพแปลน </label>
                        <input type="file" name="plan" class="form-control form-control-sm" autocomplete="off" required>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-4">
                            <label for="">พื้นที่ใช้สอย <code>*</code></label>
                            <input type="text" name="space" class="form-control form-control-sm" autocomplete="off" required>
                        </div>
                        <div class="col-md-4">
                            <label for="">จำนวนชั้น <code>*</code></label>
                            <input type="text" name="floor" class="form-control form-control-sm" autocomplete="off" required>
                        </div>
                        <div class="col-md-4">
                            <label for="">ห้องนอน <code>*</code></label>
                            <input type="text" name="bedroom" class="form-control form-control-sm" autocomplete="off" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="">ห้องน้ำ <code>*</code></label>
                            <input type="text" name="toilet" class="form-control form-control-sm" autocomplete="off" required>
                        </div>
                        <div class="col-md-6">
                            <label for="">ที่จอดรถ <code>*</code></label>
                            <input type="text" name="car" class="form-control form-control-sm" autocomplete="off" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="">ขนาดอาคารขั้นต่ำจาก <code>*</code></label>
                            <input type="text" name="buildingWide" class="form-control form-control-sm" autocomplete="off" required>
                        </div>
                        <div class="col-md-6">
                            <label for="">ขนาดอาคารขั้นต่ำถึง <code>*</code></label>
                            <input type="text" name="buildingLong" class="form-control form-control-sm" autocomplete="off" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="">ขนาดที่ดินขั้นต่ำจาก <code>*</code></label>
                            <input type="text" name="minimumWide" class="form-control form-control-sm" autocomplete="off" required>
                        </div>
                        <div class="col-md-6">
                            <label for="">ขนาดที่ดินขั้นต่ำถึง <code>*</code></label>
                            <input type="text" name="minimumLong" class="form-control form-control-sm" autocomplete="off" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="">ราคาเริ่มต้น <code>*</code></label>
                        <input type="text" data-type="currency" name="price" class="form-control form-control-sm" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            @foreach($tags as $i => $tag)
                            <div class="form-group col-md-4">
                              <div class="checkbox">
                                <label>
                                  <input type="checkbox" name="tags[]" value="{{$tag->id}}"> {{$tag->name}} <small> </small>
                                </label>
                              </div>
                            </div>
                            @endforeach
                        </div>

                    </div>

                </div>
                <div class="card-footer">
                    <div class="row ">
                        <div class="col-md-12 text-right">
                            <button type="submit" class="btn btn-success"><i class="fas fa-save"> บันทึก</i> </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
</form>
<br><br>
@endsection

@section('header')
<style>
    .select2-container--default .select2-selection--single .select2-selection__rendered {
        color: #444;
        line-height: 30px;
    }

    .select2-container .select2-selection--single {
        box-sizing: border-box;
        cursor: pointer;
        display: block;
        height: 30px !important;
        padding-top: 4px !important;
        user-select: none;
        -webkit-user-select: none;
    }
</style>
<style>
    [v-cloak]>* {
        display: none;
    }

    [v-cloak]::before {
        content: " ";
        display: block;
        position: absolute;
        width: 80px;
        height: 80px;
        background-image: url(http://pluspng.com/img-png/loader-png-indicator-loader-spinner-icon-512.png);
        background-size: cover;
        left: 50%;
        top: 50%;
    }
</style>
<!-- Select2 -->
<link rel="stylesheet" href="https://taweechai-bucket.s3-ap-southeast-1.amazonaws.com/upvc/admin/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="https://taweechai-bucket.s3-ap-southeast-1.amazonaws.com/upvc/admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker3.standalone.min.css">
@endsection

@section('footer')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha256-bqVeqGdJ7h/lYPq6xrPv/YGzMEb6dNxlfiTUHSgRCp8=" crossorigin="anonymous"></script>
<!-- bs-custom-file-input -->
<script src="https://taweechai-bucket.s3-ap-southeast-1.amazonaws.com/upvc/admin/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- vue cdn -->
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<!-- Select2 -->
<script src="https://taweechai-bucket.s3-ap-southeast-1.amazonaws.com/upvc/admin/plugins/select2/js/select2.full.min.js"></script>
<script>
    $(function() {
        //Initialize Select2 Elements


        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })

        $(document).ready(function() {
            $(window).keydown(function(event) {
                if (event.keyCode == 13) {
                    event.preventDefault();
                    return false;
                }
            });
        });
    })
</script>

<script>
    $(document).ready(function() {
        bsCustomFileInput.init();
    });
</script>

<script>
    var app = new Vue({
        el: '#app',
        data() {
            return {
                arr: new Array(),
            }
        },

        created: async function() {
            await this.arr.push({
                name: '',
                amount: 1,
                unit: '',
                unit_price: 0,
                unit_discount: 0,
                price: 0,
                special_discount: 0,
                resource_id: null,
            });

            $('.2select' + this.arr.length).select2()

            this.arr1.push({
                file: ''
            });
        },
        methods: {
            add: async function() {
                await this.arr.push({
                    name: '',
                    amount: 1,
                    unit: '',
                    unit_price: 0,
                    unit_discount: 0,
                    price: 0,
                    special_discount: 0,
                    resource_id: null,
                });

                $('.2select' + this.arr.length).select2()
            },
            remove(id) {
                this.arr.splice(id, 1);
                this.cal();
            },
            add1() {
                this.arr1.push({
                    file: ''
                });
            },
            remove1(id) {
                this.arr1.splice(id, 1);
            },


            remove_pr(id) {
                this.prs.splice(id, 1);
            },
            getContract: async function() {
                var supplier_id = document.getElementById('supplier_id').value;
                if (!supplier_id) {
                    alert('ไม่ได้เลือกSupplier');
                    return;
                }

                document.getElementById('i_search').style.display = 'none'
                document.getElementById('i_search_spin').style.display = 'block'

                var res = await axios.get('/getContract', {
                    params: {
                        supplier_id: supplier_id
                    }
                });
                var sup = await axios.get('/getSupplier', {
                    params: {
                        supplier_id: supplier_id
                    }
                });
                this.vat_type = sup.data.vat_type

                document.getElementById('i_search').style.display = 'block'
                document.getElementById('i_search_spin').style.display = 'none'

                this.contracts = res.data;
                console.log(this.contracts)
            },
            select_resource: async function(index, select_resource) {
                console.log(select_resource)
                var res = await axios.get('/find/resource', {
                    params: {
                        resource_id: select_resource
                    }
                })

                if (res.data.status != 'success') {
                    alert(res.data.message);
                    return;
                }

                this.arr[index].name = res.data.value.FullName;
                this.arr[index].resource_id = res.data.value.id;
                this.arr[index].unit = res.data.value.unit.name;
                document.getElementById('name' + index).readOnly = true;
            },
            search_resource: async function(index) {
                if (this.value.length < 3) {
                    alert('ข้อความต้องมากกว่า 3');
                    return;
                }

                var res = await axios.get('/get-resource', {
                    params: {
                        'value': this.value
                    }
                });

                this.resources.resource_to = index;
                this.resources.resources = res.data;
                console.log(this.resources);
            }
        },
    });
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    $("input[data-type='currency']").on({
        keyup: function() {
            formatCurrency($(this));
        },
        blur: function() {
            validateCurrency($(this));
            formatCurrency($(this), "blur");
        }
    });

    function validateCurrency(input) {
        var c = parseFloat(input.val().replace(/\,|$/g, '').replace('$', ''));
        if (c < input.attr('min')) {
            input.val(input.attr('min'));
        } else if (c > input.attr('max')) {
            input.val(input.attr('max'));
        }
    }

    function formatNumber(n) {
        // format number 1000000 to 1,234,567
        return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",")
    }


    function formatCurrency(input, blur) {
        // appends $ to value, validates decimal side
        // and puts cursor back in right position.

        // get input value
        var input_val = input.val();

        // don't validate empty input
        if (input_val === "") {
            return;
        }

        // original length
        var original_len = input_val.length;

        // initial caret position 
        var caret_pos = input.prop("selectionStart");


        // check for decimal
        if (input_val.indexOf(".") >= 0) {

            // get position of first decimal
            // this prevents multiple decimals from
            // being entered
            var decimal_pos = input_val.indexOf(".");

            // split number by decimal point
            var left_side = input_val.substring(0, decimal_pos);
            var right_side = input_val.substring(decimal_pos);

            // add commas to left side of number
            left_side = formatNumber(left_side);

            // validate right side
            right_side = formatNumber(right_side);

            // On blur make sure 2 numbers after decimal
            if (blur === "blur") {
                right_side += "00";
            }

            // Limit decimal to only 2 digits
            right_side = right_side.substring(0, 2);

            // join number by .
            input_val = left_side + "." + right_side;

        } else {
            // no decimal entered
            // add commas to number
            // remove all non-digits
            input_val = formatNumber(input_val);
            input_val = input_val;

            // final formatting
            if (blur === "blur") {
                input_val += ".00";
            }
        }

        // send updated string to input
        input.val(input_val);

        // put caret back in the right position
        var updated_len = input_val.length;
        caret_pos = updated_len - original_len + caret_pos;
        input[0].setSelectionRange(caret_pos, caret_pos);
    }
</script>
@endsection