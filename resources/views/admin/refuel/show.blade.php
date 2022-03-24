@extends('master')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Oil Billing</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item"><a href="/admin/refuels">refuels</a></li>
          <li class="breadcrumb-item active">billing</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <button style="float: right; width: fit-content;" type="button" class="btn btn-block btn-outline-info" onClick="PrintDiv()">Print</button>
  <div class="row">
    <div class="col-12">
       @include('admin.refuel.page')
    </div>
  </div>
</section>
@endsection

@section('header')
<style>
  body {
    background: rgb(204, 204, 204);
  }

  .font-head {
    font-size: 18pt;
  }

  .font-content {
    font-size: 16pt;
  }

  @media print {

    body,
    page {
      margin: 0;
      box-shadow: 0;
    }

    .i-no-print{
      display: none!important;
    }
  }

  page {
    padding: 20px;
    background: white;
    display: block;
    margin: 0 auto;
    margin-bottom: 0.5cm;
    box-shadow: 0 0 0.5cm rgba(0, 0, 0, 0.5);
  }

  page[size="A4"] {
    width: 80%;
  }

  page[size="A4"][layout="landscape"] {
    width: 29.7cm;
    height: 21cm;
  }

  page[size="A3"] {
    width: 29.7cm;
    height: 42cm;
  }

  page[size="A3"][layout="landscape"] {
    width: 42cm;
    height: 29.7cm;
  }

  page[size="A5"] {
    width: 14.8cm;
    height: 21cm;
  }

  page[size="A5"][layout="landscape"] {
    width: 21cm;
    height: 14.8cm;
  }
</style>
@endsection

@section('footer')
<script>
  function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
  }

  async function PrintDiv() {
    var printContents = document.getElementById('billing').innerHTML;
    var originalContents = document.body.innerHTML;
    document.body.innerHTML = printContents;
    await sleep(1000);
    window.print();
    document.body.innerHTML = originalContents;
  }
</script>
@endsection