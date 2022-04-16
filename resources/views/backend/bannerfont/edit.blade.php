@extends('backend.master')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Edit text</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin/index">Home</a></li>
                    <li class="breadcrumb-item active">Edit text</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card" style="border-radius: 0px;  ">
                <div class="card-header">
                    <h3 class="card-title">Edit text</h3>
                    <div class="card-tools">
                        <a href="/admin/bannerforn/create" class="btn   btn-sm btn-outline-info ิ"><i class="fa fa-plus" aria-hidden="true"></i> เพิ่มผลงาน</a>
                    </div>
                </div>


                <form id="app" v-cloak saction="/admin/Bannerandfont/edit/{{$slide->id}}" method="post" enctype="multipart/form-data" onsubmit="return confirm('ยืนยันเพิ่มผลงานของเรา?')">
                    @csrf
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Number for edit<code>*</code></label>
                                        <input type="number" class="form-control" name="number" required value="{{$slide->number}}">
                                    </div>
                                    <div class="form-group">
                                        <th>
                                            <label for="exampleFormControlTextarea1"><code>รูปภาพที่ต้องการเปลี่ยน</code></label>
                                            <input type="file" name="photo">
                                        </th>
                                    </div><br>

                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">font style for edit<code>*</code></label>
                                        <select name="font_style" class="form-control" required>

                                            <option value="left" @if($slide->font_style == 'left') selected @endif>left</option>
                                            <option value="center" @if($slide->font_style == 'center') selected @endif>center</option>
                                            <option value="right" @if($slide->font_style == 'right') selected @endif>right</option>

                                        </select>
                                    </div>
                                    <br>

                                    <button class="btn btn-success pull-right" type="submit">บันทึก</button>

                                </div>
                            </div>
                            <div class="card-body">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>type</th>storeFont
                                            <th>note</th>
                                            <th>link</th>
                                            <th>แก้ไข</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($slide->fonts as $font)

                                        <tr>
                                            <td>{{$font->id}}</td>
                                            <td>{{$font->type}}</td>
                                            <td>{{$font->note}}</td>
                                            <td>{{$font->link}}</td>

                                            <td><a href="/admin/Bannerandfont/updatetext/{{$font->id}} " class="link-warning">เเก้ไข</a></td>
                                           

                                        </tr>
                                    </tbody>

                                    @endforeach


                            </div>
                        </div>
                    </div>
                    <div class="col-md-3"></div>


                </form>

                @endsection
                @section('header')

                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker3.standalone.min.css">

                <link rel="stylesheet" href="https://taweechai-bucket.s3-ap-southeast-1.amazonaws.com/upvc/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
                <link rel="stylesheet" href="https://taweechai-bucket.s3-ap-southeast-1.amazonaws.com/upvc/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
                @endsection

                @section('footer')

                <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha256-bqVeqGdJ7h/lYPq6xrPv/YGzMEb6dNxlfiTUHSgRCp8=" crossorigin="anonymous"></script>

                <script>
                    $('#from').datepicker({
                        autoclose: true,
                        format: "yyyy-mm-dd",
                    })
                    $('#to').datepicker({
                        autoclose: true,
                        format: "yyyy-mm-dd",
                    })
                </script>

                <script src="https://taweechai-bucket.s3-ap-southeast-1.amazonaws.com/upvc/admin/plugins/datatables/jquery.dataTables.min.js"></script>
                <script src="https://taweechai-bucket.s3-ap-southeast-1.amazonaws.com/upvc/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
                <script src="https://taweechai-bucket.s3-ap-southeast-1.amazonaws.com/upvc/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
                <script src="https://taweechai-bucket.s3-ap-southeast-1.amazonaws.com/upvc/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
                <script>
                    $(function() {
                        $('#example1').DataTable({
                            "paging": false,
                            "lengthChange": false,
                            "searching": false,
                            "ordering": false,
                            "info": false,
                            "autoWidth": false,
                            "responsive": true,
                        });
                    });
                </script>
                @endsection
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>