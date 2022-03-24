@extends('backend.master')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">รายละเอียดข้อมูล</h1>
                <br>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin/index">Home</a></li>
                    <div>
                        <br>
                        <li class="breadcrumb-item active">ประวัติส่วนตัวของ</li>
                        <span>{{$joinus-> fritName}} </span>
                        <span>{{$joinus->lastName}} </span>
                    </div>
                </ol>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-4 col-12"></div>
    <div class="col-md-4 col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fa fa-list" aria-hidden="true"></i> รายละเอียดข้อมูล
                </h3>
                <div class="card-body">

                    <div>
                        <label> position:</label>
                        <span> {{$joinus->position}} </span>
                        &nbsp;
                        <label> เงินเดือนที่ต้องการ:</label>
                        <span>{{$joinus-> salaryDesired}} บาท</span>

                    </div>
                    <div>
                        <label>ชื่อ:</label>
                        <span>{{$joinus-> fritName}} </span>
                        &nbsp;
                        <label>นามสกุล:</label>
                        <span>{{$joinus->lastName}} </span>
                    </div>
                    <div>
                        <label> ชื่อเล่น:</label>
                        <span>{{$joinus-> nickName}} </span>
                        &nbsp;
                        <label> เลขประจำตัวประชาชน:</label>
                        <span>{{$joinus-> idCard}} </span>
                    </div>
                    <div>
                        <label> เบอร์โทรติดต่อ:</label>
                        <span>{{$joinus-> tel}} </span>
                    </div>
                    <div>
                        <label>อีเมล:</label>
                        <span>{{$joinus-> email}} </span>
                    </div>
                    <div>
                        <label>บ้านเลขที่ :</label>
                        <span>{{$joinus-> homeAddress}}</span>
                        &nbsp;
                        <label>หมู่ที่ :</label>
                        <span>{{$joinus-> mu}} </span>
                    </div>
                    <div>
                        <label>ถนน:</label>
                        <span>{{$joinus-> road}} </span>
                        &nbsp;
                        <label>ตำบล/แขวง:</label>
                        <span>{{$joinus-> tumbon}} </span>
                    </div>
                    <div>
                        <label> อำเภอ:</label>
                        <span>{{$joinus-> district}} </span>
                        &nbsp;
                        <label>จังหวัด:</label>
                        <span>{{$joinus-> provice}} </span>
                    </div>
                    <div>
                        <label>รหัสไปรษณีย์:</label>
                        <span>{{$joinus-> zipCode}} </span>
                        &nbsp;
                        <label> วันเดือนปีเกิด:</label>
                        <span> {{$joinus-> birth}} </span>
                    </div>
                    <div>
                        <label>อายุ:</label>
                        <span> {{$joinus-> age}} </span>
                        &nbsp;
                        <label> เชื้อชาติ:</label>
                        <span> {{$joinus-> race}} </span>
                    </div>
                    <div>
                        <label> สัญชาติ:</label>
                        <span> {{$joinus-> nationality}} </span>
                        &nbsp;
                        <label>ศาสนา:</label>
                        <span> {{$joinus-> religion}} </span>
                    </div>
                    <div>
                        <label>ส่วนสูง:</label>
                        <span> {{$joinus-> height}} </span>
                        &nbsp;
                        <label>น้ำหนัก:</label>
                        <span> {{$joinus-> weight}} </span>
                    </div>
                    <div>
                        <label>เพศ :</label>
                        <span> {{$joinus-> sex}} </span>
                        &nbsp;
                        <label>สถานะ:</label>
                        <span> {{$joinus-> status}} </span>
                    </div>
                    <div>
                        <label>ผลงาน</label>
                        <br>
                        <img src="{{ Storage::disk('spaces')->url($joinus->photo)}}" alt="" width="300px" height="200px">

                        <!-- <img src="" alt="" width="100%" height="100%"> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('header')
<!-- Select2 -->
<link rel="stylesheet" href="https://taweechai-bucket.s3-ap-southeast-1.amazonaws.com/upvc/admin/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="https://taweechai-bucket.s3-ap-southeast-1.amazonaws.com/upvc/admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">



<!-- DataTables -->
<link rel="stylesheet" href="https://taweechai-bucket.s3-ap-southeast-1.amazonaws.com/upvc/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://taweechai-bucket.s3-ap-southeast-1.amazonaws.com/upvc/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
@endsection

@section('footer')
<!-- Select2 -->
<script src="https://taweechai-bucket.s3-ap-southeast-1.amazonaws.com/upvc/admin/plugins/select2/js/select2.full.min.js"></script>
<!-- DataTables -->
<script src="https://taweechai-bucket.s3-ap-southeast-1.amazonaws.com/upvc/admin/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="https://taweechai-bucket.s3-ap-southeast-1.amazonaws.com/upvc/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="https://taweechai-bucket.s3-ap-southeast-1.amazonaws.com/upvc/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="https://taweechai-bucket.s3-ap-southeast-1.amazonaws.com/upvc/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script>
    $(function() {
        //Initialize Select2 Elements
        $('.select2').select2({
            width: '100%'
        })

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })
    })

    $(function() {
        $("#example1").DataTable({
            "responsive": false,
            "autoWidth": false,
        });
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.js"></script>
<script>
    var app = new Vue({
        el: '#app',
        data: {
            files: new Array(),
        },
        created() {
            this.files.push({
                file: ''
            })

            console.log(this.files)
        },
        methods: {
            addFile: function() {
                this.files.push({
                    file: ''
                })
            },
            removeFile(index) {
                this.files.splice(index, 1);
            }
        }
    })
</script>


@endsection