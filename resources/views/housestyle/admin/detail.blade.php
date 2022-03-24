@extends('backend.master')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">รายละเอียดแบบบ้าน</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active"><a href="/admin/housestyles">แบบบ้าน</a></li>
                    <li class="breadcrumb-item active">รายละเอียดแบบบ้าน</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fa fa-list" aria-hidden="true"></i> รายละเอียดแบบบ้าน
        </h3>
        <div class="card-tools">
            <button type="button" class="btn btn-outline-warning " data-toggle="modal" data-target=".bd-example-modal-lg">แก้ไข</button>
            <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">แก้ไข</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="/admin/housestyle/{{$housestyle->id}}/update" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="">รหัสแบบบ้าน <code>*</code></label>
                                    <input type="text" name="codePlan" value="{{$housestyle->codePlan}}" class="form-control form-control-sm" autocomplete="off" required>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <label for="">พื้นที่ใช้สอย <code>*</code></label>
                                        <input type="text" name="space" value="{{$housestyle->space}}" class="form-control form-control-sm" autocomplete="off" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">จำนวนชั้น <code>*</code></label>
                                        <input type="text" name="floor" value="{{$housestyle->floor}}" class="form-control form-control-sm" autocomplete="off" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">ห้องนอน <code>*</code></label>
                                        <input type="text" name="bedroom" value="{{$housestyle->bedroom}}" class="form-control form-control-sm" autocomplete="off" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="">ห้องน้ำ <code>*</code></label>
                                        <input type="text" name="toilet" value="{{$housestyle->toilet}}" class="form-control form-control-sm" autocomplete="off" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">ที่จอดรถ <code>*</code></label>
                                        <input type="text" name="car" value="{{$housestyle->car}}" class="form-control form-control-sm" autocomplete="off" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="">ขนาดอาคารขั้นต่ำจาก <code>*</code></label>
                                        <input type="text" name="buildingWide" value="{{$housestyle->buildingWide}}" class="form-control form-control-sm" autocomplete="off" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">ขนาดอาคารขั้นต่ำถึง <code>*</code></label>
                                        <input type="text" name="buildingLong" value="{{$housestyle->buildingLong}}" class="form-control form-control-sm" autocomplete="off" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="">ขนาดที่ดินขั้นต่ำจาก <code>*</code></label>
                                        <input type="text" name="minimumWide" value="{{$housestyle->minimumWide}}" class="form-control form-control-sm" autocomplete="off" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">ขนาดที่ดินขั้นต่ำถึง <code>*</code></label>
                                        <input type="text" name="minimumLong" value="{{$housestyle->minimumLong}}" class="form-control form-control-sm" autocomplete="off" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">ราคาเริ่มต้น <code>*</code></label>
                                    <input type="text" name="price" value="{{$housestyle->price}}" class="form-control form-control-sm" autocomplete="off" required>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="">ภาพตัวอย่างบ้าน <code>*</code></label>
                                            <input type="file" name="img" class="form-control form-control-sm" autocomplete="off">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="">ภาพแบบบ้าน <code>*</code></label>
                                            <input type="file" name="plan"  class="form-control form-control-sm" autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">สถานะ <code>*</code></label>
                                    <select type="text" name="status" class="form-control form-control-sm">
                                        <option value="0" @if($housestyle->status == 0) selected @endif>ยกเลิก</option>
                                        <option value="1" @if($housestyle->status == 1) selected @endif>ใช้งาน</option>
                                    </select>
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
                        <div class="col-md-6 col-12">
                            <div>
                                <label for="">codePlan :</label>
                                <span> {{$housestyle->codePlan}} </span>
                            </div>

                            <div>
                                <label for="">พื้นที่ใช้สอย :</label>
                                <span> {{$housestyle->space}} ตร.ม. </span>
                            </div>
                            <div>
                                <label for="">ห้องนอน :</label>
                                <span> {{$housestyle->bedroom}} </span>
                            </div>
                            <div>
                                <label for="">ห้องน้ำ :</label>
                                <span> {{$housestyle->toilet}} </span>
                            </div>
                            <div>
                                <label for="">โรงจอดรถ :</label>
                                <span> {{$housestyle->car}} </span>
                            </div>
                            <div>
                                <label for="">ขนาดอาคาร :</label>
                                <span> {{$housestyle->buildingWide}} X {{$housestyle->buildingLong}} ม.</span>
                            </div>
                            <div>
                                <label for="">ขนาดที่ดิน:</label>
                                <span> {{$housestyle->minimumWide}} X {{$housestyle->minimumLong}} ม.</span>
                            </div>
                            <div>
                                <label for="">ราคา :</label>
                                <span> {{number_format($housestyle->price,2)}} </span>
                            </div>
                            <div>
                                <label for="">HomeImage:</label>
                                <img src="{{ Storage::disk('spaces')->url($housestyle->img)}}" alt="" width="300px" height="200px">

                            </div>
                            <div>
                                <label for="">Plan Image :&nbsp; </label>
                                <img src="{{ Storage::disk('spaces')->url($housestyle->plan)}}" alt="" width="300px" height="200 px">
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="#exampleModalCenterddd">
                                            <i class="fa fa-tag" aria-hidden="true"></i> เพิ่มแท็ก</i>
                                        </button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModalCenterddd" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">เพิ่มแท็ก </h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="/admin/tag/{{$housestyle->id}}/update" method="post" enctype="multipart/form-data" onsubmit="confirm('คุณต้องการบันทึกภาพ ?')">
                                                        @csrf
                                                        <div class="modal-body">
                                                            <div class="row my-2" id="app">
                                                                <div class="col-md-12">
                                                                    <label for="file">เพิ่มแท็ก (ถ้ามากกว่า 1 ภาพให้กดเพิ่มแถว)</label>
                                                                    <div v-for="(file, file_index) in files">
                                                                        <span style="float: right;" v-if="(file_index + 1) == files.length && files.length > 1" @click="removeFile(file_index)">ลบแถว</span>
                                                                        <select name="tag[]" id="" class="form-control form-control-sm">
                                                                            @foreach($tags as $tag)
                                                                            <option value="{{$tag->id}}">{{$tag->name}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <hr>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <button type="button" class="btn-sm btn-success btn-block" @click="addFile">
                                                                        <i class="fa fa-plus"> เพิ่มแถวเพื่อเพิ่มแท็ก</i>
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
                                <div class="card-body">
                                    <table class="table table-bordered table-sm">
                                        <thead>
                                            <tr class="text-center">
                                                <td>No.</td>
                                                <td>Tag</td>
                                                <td>Action</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($housestyle->totag as $i => $tag)
                                            <tr class="text-center">
                                                <td>{{$i+1}}</td>
                                                <td>{{$tag->tag->name}}</td>
                                                <td>
                                                    <form action="/admin/housestyle/{{$tag->id}}/tag/delete" method="post">
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger btn-sm"> <i class="fa fa-tag" aria-hidden="true"></i> ลบแท็ก</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
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