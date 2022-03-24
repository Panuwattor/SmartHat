<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Basic Page Needs
================================================== -->
  <meta charset="utf-8">
  <!-- Mobile Specific Metas
================================================== -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="keywords" content="Tcon Build ทีคอนบิวด์ รับสร้างบ้าน">
  @yield('description')
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
  <!-- Favicon
================================================== -->
  <link rel="icon" type="image/png" href="/images/favicon.png">
  <!-- CSS
================================================== -->
  <!-- Bootstrap -->
  <link rel="stylesheet" href="/plugins/bootstrap/bootstrap.min.css">
  <!-- FontAwesome -->
  <link rel="stylesheet" href="/plugins/fontawesome/css/all.min.css">
  <!-- Animation -->
  <link rel="stylesheet" href="/plugins/animate-css/animate.css">
  <!-- slick Carousel -->
  <link rel="stylesheet" href="/plugins/slick/slick.css">
  <link rel="stylesheet" href="/plugins/slick/slick-theme.css">
  <!-- Colorbox -->
  <link rel="stylesheet" href="/plugins/colorbox/colorbox.css">
  <!-- Template styles-->
  <link rel="stylesheet" href="/css/style.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>

  @yield('header')

  <style>
    .limit-text {
      overflow: hidden;
      text-overflow: ellipsis;
      display: -webkit-box;
      -webkit-line-clamp: 4;
      /* number of lines to show */
      line-clamp: 2;
      -webkit-box-orient: vertical;
    }
  </style>

  <style>
      div#social-links ul{

        padding: 0px;

      }
      div#social-links ul li {

        display: inline-block;

      }          
      div#social-links ul li a {

        padding: 5px;
        border: 1px solid #ff9b36;
        margin: 1px;
        font-size: 20px;
        color: #ff9b36;

      }
      
  </style>
</head>

<body>
  <div class="body-inner">

    <div id="top-bar" class="top-bar">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-8">
            <ul class="top-info text-center text-md-left">
              <li> <a href="https://goo.gl/maps/eLQYatjPb7nbxaSj6"><i class="fas fa-map-marker-alt"></i></a>
                <p class="info-text">160 หมู่ที่ 1 ต.บัวหุ่ง อ.ราษีไศล จ.ศรีสะเกษ 33160</p>
              </li>
            </ul>
          </div>
          <!--/ Top info end -->

          <div class="col-lg-4 col-md-4 top-social text-center text-md-right">
            <ul class="list-unstyled">
              <li>
                <a title="Facebook" href="https://www.facebook.com/tconbuild" target="back">
                  <span class="social-icon"><i class="fab fa-facebook-f"></i></span>
                </a>
                <a title="Twitter" href="line://ti/p/%40hjy7855d">
                  <span class="social-icon"><i class="fab fa-line"></i></span>
                </a>
                <a title="Instagram" href="https://www.instagram.com/tcon.homeservice/">
                  <span class="social-icon"><i class="fab fa-instagram"></i></span>
                </a>
                <a title="Linkdin" href="https://github.com/themefisher.com">
                  <span class="social-icon"><i class="fab fa-youtube"></i></span>
                </a>
                <a title="Instagram" href="https://www.tiktok.com/@tcon.build?">
                  <span class="social-icon"><i class="fab fa-tiktok"></i></span>
                </a>
              </li>
            </ul>
          </div>
          <!--/ Top social end -->
        </div>
        <!--/ Content row end -->
      </div>
      <!--/ Container end -->
    </div>
    <!--/ Topbar end -->
    <!-- Header start -->
    <header id="header" class="header-one">
      <div class="bg-white">
        <div class="container">
          <div class="logo-area">
            <div class="row align-items-center">
              <div class="logo col-lg-3 text-center text-lg-left mb-3 mb-md-5 mb-lg-0">
                <a class="d-block" href="/">
                  <img loading="lazy" src="/images/logo.png" alt="Constra">
                </a>
              </div><!-- logo end -->

              <div class="col-lg-9 header-right">
                <ul class="top-info-box">
                  <li>
                    <div class="info-box">
                      <div class="info-box-content">
                        <p class="info-box-title">สำนักงานใหญ่</p>
                        <p class="info-box-subtitle"><a href="tel:045-691-999">045-691-999 ต่อ 4</a></p>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="info-box">
                      <div class="info-box-content">
                        <p class="info-box-title">Facebook Page</p>
                        <p class="info-box-subtitle">
                          <a title="Facebook" href="https://www.facebook.com/tconbuild" target="back">
                            <span class="social-icon  text-primary"> Tcon Build ทีคอนบิวด์ รับสร้างบ้าน</span>
                          </a>
                        </p>
                      </div>
                    </div>
                  </li>
                  <li class="info-box">
                    <div class="info-box last">
                      <div class="info-box-content">
                        <p class="info-box-title">Line Official</p>
                        <p class="info-box-subtitle text-success"><a href="line://ti/p/%40hjy7855d"> @baantaweechai </a></p>
                      </div>
                    </div>
                  </li>
                  <li class="header-get-a-quote">
                    @if(auth()->user())
                    <div class="info-box last">
                      <div class="info-box-content">
                        <p class="info-box-title">Admin</p>
                        <p class="info-box-subtitle text-warning"><a href="/admin/dashboard">{{auth()->user()->name}}</a></p>
                      </div>
                    </div>
                    @else
                    <a class="btn btn-primary" data-toggle="modal" data-target="#loginModel"> <i class="fa fa-user"></i> เข้าสู่ระบบ</a>
                    @endif
                    <!-- Modal -->
                    <div class="modal fade" id="loginModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">เข้าสู่ระบบ</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="modal-body">
                              <div class="form-group row">
                                <label for="email" class="col-md-3 col-form-label text-md-right">E-Mail</label>

                                <div class="col-md-9">
                                  <input id="email" type="email" class="form-control form-control-sm @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                  @error('email')
                                  <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                  </span>
                                  @enderror
                                </div>
                              </div>

                              <div class="form-group row">
                                <label for="password" class="col-md-3 col-form-label text-md-right">Password</label>

                                <div class="col-md-9">
                                  <input id="password" type="password" class="form-control form-control-sm @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                  @error('password')
                                  <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                  </span>
                                  @enderror
                                </div>
                              </div>

                              <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                  <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                      {{ __('Remember Me') }}
                                    </label>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary">{{ __('Login') }}</button>
                            </div>
                          </form>

                        </div>
                      </div>
                    </div>
                  </li>
                </ul><!-- Ul end -->
              </div><!-- header right end -->
            </div><!-- logo area end -->

          </div><!-- Row end -->
        </div><!-- Container end -->
      </div>

      <div class="site-navigation">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <nav class="navbar navbar-expand-lg navbar-dark p-0">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>

                <div id="navbar-collapse" class="collapse navbar-collapse">
                  <ul class="nav navbar-nav mr-auto">
                    <li class="nav-item {{ (request()->is('/')) ? 'active' : '' }}"><a class="nav-link" href="/">หน้าหลัก</a></li>
                    <li class="nav-item {{ (request()->is('housestyles')) ? 'active' : '' }}"><a class="nav-link" href="/housestyles">แบบบ้าน</a></li>
                    <li class="nav-item {{ (request()->is('ourworks')) ? 'active' : '' }}"><a class="nav-link" href="/ourworks">ผลงานของเรา</a></li>
                    <li class="nav-item {{ (request()->is('promotions')) ? 'active' : '' }}"><a class="nav-link" href="/promotions">ข่าวสาร & โปรโมชั่น</a></li>
                    <li class="nav-item {{ (request()->is('construction')) ? 'active' : '' }}"><a class="nav-link" href="/construction">ระบบก่อสร้าง</a></li>
                    <li class="nav-item {{ (request()->is('preparing')) ? 'active' : '' }}"><a class="nav-link" href="/preparing">เตรียมตัวก่อนสร้างบ้าน</a></li>
                    <li class="nav-item {{ (request()->is('contact')) ? 'active' : '' }}"><a class="nav-link" href="/contact">ติดต่อเรา</a></li>
                    <li class="nav-item {{ (request()->is('join_us')) ? 'active' : '' }}"><a class="nav-link" href="/join_us">รวมงานกับเรา</a></li>
                  </ul>
                </div>
              </nav>
            </div>
            <!--/ Col end -->
          </div>
          <!--/ Row end -->

          <div class="nav-search">
            <span id="search"><i class="fa fa-search"></i></span>
          </div><!-- Search end -->

          <div class="search-block" style="display: none;">
            <label for="search-field" class="w-100 mb-0">
              <input type="text" class="form-control" id="search-field" placeholder="Type what you want and enter">
            </label>
            <span class="search-close">&times;</span>
          </div><!-- Site search end -->
        </div>
        <!--/ Container end -->

      </div>
      <!--/ Navigation end -->
    </header>
    <!--/ Header end -->
    @yield('content')

    <footer id="footer" class="footer bg-overlay">
      <div class="footer-main">
        <div class="container">
          <div class="row justify-content-between">
            <div class="col-lg-4 col-md-6 footer-widget footer-about">
              <img loading="lazy" width="200px" class="footer-logo " src="/images/footer-logo.png" alt="Constra">
              <p> เราคือบริษัทรับสร้างบ้าน รับออกแบบบ้าน และตกแต่งภายใน ในเขตภาคอีสาน
                โดยทีมสถาปนิกและวิศวกรประสบการณ์สูง โดยมุ่งเน้นคุณภาพของงานเป็นหลัก
                ด้วยการใส่ใจในทุกขั้นตอนการก่อสร้างและทีมงานมืออาชีพที่พร้อมทำให้งานเสร็จและส่งมอบได้ตรงตามเวลา
                ลูกค้าได้บ้านที่สวย มีคุณภาพ งบประมาณไม่บานปลาย</p>
              <div class="footer-social">
                <ul>
                  <li>
                    <a title="Facebook" href="https://www.facebook.com/tconbuild" target="back">
                      <span class="social-icon"><i class="fab fa-facebook-f"></i></span>
                    </a>
                  </li>
                  <li>
                    <a title="Twitter" href="line://ti/p/%40hjy7855d">
                      <span class="social-icon"><i class="fab fa-line"></i></span>
                    </a>
                  </li>
                  <li>
                    <a title="Instagram" href="https://www.instagram.com/tcon.homeservice/">
                      <span class="social-icon"><i class="fab fa-instagram"></i></span>
                    </a>
                  </li>
                  <li>
                    <a title="Linkdin" href="https://github.com/themefisher.com">
                      <span class="social-icon"><i class="fab fa-youtube"></i></span>
                    </a>
                  </li>
                  <li>
                    <a title="Instagram" href="https://www.tiktok.com/@tcon.build?">
                      <span class="social-icon"><i class="fab fa-tiktok"></i></span>
                    </a>
                  </li>
                </ul>

              </div><!-- Footer social end -->
            </div><!-- Col end -->

            <div class="col-lg-4 col-md-6 footer-widget mt-5 mt-md-0">
              <h3 class="widget-title">Working Hours</h3>
              <div class="working-hours">
                เราทำงาน ทุกวัน รวมถึงวันหยุดนักขัตฤกษ์ <br>ที่ตั้ง สำนักงานใหญ่ 160 หมู่ที่ 1 ต.บัวหุ่ง อ.ราษีไศล จ.ศรีสะเกษ 33160 <br>ที่ตั้ง สาขาเมืองศรีสะเกษ 998/55-56 ถนนกวงเฮง ตำบลเมืองใต้ อำเภอเมือง จังหวัดศรีสะเกษ 33000
                <br> เวลาการทำงาน : <span class="text-right">08:00 - 18:00 </span>
                <br>สำนักงานใหญ่ โทร : <span class="text-right"><a href="tel:045-691-999">045-691-999 ต่อ 4</a></span>
                <br>สาขาเมืองศรีสะเกษ โทร : <span class="text-right"><a href="tel:045-691-999">045-962-627</a></span>
              </div>
            </div><!-- Col end -->

            <div class="col-lg-3 col-md-6 mt-5 mt-lg-0 footer-widget">
              <h3 class="widget-title">Services</h3>
              <ul class="list-arrow">
                <li><a href="service-single.html">รับสร้างบ้าน</a></li>
                <li><a href="service-single.html">รับออกแบบบ้าน</a></li>
                <li><a href="service-single.html">ผลิตและติดตั้งโครงหลังคา</a></li>
                <li><a href="service-single.html">ผลิตและติดตั้งประตูหน้าต่าง</a></li>
                <li><a href="service-single.html">บ้านน็อคดาวน์</a></li>
              </ul>
            </div><!-- Col end -->
          </div><!-- Row end -->
        </div><!-- Container end -->
      </div><!-- Footer main end -->
    </footer><!-- Footer end -->


    <!-- Javascript Files
  ================================================== -->

    <!-- initialize jQuery Library -->
    <script src="/plugins/jQuery/jquery.min.js"></script>
    <!-- Bootstrap jQuery -->
    <script src="/plugins/bootstrap/bootstrap.min.js" defer></script>
    <!-- Slick Carousel -->
    <script src="/plugins/slick/slick.min.js"></script>
    <script src="/plugins/slick/slick-animation.min.js"></script>
    <!-- Color box -->
    <script src="/plugins/colorbox/jquery.colorbox.js"></script>
    <!-- shuffle -->
    <script src="/plugins/shuffle/shuffle.min.js" defer></script>


    <!-- Google Map API Key-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU" defer></script>
    <!-- Google Map Plugin-->
    <script src="/plugins/google-map/map.js" defer></script>

    <!-- Template custom -->
    <script src="/js/script.js"></script>
    @yield('footer')
  </div><!-- Body inner end -->
  @include('sweetalert::alert')
</body>

</html>