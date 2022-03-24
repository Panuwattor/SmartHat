@extends('backend.master')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">เพิ่มผลงานของเรา</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="/po">รายการขอซื้อ</a></li>
                    <li class="breadcrumb-item active">เพิ่มผลงานของเรา</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<form id="app" v-cloak action="/admin/ourwork/store" method="post" enctype="multipart/form-data" onsubmit="return confirm('ยืนยันเพิ่มผลงานของเรา ?')">
    @csrf
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Note <code>*</code></label>
                        <textarea class="form-control" name="note" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap text-center">
                        <thead>
                            <tr>
                                <th>ลำดับ</th>
                                <th>ภาพ</th>
                                <th>
                                    <span class="text-info" style="cursor: pointer;" @click="add()"><i class="fa fa-plus"></i> เพิ่มแถว</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(item, index) in arr">
                                <td>@{{index + 1}}</td>
                                <td>
                                    <input required type="file" name="files[]" class="form-control form-control-sm" autocomplete="0ff" placeholder="รายการ">
                                </td>
                                <td>
                                    <span @click="remove(index)" style="cursor: pointer;" v-if="arr.length > 1" class="text-danger"><i class="fa fa-trash-o"></i> ลบ</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
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
@endsection