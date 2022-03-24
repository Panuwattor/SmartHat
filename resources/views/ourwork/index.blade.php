@extends('master')
@section('description')
  <title>TCON BUILD ผลงานของเรา</title>
  <meta name="description" content="TCON BUILD เราคือบริษัทรับสร้างบ้าน รับออกแบบบ้าน และตกแต่งภายใน ในเขตภาคอีสาน โดยทีมสถาปนิกและวิศวกรประสบการณ์สูง">
@endsection

@section('content')
<div id="banner-area" class="banner-area" style="background-image:url(/images/banner/banner2.jpg)">
  <div class="banner-text">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="banner-heading">
            <h1 class="banner-title">ผลงานของเรา</h1>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item">Our Works</li>
              </ol>
            </nav>
          </div>
        </div><!-- Col end -->
      </div><!-- Row end -->
    </div><!-- Container end -->
  </div><!-- Banner text end -->
</div><!-- Banner area end -->

<section id="main-container" class="main-container pb-2">
  <div class="container">

    <div class="row">
      @foreach($ourworks as $i=>$ourwork)
      <div class="col-lg-4 col-md-6 mb-4">
        <div class="latest-post">
          <div class="latest-post-media">
            <a href="/ourwork/{{$ourwork->id}}/show" class="latest-post-img">
              <img loading="lazy" class="img-fluid" src="{{ Storage::disk('spaces')->url($ourwork->files->where('type', 1)->first()  ? $ourwork->files->where('type', 1)->first()->file : $ourwork->files->first()->file)}}" alt="img">
            </a>
          </div>
          <div class="post-body">
            <h4 class="post-title">
              <a href="/ourwork/{{$ourwork->id}}/show" class="d-inline-block">{{$ourwork->note}}</a>
            </h4>
            <div class="latest-post-meta">
              <span class="post-item-date">
                <i class="fa fa-clock-o"></i> {{$ourwork->date}}
              </span>
            </div>
          </div>
        </div><!-- Latest post end -->
      </div><!-- 1st post col end -->
      @endforeach
     
    </div>
    {{$ourworks->links()}}
  </div><!-- Conatiner end -->

</section><!-- Main container end -->

@endsection