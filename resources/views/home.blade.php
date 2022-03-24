@extends('master')

@section('content')
<div class="banner-carousel banner-carousel-1 mb-0">
    <div class="banner-carousel-item" style="background-image:url(/images/slider-main/bg1.jpg)">
        <div class="slider-content">
            <div class="container h-100">
                <div class="row align-items-center h-100">
                    <div class="col-md-12 text-center">
                        <h2 class="slide-title" data-animation-in="slideInLeft">17 Years of excellence in</h2>
                        <h3 class="slide-sub-title" data-animation-in="slideInRight">Construction Industry</h3>
                        <p data-animation-in="slideInLeft" data-duration-in="1.2">
                            <a href="/housestyles" class="slider btn btn-primary">House Styles</a>
                            <a href="tel:045-691-999" class="slider btn btn-primary border">Contact Now</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="banner-carousel-item" style="background-image:url(/images/slider-main/bg2.jpg)">
        <div class="slider-content text-left">
            <div class="container h-100">
                <div class="row align-items-center h-100">
                    <div class="col-md-12">
                        <h2 class="slide-title-box" data-animation-in="slideInDown">World Class Service</h2>
                        <h3 class="slide-title" data-animation-in="fadeIn">When Service Matters</h3>
                        <h3 class="slide-sub-title" data-animation-in="slideInLeft">Your Choice is Simple</h3>
                        <p data-animation-in="slideInRight">
                            <a href="/housestyles" class="slider btn btn-primary border">House Styles</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="banner-carousel-item" style="background-image:url(/images/slider-main/bg3.jpg)">
        <div class="slider-content text-right">
            <div class="container h-100">
                <div class="row align-items-center h-100">
                    <div class="col-md-12">
                        <h2 class="slide-title" data-animation-in="slideInDown"> Meet Our Engineers</h2>
                        <h3 class="slide-sub-title" data-animation-in="fadeIn">We believe sustainability</h3>
                        <p class="slider-description lead" data-animation-in="slideInRight">We will deal with your failure that determines how you achieve success.</p>
                        <div data-animation-in="slideInLeft">
                            <a href="#" class="slider btn btn-primary" aria-label="contact-with-us">Get Free Quote</a>
                            <a href="/construction" class="slider btn btn-primary border" aria-label="learn-more-about-us">Learn more</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="call-to-action-box no-padding">
    <div class="container">
        <div class="action-style-box">
            <div class="row align-items-center">
                <div class="col-md-8 text-center text-md-left">
                    <div class="call-to-action-text">
                        <h3 class="action-title"> จองสิทธิ์ รับส่วนลด มูลค่าสูงสุดกว่า 100,000 บาท ลงทะเบียนได้ตลอด 24 ชั่วโมง</h3>
                    </div>
                </div><!-- Col end -->
                <div class="col-md-4 text-center text-md-right mt-3 mt-md-0">
                    <div class="call-to-action-btn">
                        <a class="btn btn-dark" href="#">ลงทะเบียน</a>
                    </div>
                </div><!-- col end -->
            </div><!-- row end -->
        </div><!-- Action style box -->
    </div><!-- Container end -->
</section><!-- Action end -->

<section id="news" class="news">
    <div class="container">
        <div class="row text-center">
            <div class="col-12">
                <h2 class="section-title">ผลงานของเรา</h2>
                <h3 class="section-sub-title">โครงการ ล่าสุด</h3>
            </div>
        </div>
        <!--/ Title row end -->

        <div class="row">
            @foreach($ourworks as $i => $ourwork)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="latest-post">
                    <div class="latest-post-media">
                        <a href="/ourwork/{{ $ourwork['id'] }}/show" class="latest-post-img">
                            <img loading="lazy" class="img-fluid" src="{{ Storage::disk('spaces')->url($ourwork['file'])}}" alt="img">
                        </a>
                    </div>
                    <div class="post-body">
                        <h4 class="post-title">
                            <a href="/ourwork/{{ $ourwork['id'] }}/show" class="d-inline-block">{{$ourwork['note']}}</a>
                        </h4>
                        <div class="latest-post-meta">
                            <span class="post-item-date">
                                <i class="fa fa-clock-o"></i> {{$ourwork['date']}}
                            </span>
                        </div>
                    </div>
                </div><!-- Latest post end -->
            </div><!-- 1st post col end -->
            @endforeach
        </div>
        <!--/ Content row end -->

        <div class="general-btn text-center mt-4">
            <a class="btn btn-primary" href="/ourworks">ดู ผลงาน ทั้งหมด</a>
        </div>

    </div>
    <!--/ Container end -->
</section>


<section class="subscribe no-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="subscribe-call-to-acton">
                    <h3>Can We Help?</h3>
                    <h4><a href="tel:045-691-999">045-691-999 ต่อ 4</a></h4>
                </div>
            </div><!-- Col end -->

            <div class="col-md-8">
                <div class="ts-newsletter row align-items-center">
                    <div class="col-md-5 newsletter-introtext">
                        <h4 class="text-white mb-0">Newsletter Sign-up</h4>
                        <p class="text-white">Latest updates and news</p>
                    </div>

                    <div class="col-md-7 newsletter-form">
                        <form action="/send/user-email" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="newsletter-email" class="content-hidden">Newsletter Email</label>
                                <input type="email" name="email" id="newsletter-email" class="form-control form-control-lg" placeholder="Your your email and hit enter" autocomplete="off">
                            </div>
                        </form>
                    </div>
                </div><!-- Newsletter end -->
            </div><!-- Col end -->

        </div><!-- Content row end -->
    </div>
    <!--/ Container end -->
</section>
<!--/ subscribe end -->

<section id="project-area" class="project-area solid-bg">
    <div class="container">
        <div class="row text-center">
            <div class="col-lg-12">
                <h2 class="section-title">แบบบ้านของเรา</h2>
                <h3 class="section-sub-title">แบบบ้านใหม่ล่าสุด</h3>
            </div>
        </div>
        <!--/ Title row end -->

        <div class="col-12">
            <div class="shuffle-btn-group">
                <label class="active" for="all">
                    <input type="radio" name="shuffle-filter" id="all" value="all" checked="checked">Show All
                </label>
                @foreach($plan_tos as $i => $tag)
                <label for="{{$tag->tag->name}}">
                    <input type="radio" name="shuffle-filter" id="{{$tag->tag->name}}" value="{{$tag->tag->name}}">{{$tag->tag->name}}
                </label>
                @endforeach
            </div><!-- project filter end -->
            <div class="row shuffle-wrapper">
                <!-- <div class="col-1 shuffle-sizer"></div> -->
                @foreach($plans as $i => $plan)
                <div class="col-lg-4 col-sm-6 shuffle-item" data-groups="[@foreach($plan->totag as $no => $totag) @if($no >= 1) , @endif &quot;{{$totag->tag->name}}&quot; @endforeach]">
                    <div class="project-img-container">
                        <a class="gallery-popup" src="{{ Storage::disk('spaces')->url($plan->img)}}" aria-label="project-img">
                            <img class="img-fluid" src="{{ Storage::disk('spaces')->url($plan->img)}}" alt="project-img">
                        </a>
                        <div class="project-item-info">
                            <div class="project-item-info-content">
                                <h3 class="project-item-title">
                                    <a href="/housestyle/{{$plan->id}}/show">{{$plan->codeOlan}} : {{$plan->floor}} ชั้น : {{$plan->bedroom}} ห้องนอน : {{$plan->toilet}} ห้องน้ำ</a>
                                </h3>
                                <a href="/housestyle/{{$plan->id}}/show">
                                    <p class="project-cat">{{$plan->space}} ตร.ม.</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div><!-- shuffle item 1 end -->
                @endforeach

            </div><!-- shuffle end -->
        </div>

        <div class="row">
            <div class="col-12">
                <div class="general-btn text-center">
                    <a class="btn btn-primary" href="/housestyles">ดู แบบ้านทั้งหมด</a>
                </div>
            </div>

        </div><!-- Content row end -->
    </div>
    <!--/ Container end -->
</section><!-- Project area end -->

<section id="ts-service-area" class="ts-service-area pb-0">
    <div class="container">
        <div class="row text-center">
            <div class="col-12">
                <h2 class="section-title">We Are Specialists In</h2>
                <h3 class="section-sub-title">What We Do</h3>
            </div>
        </div>
        <!--/ Title row end -->

        <div class="row">
            <div class="col-lg-4">
                <div class="ts-service-box d-flex">
                    <div class="ts-service-box-img">
                        <img loading="lazy" src="/images/icon-image/service-icon6.png" alt="service-icon">
                        
                    </div>
                    <div class="ts-service-box-info">
                        <h3 class="service-box-title">ONE STOP SERVICE “มาที่เดียวจบ ครบในเรื่องบ้าน”</h3>
                        <p>ให้บริการครอบคลุมทุกเรื่องบ้าน โดยทีมงานผู้มีประสบการณ์</p>
                    </div>
                </div><!-- Service 1 end -->

                <div class="ts-service-box d-flex">
                    <div class="ts-service-box-img">
                        <img loading="lazy" src="/images/icon-image/service-icon3.png" alt="service-icon">
                       
                    </div>
                    <div class="ts-service-box-info">
                        <h3 class="service-box-title">การออกแบบบ้าน</h3>
                        <p>ออกแบบบ้าน และอาคาร โดยทีมสถาปนิกมืออาชีพ</p>
                    </div>
                </div><!-- Service 2 end -->

                <div class="ts-service-box d-flex">
                    <div class="ts-service-box-img">
                        
                        <img loading="lazy" src="/images/icon-image/service-icon1.png" alt="service-icon">
                    </div>
                    <div class="ts-service-box-info">
                        <h3 class="service-box-title">การสร้างบ้าน</h3>
                        <p>ให้คำปรึกษา และแนะนำ ตลอดจนจบงานก่อสร้าง โดยทีมงานผู้มากประสบการณ์</p>
                    </div>
                </div><!-- Service 3 end -->
                <div class="ts-service-box d-flex">
                    <div class="ts-service-box-img">
                        <img loading="lazy" src="/images/icon-image/service-icon2.png" alt="service-icon">
                    </div>
                    <div class="ts-service-box-info">
                        <h3 class="service-box-title">รับประกันผลงาน</h3>
                        <p>หลังส่งมอบบ้าน มีการรับประกันโครงสร้าง 10 ปี และงานทั่วไป 1 ปี โดยไม่เสียค่าใช้จ่ายใดใดทั้งสิ้น </p>
                    </div>
                </div><!-- Service 3 end -->
            </div><!-- Col end -->

            <div class="col-lg-4 text-center">
                <img loading="lazy" class="img-fluid" src="/images/services/service-center.jpg" alt="service-avater-image">
            </div><!-- Col end -->

            <div class="col-lg-4 mt-5 mt-lg-0 mb-4 mb-lg-0">
                <div class="ts-service-box d-flex">
                    <div class="ts-service-box-img">
                        <img loading="lazy" src="/images/icon-image/service-icon4.png" alt="service-icon">
                    </div>
                    <div class="ts-service-box-info">
                        <h3 class="service-box-title">การขอสินเชื่อกับธนาคาร</h3>
                        <p>รับปรึกษาและขอสินเชื่อกับทางธนาคาร พร้อมเตรียมเอกสารให้ทุกขั้นตอน</p>
                    </div>
                </div><!-- Service 4 end -->

                <div class="ts-service-box d-flex">
                    <div class="ts-service-box-img">
                        <img loading="lazy" src="/images/icon-image/service-icon5.png" alt="service-icon">
                    </div>
                    <div class="ts-service-box-info">
                        <h3 class="service-box-title">ขออนุญาตปลูกสร้าง</h3>
                        <p>ดำเนินการยื่นเอกสารขออนุญาตปลูกสร้างต่อเทศบาล หรือ อบต.</p>
                    </div>
                </div><!-- Service 5 end -->

                <div class="ts-service-box d-flex">
                    <div class="ts-service-box-img">
                        <img loading="lazy" src="/images/icon-image/fact1.png" alt="service-icon">
                    </div>
                    <div class="ts-service-box-info">
                        <h3 class="service-box-title">ดำเนินการขอทะเบียนบ้าน</h3>
                        <p>ดำเนินการยื่นเอกสารเพื่อขอเล่มทะเบียนบ้าน</p>
                    </div>
                </div><!-- Service 6 end -->

                <div class="ts-service-box d-flex">
                    <div class="ts-service-box-img">
                        <img loading="lazy" src="/images/icon-image/fact3.png" alt="service-icon">
                    </div>
                    <div class="ts-service-box-info">
                        <h3 class="service-box-title">ขอติดตั้งมิเตอร์ประปา - ไฟฟ้าชั่วคราว/ถาวร</h3>
                        <p>ดำเนินการยื่นเอกสารขอมิเตอร์ประปา และมิเตอร์ไฟฟ้าสำหรับการใช้งานชั่วคราวและถาวร</p>
                    </div>
                </div><!-- Service 6 end -->
            </div><!-- Col end -->
        </div><!-- Content row end -->

    </div>
    <!--/ Container end -->
</section><!-- Service end -->
<section id="ts-features" class="project-area solid-bg">
    <div class="container">
        <div class="row text-center">
            <div class="col-lg-12">
                <h2 class="section-title">ข่าวสารและโปรโมชั่น</h2>
                <h3 class="section-sub-title">ข่าวสารและโปรโมชั่นล่าสุด</h3>
            </div>
        </div>
        <div class="row">
            @foreach($promotions as $a => $prpmotion)
            <div class="col-lg-4 col-md-6 mb-5">
                <div class="ts-service-box">
                    <div class="ts-service-image-wrapper">
                        <img loading="lazy" class="w-100" src="{{ Storage::disk('spaces')->url($prpmotion->photo)}}" alt="service-image">
                    </div>
                    <div class="d-flex">
                        <!-- <div class="ts-service-box-img">
                            <img loading="lazy" src="images/icon-image/service-icon1.png" alt="service-icon" />
                        </div> -->
                        <div class="ts-service-info">
                            <h3 class="service-box-title"><a href="/promotion/{{$prpmotion->id}}/show">{{$prpmotion->name}}</a></h3>
                            <p class="limit-text">{{$prpmotion->detail}}</p>
                            <a class="learn-more d-inline-block" href="/promotion/{{$prpmotion->id}}/show" aria-label="service-details"><i class="fa fa-caret-right"></i> Learn more</a>
                        </div>
                    </div>
                </div><!-- Service1 end -->
            </div><!-- Col 1 end -->
            @endforeach
        </div><!-- Content row end -->
    </div><!-- Container end -->
</section><!-- Feature are end -->

<section id="facts" class="facts-area dark-bg">
    <div class="container">
        <div class="facts-wrapper">
            <div class="row">
                <div class="col-md-4 col-sm-6 ts-facts mt-5 mt-sm-0">
                    <div class="ts-facts-img">
                        <img loading="lazy" src="/images/icon-image/service-icon3.png" alt="facts-img">
                    </div>
                    <div class="ts-facts-content">
                        <h2 class="ts-facts-num"><span class="counterUp" data-count="{{isset($plan_count) ? $plan_count : 0}}">0</span></h2>
                        <h3 class="ts-facts-title">แบบบ้าน</h3>
                    </div>
                </div><!-- Col end -->

                <div class="col-md-4 col-sm-6 ts-facts mt-5 mt-md-0">
                    <div class="ts-facts-img">
                        <img loading="lazy" src="/images/icon-image/fact1.png" alt="facts-img">
                    </div>
                    <div class="ts-facts-content">
                        <h2 class="ts-facts-num"><span class="counterUp" data-count="{{isset($plan_promotion_count) ? $plan_promotion_count : 0}}">0</span></h2>
                        <h3 class="ts-facts-title">แบบบ้านโปรโมชั่น</h3>
                    </div>
                </div><!-- Col end -->

                <div class="col-md-4 col-sm-6 ts-facts mt-5 mt-md-0">
                    <div class="ts-facts-img">
                        <img loading="lazy" src="/images/icon-image/fact4.png" alt="facts-img">
                    </div>
                    <div class="ts-facts-content">
                        <h2 class="ts-facts-num"><span class="counterUp" data-count="{{$web_counter}}">0</span></h2>
                        <h3 class="ts-facts-title">ผู้เข้าชมเว็บไซต์</h3>
                    </div>
                </div><!-- Col end -->

            </div> <!-- Facts end -->
        </div>
        <!--/ Content row end -->
    </div>
    <!--/ Container end -->
</section><!-- Facts end -->

<section class="content">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h3 class="column-title">Tcon Build ทีคอนบิวด์</h3>

                <div id="testimonial-slide" class="testimonial-slide">
                    <div class="item">
                        <div class="quote-item">
                            <span class="quote-text">
                                เป็นบริษัทในเครือ "ทวีชัย กรุ๊ป" ประกอบธุรกิจรับสร้างบ้านและอาคารทุกประเภท
                                ซึ่งเราเป็นบริษัทรับสร้างบ้าน ที่ถือกำเนิดขึ้นจากความตั้งใจอันแน่วแน่ ของทีมผู้บริหาร
                                ที่ต้องการจะยกระดับมาตรฐานการในการก่อสร้างบ้าน และอาคารทุกประเภทโดยเฉพาะในต่างจังหวัด
                                ให้มีคุณภาพเทียบเท่าในระดับสากล ราคาที่เป็นมิตรกับลูกค้าโดยปัจจุบัน
                            </span>
                            <div class="quote-item-footer">
                                <img loading="lazy" class="testimonial-thumb" src="/images/clients/taweechaigroup.jpg" alt="testimonial">
                                <div class="quote-item-info">
                                    <h3 class="quote-author">Taweechai Group</h3>
                                    <span class="quote-subtext">ทวีชัย กรุ๊ป</span>
                                </div>
                            </div>
                        </div><!-- Quote item end -->
                    </div>
                    <!--/ Item 1 end -->

                    <div class="item">
                        <div class="quote-item">
                            <span class="quote-text">
                                เราคือบริษัทรับสร้างบ้าน รับออกแบบบ้าน และตกแต่งภายใน ในเขตภาคอีสาน
                                โดยทีมสถาปนิกและวิศวกรประสบการณ์สูง โดยมุ่งเน้นคุณภาพของงานเป็นหลัก
                                ด้วยการใส่ใจในทุกขั้นตอนการก่อสร้างและทีมงานมืออาชีพที่พร้อมทำให้งานเสร็จและส่งมอบได้ตรงตามเวลา
                                ลูกค้าได้บ้านที่สวย มีคุณภาพ งบประมาณไม่บานปลาย
                            </span>

                            <div class="quote-item-footer">
                                <img loading="lazy" class="testimonial-thumb" src="/images/clients/tconbuild.png" alt="testimonial">
                                <div class="quote-item-info">
                                    <h3 class="quote-author">TCON BUILD</h3>
                                    <span class="quote-subtext">ทีคอนบิวด์</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ Item 2 end -->

                    <!-- <div class="item">
                <div class="quote-item">
                    <span class="quote-text">
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor inci done idunt ut
                      labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitoa tion ullamco laboris
                      nisi ut commodo consequat.
                    </span>

                    <div class="quote-item-footer">
                      <img loading="lazy" class="testimonial-thumb" src="/images/clients/testimonial3.png" alt="testimonial">
                      <div class="quote-item-info">
                          <h3 class="quote-author">Minter Puchan</h3>
                          <span class="quote-subtext">Director, AKT</span>
                      </div>
                    </div>
                </div>
              </div> -->
                    <!--/ Item 3 end -->

                </div>
                <!--/ Testimonial carousel end-->
            </div><!-- Col end -->

            <div class="col-lg-6 mt-5 mt-lg-0">

                <h3 class="column-title">บริษัทในเครือ Taweechai Group "ทวีชัย กรุ๊ป"</h3>

                <div class="row all-clients">


                    <div class="col-sm-4 col-6">
                        <figure class="clients-logo">
                            <a href="#!"><img loading="lazy" class="img-fluid" src="/images/clients/tch.jpg" alt="clients-logo" /></a>
                        </figure>
                    </div><!-- Client 4 end -->

                    <div class="col-sm-4 col-6">
                        <figure class="clients-logo">
                            <a href="#!"><img loading="lazy" class="img-fluid" src="/images/clients/tconbuild.png" alt="clients-logo" /></a>
                        </figure>
                    </div><!-- Client 1 end -->

                    <div class="col-sm-4 col-6">
                        <figure class="clients-logo">
                            <a href="#!"><img loading="lazy" class="img-fluid" src="/images/clients/smart.jpg" alt="clients-logo" /></a>
                        </figure>
                    </div><!-- Client 1 end -->

                    <div class="col-sm-4 col-6">
                        <figure class="clients-logo">
                            <a href="#!"><img loading="lazy" class="img-fluid" src="/images/clients/mi.png" alt="clients-logo" /></a>
                        </figure>
                    </div><!-- Client 1 end -->

                    <div class="col-sm-4 col-6">
                        <figure class="clients-logo">
                            <a href="#!"><img loading="lazy" class="img-fluid" src="/images/clients/tcon.jpg" alt="clients-logo" /></a>
                        </figure>
                    </div><!-- Client 5 end -->

                    <div class="col-sm-4 col-6">
                        <figure class="clients-logo">
                            <a href="#!"><img loading="lazy" class="img-fluid" src="/images/clients/windowwide.jpg" alt="clients-logo" /></a>
                        </figure>
                    </div><!-- Client 2 end -->

                    <!-- <div class="col-sm-4 col-6">
                    <figure class="clients-logo">
                        <a href="#!"><img loading="lazy" class="img-fluid" src="/images/clients/k4.jpg" alt="clients-logo" /></a>
                    </figure>
                </div>

                <div class="col-sm-4 col-6">
                    <figure class="clients-logo">
                        <a href="#!"><img loading="lazy" class="img-fluid" src="/images/clients/pico.jpg" alt="clients-logo" /></a>
                    </figure>
                </div>

                <div class="col-sm-4 col-6">
                    <figure class="clients-logo">
                        <a href="#!"><img loading="lazy" class="img-fluid" src="/images/clients/my.jpg" alt="clients-logo" /></a>
                    </figure>
                </div> -->

                </div><!-- Clients row end -->

            </div><!-- Col end -->

        </div>
        <!--/ Content row end -->
    </div>
    <!--/ Container end -->
</section><!-- Content end -->

<!--/ News end -->
@endsection