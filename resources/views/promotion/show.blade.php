@extends('master')
@section('description')
<meta property="og:locale" content="th_TH" />
<meta property="og:type" content="article" />
<meta property="og:title" content="{{$promotion->name}}" />
<meta property="og:description" content="{{$promotion->detail}}" />
<meta property="og:site_name" content="Tcon House" />
<meta property="og:image" content="{{$promotion->photo ? Storage::disk('spaces')->url($promotion->photo) : ''}}" />
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

      <div class="col-lg-8 mb-5 mb-lg-0">
        <?php

        use App\ShareModel;

        $_shareModel = new ShareModel;
        $_shareWidget = $_shareModel->ShareWidget('http://tconbuild.test.mytcg.net/promotion/' . $promotion->id . '/show');
        ?>

        {!!$_shareWidget!!}
        <div class="post">
          <div class="post-media post-image">
            <img loading="lazy" src="{{ Storage::disk('spaces')->url($promotion->photo)}}" class="img-fluid" alt="post-image">
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
                <span class="post-comment"><i class="far fa-calendar"></i> {{$promotion->created_at}}</span>
              </div>
              <h2 class="entry-title">
                {{$promotion->name}}
              </h2>
            </div><!-- header end -->
            <div class="entry-content">
              <p> {{$promotion->detail}}</p>
            </div>
          </div><!-- post-body end -->
        </div><!-- 1st post end -->

      </div><!-- Content Col end -->

      <div class="col-lg-4">

        <div class="sidebar sidebar-right">
          <div class="widget recent-posts">
            <h3 class="widget-title">โปรโมชั่น & ข่าวสาร อื่นๆ</h3>
            <ul class="list-unstyled">
              @foreach($promotions as $i => $promotion)
              <li class="d-flex align-items-center">
                <div class="posts-thumb">
                  <a href="#"><img loading="lazy" alt="img" src="{{ Storage::disk('spaces')->url($promotion->photo)}}"></a>
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
                    <a href="/ourwork/{{$ourwork['id']}}/show">{{ $ourwork['note']}}</a>
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