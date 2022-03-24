@extends('backend.master')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">รวมงานกับเรา</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin/index">Home</a></li>
                    <li class="breadcrumb-item active">รวมงานกับเรา</li>
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
                    <h3 class="card-title">รวมงานกับเรา</h3>
                    <div class="card-tools">
                        <a href="/join_us" class="btn   btn-sm btn-outline-info ิ"><i class="fa fa-plus" aria-hidden="true"></i> เพิ่มผู้ร่วมงาน</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 col-12">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped table-sm">
                                    <thead>
                                        <tr class="text-center">
                                            <th>id</th>
                                            <th>position</th>
                                            <th>salaryDesired</th>
                                            <th>fritName</th>
                                            <th>lastName</th>
                                            <th>Status</th>
                                            <th>Action</th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($joinuses as $i=> $joinus)
                                        <tr class="text-center">
                                            <td>{{$i+1}}</td>
                                            <td>{{$joinus-> position}}</td>
                                            <td>{{$joinus-> salaryDesired}}</td>
                                            <td><a href="/show_user/detail/{{$joinus->id}}">{{$joinus->fritName}} </a></td>
                                            <td><a href="/show_user/detail/{{$joinus->id}}">{{$joinus->lastName}} </a></td>
                                            <td>{!! $joinus-> State!!}</td>
                                            <td>
                                                @if($joinus->accept_status == 0)
                                                <form role="form" method="post" id="form{{$i}}" action="/joinuscl/accept/{{$joinus->id}}">
                                                    {{ csrf_field() }}
                                                    <div class="d-grid gap-3 col-6 mx-auto">
                                                        <button type="submit" class="btn btn-info btn-sm ">รับทราบ</button>
                                                    </div>
                                                </form>
                                                @endif
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