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
                        <form action="/admin/ourwork/{{$ourwork->id}}/update" method="post">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">สถานะ:</label>
                                    <select name="status" id="" class="form-control form-control">
                                        <option value="0" @if($ourwork->status == 0) selected @endif>ยกเลิก</option>
                                        <option value="1" @if($ourwork->status == 1) selected @endif>ใช้งาน</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">โน๊ต:</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="note">{{$ourwork->note}}</textarea>
                                      
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save</button>
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
                        <div class="col-md-12 col-12">
                            <div>
                                <label for="">รายการที่</label>
                                <span> {{$ourwork->id}}</a></span>
                            </div>
                            <div>
                                <label for="">โน๊ต</label>
                                <span> {{$ourwork->note}}</span>
                            </div>
                            <div>
                                <label for="">วันที่สร้าง</label>
                                <span> {{$ourwork->date}}</span>
                            </div>
                            <div>
                                <label for="">ผู้สร้าง</label>
                                <span>{{$ourwork->name}} </span>
                            </div>
                            <div>
                                <label for="">สถานะ</label>
                                <span>{!!$ourwork->State!!} </span>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <div class="card-tools">
                    <div class="card-tools">

                        <button type="button" class="btn btn-primary btn-sm " data-toggle="modal" data-target="#exampleModalCenter">
                            <i class="fa fa-upload" aria-hidden="true"> อัพโหลดภาพ</i>
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">อัพโหลดภาพใบขอคืนเลขที่ </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="/admin/ourwork/{{$ourwork->id}}/add/file" method="post" enctype="multipart/form-data" onsubmit="confirm('คุณต้องการบันทึกภาพ ?')">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="row my-2" id="app">
                                                <div class="col-md-12">
                                                    <label for="file">เลิอกไฟล์ภาพ (ถ้ามากกว่า 1 ภาพให้กดเพิ่มแถว)</label>
                                                    <div v-for="(file, file_index) in files">
                                                        <span style="float: right;" v-if="(file_index + 1) == files.length && files.length > 1" @click="removeFile(file_index)">ลบแถว</span>
                                                        <input type="file" class="form-control" name="files[]" required>
                                                    </div>
                                                    <hr>
                                                </div>
                                                <div class="col-md-12">
                                                    <button type="button" class="btn-sm btn-success btn-block" @click="addFile">
                                                        <i class="fa fa-plus"> เพิ่มแถวเพื่ออัพโหลดภาพเพิ่ม</i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                                            <button type="submit" class="btn btn-primary">บันทึกภาพ</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row text-center">
                    @foreach($ourwork->files as $i => $file)
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-12">
                                <span class="badge"> @if($file->type == 1) ภาพปก @endif</span>
                            </div>
                            <div class="col-md-12">
                                <img style="width: 400px; height: 257px;" src="{{ Storage::disk('spaces')->url($file->file)}}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <form action="/admin/ourwork/{{$file->id}}/file/delete" method="post" class="mt-2" onsubmit="confirm('คุณต้องการลบภาพ ?')">
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm"> <i class="fas fa-trash-alt"></i> ลบ</button>
                                </form>
                            </div>
                            <div class="col-md-6">
                                <form action="/admin/ourwork/{{$file->id}}/set/coverpage" method="post" class="mt-2" onsubmit="confirm('คุณต้องการตั้งค่าหน้าปก ?')">
                                    @csrf
                                    <button type="submit" class="btn btn-info btn-sm">ตั้งเป็นภาพหน้าปก</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach
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