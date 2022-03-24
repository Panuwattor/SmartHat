@extends('master')
@section('content')
<div id="banner-area" class="banner-area" style="background-image:url(/images/banner/banner3.jpg)">
  <div class="banner-text">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="banner-heading">
            <h1 class="banner-title">ข่าวสาร & โปรโมชั่น</h1>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item">News & Promotion</li>
              </ol>
            </nav>
          </div>
        </div><!-- Col end -->
      </div><!-- Row end -->
    </div><!-- Container end -->
  </div><!-- Banner text end -->
</div><!-- Banner area end -->

<section id="main-container" class="main-container">
  <div class="container">
    <div class="row">

      <div class="col-lg-8 mb-5 mb-lg-0">
        @foreach($promotions as $i => $promotion)
        <div class="post">
          <div class="post-media post-image">
            @if($promotion->photo)
            <img loading="lazy" src="{{ Storage::disk('spaces')->url($promotion->photo)}}" class="img-fluid" alt="post-image">
            @endif
          </div>

          <div class="post-body">
            <div class="entry-header">
              <div class="post-meta">
                <span class="post-author">
                  <i class="far fa-user"></i><a href="#"> Admin</a>
                </span>
                <span class="post-cat">
                  <i class="far fa-folder-open"></i><a href="#"> {{$promotion->type}}</a>
                </span>
                <span class="post-comment"><i class="far fa-calendar"></i>{{$promotion->created_at}} </span>
              </div>
              <h2 class="entry-title">
                <a href="/promotion/{{$promotion->id}}/show">{{$promotion->name}}</a>
              </h2>
            </div><!-- header end -->

            <div class="entry-content">
              <p class="limit-text">{{$promotion->detail}}</p>
            </div>

            <div class="post-footer">
              <a href="/promotion/{{$promotion->id}}/show" class="btn btn-primary">รายละเอียดเพิ่มเติม</a>
            </div>

          </div><!-- post-body end -->
        </div><!-- 1st post end -->
        @endforeach
        {{$promotions->links()}}
        <!-- <div class="post">
          <div class="post-media post-video">
            <div class="embed-responsive embed-responsive-16by9">
               
              <iframe class="embed-responsive-item" src="//player.vimeo.com/video/153089270?title=0&amp;byline=0&amp;portrait=0&amp;color=8aba56" allowfullscreen></iframe>
            </div>
          </div>

          <div class="post-body">
            <div class="entry-header">
              <div class="post-meta">
                <span class="post-author">
                  <i class="far fa-user"></i><a href="#"> Admin</a>
                </span>
                <span class="post-cat">
                  <i class="far fa-folder-open"></i><a href="#"> News</a>
                </span>
                <span class="post-meta-date"><i class="far fa-calendar"></i> June 14, 2016</span>
                <span class="post-comment"><i class="far fa-comment"></i> 03<a href="#" class="comments-link">Comments</a></span>
              </div>
              <h2 class="entry-title">
                <a href="news-single.html">Thandler Airport Water Reclamation Facility Expansion Project Named</a>
              </h2>
            </div> 

            <div class="entry-content">
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                fugiat nulla pariatur. Excepteur ...</p>
            </div>

            <div class="post-footer">
              <a href="news-single.html" class="btn btn-primary">Continue Reading</a>
            </div>

          </div> 
        </div> 

        <div class="post">
          <div class="post-media post-image">
            <img loading="lazy" src="/images/news/news3.jpg" class="img-fluid" alt="post-image">
          </div>

          <div class="post-body">
            <div class="entry-header">
              <div class="post-meta">
                <span class="post-author">
                  <i class="far fa-user"></i><a href="#"> Admin</a>
                </span>
                <span class="post-cat">
                  <i class="far fa-folder-open"></i><a href="#"> News</a>
                </span>
                <span class="post-meta-date"><i class="far fa-calendar"></i> June 14, 2016</span>
                <span class="post-comment"><i class="far fa-comment"></i> 03<a href="#" class="comments-link">Comments</a></span>
              </div>
              <h2 class="entry-title">
                <a href="news-single.html">Silicon Bench and Cornike Begin Construction of Large-Scale Solar Facilities
                  for Trade</a>
              </h2>
            </div> 

            <div class="entry-content">
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                fugiat nulla pariatur. Excepteur ...</p>
            </div>

            <div class="post-footer">
              <a href="news-single.html" class="btn btn-primary">Continue Reading</a>
            </div>

          </div> 
        </div>  -->

        <!-- <nav class="paging" aria-label="Page navigation example">
          <ul class="pagination">
            <li class="page-item"><a class="page-link" href="#"><i class="fas fa-angle-double-left"></i></a></li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#"><i class="fas fa-angle-double-right"></i></a></li>
          </ul>
        </nav> -->

      </div>

      <div class="col-lg-4">

        <div class="sidebar sidebar-right">
          <div class="widget recent-posts">
            <h3 class="widget-title">โปรโมชั่น & ข่าวสาร อื่นๆ</h3>
            <ul class="list-unstyled">
              @foreach($promotions as $i => $promotion)
              <li class="d-flex align-items-center">
                <div class="posts-thumb">
                  <a href="/promotion/{{$promotion->id}}/show"><img loading="lazy" alt="img" src="{{ Storage::disk('spaces')->url($promotion->photo)}}"></a>
                </div>
                <div class="post-info">
                  <h4 class="entry-title">
                    <a href="/promotion/{{$promotion->id}}/show">{{$promotion->name}}</a>
                  </h4>
                </div>
              </li>
              @endforeach
            </ul>
          </div><!-- Recent post end -->

          <div class="widget recent-posts">
            <h3 class="widget-title">ผลงานของเรา</h3>
            <ul class="list-unstyled">
              @foreach($ourworks as $ourwork)
              <li class="d-flex align-items-center">
                <div class="posts-thumb">
                  <a href="/ourwork/{{$ourwork['id']}}/show"><img loading="lazy" src="{{ Storage::disk('spaces')->url($ourwork['file'])}}"></a>
                </div>
                <div class="post-info">
                  <h4 class="entry-title">
                    <a href="/ourwork{{$ourwork['id']}}/show">{{ $ourwork['note']}}</a>
                  </h4>
                </div>
              </li><!-- 1st post end-->
              @endforeach
            </ul>

          </div><!-- Recent post end -->

        </div><!-- Sidebar end -->
      </div><!-- Sidebar Col end -->

    </div><!-- Main row end -->

  </div><!-- Container end -->
</section><!-- Main container end -->

@endsection