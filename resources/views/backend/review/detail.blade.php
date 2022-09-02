@extends('backend.master')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">รายละเอียดผลงาน</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">รายละเอียดผลงาน</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fa fa-list" aria-hidden="true"></i> รายละเอียดผลงาน
        </h3>
        <div class="card-tools">
            <button type="button" class="btn btn-sm btn-outline-warning" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"><i class="fas fa-edit"></i> แก้ไขรายละเอียด</button>
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">แก้ไข</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="/admin/review/{{$review->id}}/update" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">สถานะ:</label>
                                        <select name="status" id="" class="form-control form-control">
                                            <option value="0" @if($review->status == 0) selected @endif>ยกเลิก</option>
                                            <option value="1" @if($review->status == 1) selected @endif>ใช้งาน</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Name:</label>
                                        <input class="form-control form-control-sm" name="name" type="text" id="exampleFormControlTextarea1" value="{{ $review->name }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea2">Note: </label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="note"> {{$review->note}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea3">URL:</label>
                                        <input class="form-control form-control-sm" type="text" name="link" placeholder="" value=" {{ $review->link }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea4">image:</label>
                                        <input class="form-control" type="file" name="image">
                                    </div>
                                    <div class="col-md-12 text-right">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="card">
            <div class="card-header">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div>
                                <label for="">ชื่อ:</label>
                                <span>{{$review->name}}</span>
                            </div>
                            <div>
                                <label for="">โน๊ต:</label>
                                <span>{{$review->note}}</span>
                            </div>
                            <div>
                                <label for="">URL:</label>
                                <span>{{$review->link}}</span>
                            </div>
                            <div>
                                <label for="">วันที่สร้าง:</label>
                                <span>{{$review->date}}</span>
                            </div>
                            <div>
                                <label for="">ผู้สร้าง</label>
                                <span>{{$review->user->name}}</span>
                            </div>
                            <div>
                                <label for="">สถานะ:</label>
                                <span>{!!$review->State!!}</span>
                            </div>
                        </div>@if($review->image)
                        <div class="col-6">
                            <label for="">ภาพ:</label><br>
                            <img style="width: 400px; height: 257px;" src="{{ Storage::disk('spaces')->url($review->image)}}">
                        </div>
                        @endif
                    </div>
                </div>
                <form action="/admin/review/delete/{{$review->id}}" method="post">
                @csrf
                <div class="col-md-12 text-right">
                    <button type="submit" class="btn btn-danger btn-sm"> <i class="fas fa-trash-alt"></i> ลบ</button>
                </div>
            </form>
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