@extends('backend.master')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Edit font size</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin/index">Home</a></li>
                    <li class="breadcrumb-item active">Edit font size</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card" style="border-radius: 0px;  ">
                <div class="card-header">
                    <b><h3 class="card-title">Edit font size</h3></b>
                    <div class="card-tools">
                    </div>
                </div>
                <form action="/admin/Bannerandfont/updatetextup/{{$slidefont->id}}" method="post" enctype="multipart/form-data" onsubmit="return confirm('ยืนยันเพิ่มผลงานของเรา ?')">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Type</label>
                            <select name="type" class="form-control" required>
                                <option value="">select</option>
                                <option value="text_small" @if($slidefont->type == "text_small") selected @endif>text_small</option>
                                <option value="text_normal" @if($slidefont->type == "text_normal") selected @endif>text_normal</option>
                                <option value="text_large" @if($slidefont->type == "text_large") selected @endif>text_large</option>
                                <option value="button" @if($slidefont->type == "button") selected @endif>button</option>
                                <option value="button_outline" @if($slidefont->type == "button_outline") selected @endif>button_outline</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">note<code>*</code></label>
                            <input type="text" class="form-control" name="note" required value="{{$slidefont->note}}"><br>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">link<code>*</code></label>
                            <input type="text" class="form-control" name="link" value="{{$slidefont->link}}"><br>

                            <button class="btn btn-success pull-right" type="submit">บันทึก</button>
                        </div>
                </form>


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