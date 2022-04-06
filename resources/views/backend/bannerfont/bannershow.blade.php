@extends('backend.master')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Banner show page web</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin/index">Home</a></li>
                    <li class="breadcrumb-item active">Banner show page web</li>
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
                    <h3 class="card-title">Banner show page web</h3>
                    <div class="card-tools">
                       <a href="/admin/bannerforn/create" class="btn   btn-sm btn-outline-info ิ"><i class="fa fa-plus" aria-hidden="true"></i> เพิ่มผลงาน</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 col-12">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped table-sm">
                                    <thead>

                                        <tr class="text-center bg-gray">
                                            <th>NO</th>
                                            <th>Numer</th>
                                            <th>Photo</th>
                                            <th>FontStyle</th>
                                            <th>Status</th>
                                            <th class="text-left">ข้อความ</th>
                                            <th>Action</th>
                                            <th>Edit</th>
                                        </tr>

                                    </thead>
                                    <tbody>
                                        
                                        @foreach($slides as $i => $slide)
                                       <tr class="text-center">
                                           <td>{{$i+1}}</td>
                                           <td>{{$slide->number}}</td>
                                           <td>
                                               <a href="{{ Storage::disk('spaces')->url($slide->photo) }}" target="_bank"><i class="fa fa-photo"></i></a>
                                           </td>
                                           <td>{{$slide->font_style}}</td>
                                           <td>{{$slide->status}}</td>
                                          
                                           <td class="text-left">
                                               @foreach($slide->fonts as $font)
                                               <br><span>- {{$font->note}} ({{$font->type}})</span>
                                               @endforeach
                                           </td>
                                           <td><a href="/add/slide/font/{{$slide->id}}">เพิ่มข้อความ</a></td>
                                           <td><a href="/admin/Bannerandfont/edit/{{$slide->id}}" class="link-warning">เเก้ไข</a></td>
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
</section>
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