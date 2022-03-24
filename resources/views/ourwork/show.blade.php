@extends('master')
@section('description')
<title></title>
<meta property="og:locale" content="th_TH" />
<meta property="og:type" content="article" />
<meta property="og:title" content="{{$ourwork->note}}" />
<meta property="og:description" content="TCON BUILD ทีค่อนบิวด์ ครบเครื่องเรื่องบ้าน" />
<meta property="og:site_name" content="Tcon House" />
<meta property="og:image" content="{{$ourwork->files->where('type',1)->first() ? Storage::disk('spaces')->url($ourwork->files->where('type',1)->first()->file) : ''}}" />
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
        $_shareWidget = $_shareModel->ShareWidget('http://tconbuild.test.mytcg.net/ourwork/' . $ourwork->id . '/show');
        ?>

        {!!$_shareWidget!!}

        <div class="post-content post-single">
          <div class="post-media post-image">
            @foreach($ourwork->files->where('type',1) as $file)
            <img loading="lazy" src="{{ Storage::disk('spaces')->url($file->file)}}" class="img-fluid" alt="post-image">
            @endforeach
          </div>

          <div class="post-body">
            <div class="entry-header">
              <h2 class="entry-title">
                {{$ourwork->note}}
              </h2>
            </div><!-- header end -->

            <div class="entry-content">
              <div class="row">
                @foreach($ourwork->files->where('type','!=',1) as $i=> $file)
                <div class="col-lg-6 col-md-6 mb-5">
                  <div class="ts-service-box">
                    <div class="ts-service-image-wrapper">
                      <a href="#exampleModal{{$i}}" data-toggle="modal"> <img loading="lazy" class="w-100" src="{{ Storage::disk('spaces')->url($file['file'])}}" alt="service-image"></a>
                    </div>
                  </div><!-- Service1 end -->
                  <!-- Modal -->
                  <div class="modal fade bd-example-modal-lg" id="exampleModal{{$i}}" tabindex="-1" role="dialog" aria-labelledby="exampleModal{{$i}}Label" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">

                        </div>
                        <div class="modal-body">
                          <img loading="lazy" src="{{ Storage::disk('spaces')->url($file['file'])}}" class="img-fluid" alt="post-image">
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">X</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div><!-- Col 1 end -->
                @endforeach
              </div>
            </div>

          </div><!-- post-body end -->
        </div><!-- post content end -->

      </div><!-- Content Col end -->

      <div class="col-lg-4">

        <div class="sidebar sidebar-right site-navigation">
          <div class="widget recent-posts">
            <h3 class="widget-title">ผลงานอื่นๆ</h3>
            <ul class="list-unstyled">
              @foreach($ourworks as $i => $work)
              <li class="d-flex align-items-center">
                <div class="posts-thumb">
                  <a href="/ourwork/{{$work['id']}}/show"><img loading="lazy" alt="img" src="{{ Storage::disk('spaces')->url($work['file'])}}"></a>
                </div>
                <div class="post-info">
                  <h4 class="entry-title">
                    <a href="/ourwork/{{$work['id']}}/show">{{$work['note']}}</a>
                  </h4>
                </div>
              </li><!-- 1st post end-->
              @endforeach
            </ul>

          </div><!-- Recent post end -->

        </div><!-- Sidebar end -->
      </div><!-- Sidebar Col end -->

    </div><!-- Main row end -->

  </div><!-- Conatiner end -->
</section><!-- Main container end -->

@endsection