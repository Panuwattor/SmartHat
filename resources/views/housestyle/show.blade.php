@extends('master')
@section('description')
<meta property="og:locale" content="th_TH" />
<meta property="og:type" content="article" />
<meta property="og:title" content="แบบ้าน {{$housestyle->codePlan}} เริ่มต้น {{number_format($housestyle->price,2)}} บาท" />
<meta property="og:description" content="จำนวนชั้น {{$housestyle->floor}} ชั้น ขนาดอาคาร {{number_format($housestyle->buildingWide,2)}} X {{number_format($housestyle->buildingLong,2)}} ม. ขนาดที่ดิน {{number_format($housestyle->minimumWide,2)}} X {{number_format($housestyle->minimumLong,2)}} ม. พื้นที่ใช้สอย {{number_format($housestyle->space,2)}} ตร.ม." />
<meta property="og:site_name" content="Tcon House" />
<meta property="og:image" content="{{$housestyle->img ? Storage::disk('spaces')->url($housestyle->img) : ''}}" />
<meta property="og:image:width" content="1336" />
<meta property="og:image:height" content="668" />
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:label1" content="Written by" />
<meta name="twitter:data1" content="wris" />
@endsection
@section('content')

<section id="main-container" class="main-container">
  <div class="container">

    <div class="row">
      <div class="col-lg-8">
        <?php

        use App\ShareModel;

        $_shareModel = new ShareModel;
        $_shareWidget = $_shareModel->ShareWidget('http://tconbuild.test.mytcg.net/housestyle/' . $housestyle->id . '/show');
        ?>

        {!!$_shareWidget!!}

        <div id="page-slider" class="page-slider small-bg">
          <div class="item">
            <img loading="lazy" class="img-fluid" src="{{ Storage::disk('spaces')->url($housestyle->img)}}" alt="project-image" />
          </div>

          <div class="item">
            <img loading="lazy" class="img-fluid" src="{{ Storage::disk('spaces')->url($housestyle->plan)}}" alt="project-image" />
          </div>
        </div><!-- Page slider end -->
        <!-- <div class="sidebar">
          <div class="widget widget-tags">
            <ul class="list-unstyled">
              <li><a href="#">บ้าน 1 ชั้น</a></li>
              <li><a href="#">สไตล์เกาหลี</a></li>
              <li><a href="#">Project</a></li>
              <li><a href="#">Building</a></li>
            </ul>
          </div> 
        </div> -->
      </div><!-- Slider col end -->

      <div class="col-lg-4 mt-5 mt-lg-0">

        <h3 class="column-title mrt-0">รายละเอียด {{$housestyle->codePlan}}</h3>
        <h4 class="text-success">
          เริ่มต้น {{number_format($housestyle->price,2)}} บาท
        </h4>
        <div class="entry-header">
          <div class="post-meta">
            <span class="post-author">
              <i class="fa fa-bed"></i> {{$housestyle->bedroom}}
            </span>
            <span class="post-cat">
              <i class="fa fa-bath"></i> {{$housestyle->toilet}}
            </span>
            <span class="post-comment">
              <i class="fa fa-car"></i> {{$housestyle->car}}</a>
            </span>
          </div>
        </div><!-- header end -->


        <ul class="project-info list-unstyled">
          <li>
            <p class="project-info-label">จำนวนชั้น</p>
            <p class="project-info-content">{{$housestyle->floor}} ชั้น</p>
          </li>
          <li>
            <p class="project-info-label">ขนาดอาคาร</p>
            <p class="project-info-content">{{number_format($housestyle->buildingWide,2)}} X {{number_format($housestyle->buildingLong,2)}} ม.</p>
          </li>
          <li>
            <p class="project-info-label">ขนาดที่ดิน</p>
            <p class="project-info-content">{{number_format($housestyle->minimumWide,2)}} X {{number_format($housestyle->minimumLong,2)}} ม.</p>
          </li>
          <li>
            <p class="project-info-label">พื้นที่ใช้สอย</p>
            <p class="project-info-content">{{number_format($housestyle->space,2)}} ตร.ม.</p>
          </li>
        </ul>
      </div><!-- Content col end -->

    </div><!-- Row end -->

  </div><!-- Conatiner end -->
</section><!-- Main container end -->
<section class="content">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h3 class="column-title text-center">แบบบ้านใกล้เคียง</h3>
        <div id="testimonial-slide" class="testimonial-slide">
          <div class="item">
            <div class="quote-item">
              <div class="row">
                @foreach($homenearbys as $i => $plantotag)
                <div class="col-sm-3">
                  <div class="ts-service-box">
                    <div class="ts-service-image-wrapper">
                      <a href="/housestyle/{{$plantotag->plan_id}}/show"> <img loading="lazy" class="w-100" src="{{ Storage::disk('spaces')->url($plantotag->toplan->img)}}" alt="service-image"></a>
                    </div>
                  </div><!-- Service2 end -->
                </div><!-- Col 2 end -->
                @endforeach

              </div><!-- Content row end -->
            </div><!-- Quote item end -->
          </div>
          <!--/ Item 1 end -->
        </div>
        <!--/ Testimonial carousel end-->
      </div><!-- Col end -->
    </div>
    <!--/ Content row end -->
  </div>
  <!--/ Container end -->
</section><!-- Content end -->

@endsection