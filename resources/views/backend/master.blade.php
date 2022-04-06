<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Smart Hat</title>
    <link rel="icon" href="{{ asset('images/logow.png') }}">
    <!-- Tell the browser to be responsive to screen width -->
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="https://taweechai-bucket.s3-ap-southeast-1.amazonaws.com/upvc/admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="https://taweechai-bucket.s3-ap-southeast-1.amazonaws.com/upvc/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="https://taweechai-bucket.s3-ap-southeast-1.amazonaws.com/upvc/admin/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="https://taweechai-bucket.s3-ap-southeast-1.amazonaws.com/upvc/admin/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="https://taweechai-bucket.s3-ap-southeast-1.amazonaws.com/upvc/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="https://taweechai-bucket.s3-ap-southeast-1.amazonaws.com/upvc/admin/plugins/daterangepicker/daterangepicker.css">
    <!-- <link rel="stylesheet" href="{{ asset('/admin/plugins/datepicker/datepicker3.css') }}"> -->
    <!-- summernote -->
    <link rel="stylesheet" href="https://taweechai-bucket.s3-ap-southeast-1.amazonaws.com/upvc/admin/plugins/summernote/summernote-bs4.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    @yield('header')


    <style>
        .datepicker {
            z-index: 1190 !important;
        }

        .modal-backdrop {
            width: 100% !important;
            height: 100% !important;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed text-sm sidebar-collapse target">
    <div class="wrapper">

        <nav class="main-header navbar navbar-expand navbar-dark navbar-gray-dark">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="fa fa-user"></i>
                        <span class="hidden-xs"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <div class="card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    @if(auth()->user()->photo)
                                    <img src="{{ Storage::disk('spaces')->url(auth()->user()->photo) }}" alt="User profile picture" class="profile-user-img img-fluid img-circle">
                                    @else
                                    <img src="https://www.wisible.io/wp-content/uploads/2019/08/avatar-human-male-profile-user-icon-518358.png" alt="User Avatar" class="profile-user-img img-fluid img-circle">
                                    @endif
                                </div>

                                <h3 class="profile-username text-center">{{auth()->user()->name}}</h3>

                                <p class="text-center  text-success">{{auth()->user()->branch ?auth()->user()->branch->name : '-'}}</p>

                                <ul class="list-group list-group-unbordered mb-3 mt-2">
                                    <li class="list-group-item">
                                        <b>แต้ม</b> <a class="float-right">0.00</a>
                                    </li>
                                    <li class="list-group-item">
                                        <a href="/admin/auth/user/show">
                                            <button type="button" class="btn btn-block btn-outline-secondary btn-flat">จัดการข้อมูลส่วนตัว</button>
                                        </a>
                                    </li>

                                </ul>
                                <div class="dropdown-divider"></div>
                                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item dropdown-footer"><i class="fa fa-btn fa-sign-out"></i> Logout</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </li>
            </ul>
        </nav>

        <aside class="main-sidebar  sidebar-dark-orange elevation-4">
            <a href="/" class="brand-link">
                <img src="{{asset('images/logow.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Admin Smart Hat</span>
            </a>

            <div class="sidebar">
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        @if(auth()->user()->photo)
                        <img src="{{ Storage::disk('spaces')->url(auth()->user()->photo) }}" alt="User Avatar" class="img-size-50 img-circle">
                        @else
                        <img src="https://www.wisible.io/wp-content/uploads/2019/08/avatar-human-male-profile-user-icon-518358.png" alt="User Avatar" class="img-size-50 img-circle">
                        @endif
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">{{auth()->user()->name}}</a>
                    </div>
                </div>

                <nav class="mt-2">
                    <!-- Setting menu -->
                    <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-header text-success"><i class="fas fa-caret-down"></i> จัดการเเว็บไซต์</li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link {{ (request()->is('/admin/ourwork/banner')) ? 'active' : '' }}">
                                <i class="nav-icon  fas  fa-check-circle"></i>
                                <p>
                                    Add Banner Webpage
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            
                            <ul class="nav nav-treeview" style="display: {{ (request()->is('admin/Bannerandfont/bannershow')) ? 'block' : '' }}">
                                <li class="nav-item">
                                    <a href="/admin/Bannerandfont/bannershow" class="nav-link {{ (request()->is('admin/Bannerandfont/bannershow')) ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>banner slide show web page</p>
                                    </a>
                                </li>
                            </ul>

                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link {{ (request()->is('admin/ourwork/Quatation')) ? 'active' : '' }}">
                                <i class="nav-icon  fas  fa-check-circle"></i>
                                <p>
                                   ใบเสนอราคา
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            
                            <ul class="nav nav-treeview" style="display: {{ (request()->is('admin/ourwork/Quatation')) ? 'block' : '' }}">
                                <li class="nav-item">
                                    <a href="/admin/ourwork/Quatation" class="nav-link {{ (request()->is('admin/ourwork/Quatation')) ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>ใช้ใบเสนอราคา</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                      
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link {{ (request()->is('admin/ourwork/index')) ? 'active' : '' }}">
                                <i class="nav-icon  fas  fa-check-circle"></i>
                                <p>
                                    ผลงานของเรา
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            
                            <ul class="nav nav-treeview" style="display: {{ (request()->is('admin/ourwork/index')) ? 'block' : '' }}">
                                <li class="nav-item">
                                    <a href="/admin/ourwork/index" class="nav-link {{ (request()->is('admin/ourwork/index')) ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>ผลงานของเรา</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link {{ (request()->is('joinuscl')) ? 'active' : '' }}">
                                <i class="nav-icon  fas  fa-check-circle"></i>
                                <p>
                                    รวมงานกับเรา
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview" style="display: {{ (request()->is('joinuscl')) ? 'block' : '' }}">
                                <li class="nav-item">
                                    <a href="/joinuscl" class="nav-link {{ (request()->is('joinuscl')) ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>รวมกับเรา</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link {{ (request()->is('admin/tag/index')) ? 'active' : '' }} {{ (request()->is('admin/housestyles')) ? 'active' : '' }}">
                                <i class="nav-icon fas fa-tasks"></i>
                                <p>
                                 
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview" style="display: {{ (request()->is('admin/tag/index')) ? 'block' : '' }} {{ (request()->is('admin/housestyles')) ? 'block' : '' }}  ;">
                                <li class="nav-item">
                                    <a href="/admin/housestyles" class="nav-link  {{ (request()->is('admin/housestyles')) ? 'active' : '' }} ">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p> แบบบ้าน</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/admin/tag/index" class="nav-link {{ (request()->is('admin/tag/index')) ? 'active' : '' }} ">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p> แท็ก</p>
                                    </a>
                                </li>
                            </ul>
                           
                        </li>
                       
                        <li class="nav-item has-treeview">
                            <a href="/admin/promotions" class="nav-link {{ (request()->is('admin/promotions')) ? 'active' : '' }} ">
                                <i class="nav-icon fas  fa-star"></i>
                                <p>
                                    ข่าวสาร & โปรโมชั่น
                                </p>
                            </a>
                        </li>
                        <li class="nav-header text-success"><i class="fas fa-caret-down"></i> SETTING</li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link {{ (request()->is('builder/admin/users')) ? 'active' : '' }} {{ (request()->is('builder/admin/permissions')) ? 'active' : '' }} {{ (request()->is('builder/admin/roles')) ? 'active' : '' }}">
                                <i class="nav-icon fas fa-user"></i>
                                <p>
                                    พนักงาน
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview" style="display: {{ (request()->is('builder/admin/users')) ? 'block' : '' }} {{ (request()->is('builder/admin/permissions')) ? 'block' : '' }} {{ (request()->is('builder/admin/roles')) ? 'block' : '' }};">
                                <li class="nav-item">
                                    <a href="/builder/admin/users" class="nav-link {{ (request()->is('builder/admin/users')) ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>รายชื่อพนักงาน</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/builder/admin/roles" class="nav-link {{ (request()->is('builder/admin/roles')) ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>ตำแหน่ง</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/builder/admin/permissions" class="nav-link {{ (request()->is('builder/admin/permissions')) ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>สิทธิ์การใช้งาน</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>

                    <!-- End Builder menu -->
                </nav>
            </div>
        </aside>

        <div class="content-wrapper">
            <section class="content">
                @yield('content')
            </section>
        </div>

        <!-- <div class="btn back-to-top">
            <a class="btn zoom"><i class="fas fa-search-plus"></i></a>
            <a class="btn zoom-out"><i class="fas fa-search-minus"></i></a>
            <a class="btn zoom-init"><i class="fas fa-recycle"></i></a>
        </div> -->

        <aside class="control-sidebar control-sidebar-dark">
        </aside>

        <!-- Main Footer -->
        <footer class="main-footer text-sm">
           <a href="https://taweechai-bucket.s3-ap-southeast-1.amazonaws.com/upvc/admin/index3.html"> <strong>TCON &copy; TAWEECHAI CONCRETE PRODUCT Co., Ltd. <i class="fa fa-star-o"></i></strong></a>
        </footer>

    </div>

    <!-- jQuery -->
    <script src="https://taweechai-bucket.s3-ap-southeast-1.amazonaws.com/upvc/admin/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="https://taweechai-bucket.s3-ap-southeast-1.amazonaws.com/upvc/admin/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="https://taweechai-bucket.s3-ap-southeast-1.amazonaws.com/upvc/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="https://taweechai-bucket.s3-ap-southeast-1.amazonaws.com/upvc/admin/plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="https://taweechai-bucket.s3-ap-southeast-1.amazonaws.com/upvc/admin/plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="https://taweechai-bucket.s3-ap-southeast-1.amazonaws.com/upvc/admin/plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="https://taweechai-bucket.s3-ap-southeast-1.amazonaws.com/upvc/admin/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="https://taweechai-bucket.s3-ap-southeast-1.amazonaws.com/upvc/admin/plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="https://taweechai-bucket.s3-ap-southeast-1.amazonaws.com/upvc/admin/plugins/moment/moment.min.js"></script>
    <script src="https://taweechai-bucket.s3-ap-southeast-1.amazonaws.com/upvc/admin/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- <script src="{{ asset('/admin/plugins/datepicker/bootstrap-datepicker.js') }}"></script> -->
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="https://taweechai-bucket.s3-ap-southeast-1.amazonaws.com/upvc/admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="https://taweechai-bucket.s3-ap-southeast-1.amazonaws.com/upvc/admin/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="https://taweechai-bucket.s3-ap-southeast-1.amazonaws.com/upvc/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="https://taweechai-bucket.s3-ap-southeast-1.amazonaws.com/upvc/admin/dist/js/adminlte.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="https://taweechai-bucket.s3-ap-southeast-1.amazonaws.com/upvc/admin/dist/js/pages/dashboard.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="https://taweechai-bucket.s3-ap-southeast-1.amazonaws.com/upvc/admin/dist/js/demo.js"></script>
    @include('sweetalert::alert')

    @yield('footer')

    <!-- ไม่สามารถ click ขวาได้ -->
    <!-- <script language=javascript>
        var message = "";
        
        function clickIE() {
            if (document.all) {
                (message);
                return false;
            }
        }

        function clickNS(e) {
            if (document.layers || (document.getElementById && !document.all)) {
                if (e.which == 2 || e.which == 3) {
                    (message);
                    return false;
                }
            }
        }
        if (document.layers) {
            document.captureEvents(Event.MOUSEDOWN);
            document.onmousedown = clickNS;
        } else {
            document.onmouseup = clickNS;
            document.oncontextmenu = clickIE;
        }
        document.oncontextmenu = new Function("return false")
    </script> -->
    <!-- ไม่สามารถ click ขวาได้ -->

    <!-- <script>
        var zoom = 1;
		zoom -= 0.1;
        $('.target').css('zoom', zoom);

		$('.zoom').on('click', function(){
			zoom += 0.1;
			$('.target').css('zoom', zoom);
		});
		$('.zoom-init').on('click', function(){
			zoom = 1;
			$('.target').css('zoom', zoom);
		});
		$('.zoom-out').on('click', function(){
			zoom -= 0.1;
			$('.target').css('zoom', zoom);
		});
    </script> -->
    <script>
        $('form').submit(function(e) {
            if ($(this).hasClass('form-submitted')) {
                e.preventDefault();
                alert('กรุณารอสักครู่ (Please wait)')

                $(this).removeClass('form-submitted');
                return;
            }
            $(this).addClass('form-submitted');
        });
    </script>
</body>

</html>