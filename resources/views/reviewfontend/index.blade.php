@extends('master')
@section('description')
<title>รีวิวผลงาน</title>
<meta name="description" content="TCON BUILD เราคือบริษัทรับสร้างบ้าน รับออกแบบบ้าน และตกแต่งภายใน ในเขตภาคอีสาน โดยทีมสถาปนิกและวิศวกรประสบการณ์สูง">
@endsection

@section('content')
<div id="banner-area" class="banner-area" style="background-image:url(/images/banner/banner1.jpg)">
  <div class="banner-text">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="banner-heading">
            <h1 class="banner-title">รีวิวผลงาน</h1>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item">Review</li>
              </ol>
            </nav>
          </div>
        </div><!-- Col end -->
      </div><!-- Row end -->
    </div><!-- Container end -->
  </div><!-- Banner text end -->
</div><!-- Banner area end -->

<section id="main-container">
  <div class="container">
    <div class="row">
      @foreach($reviews as $i=>$review)
      <div class="col-lg-4 col-md-6 mb-4">
        <div class="latest-post">
          <div class="latest-post-media">
            <iframe width="auto" height="250px;" src="{{$review->link}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
          <div class="post-body">
            <h4 class="post-title">
            <a href="/review/{{$review->id}}/show" class="latest-post-img">
              {{$review->name}}
            </a>
            </h4>
            {{$review->note}}
          </div>
        </div><!-- Latest post end -->
      </div><!-- 1st post col end -->
    
    @endforeach
  </div>
  {{$reviews->links()}}
  </div><!-- Conatiner end -->

</section><!-- Main container end -->

@endsection