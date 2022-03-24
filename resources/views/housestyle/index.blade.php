@extends('master')

@section('content')
<div id="banner-area" class="banner-area" style="background-image:url(/images/banner/banner1.jpg)">
  <div class="banner-text">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="banner-heading">
            <h1 class="banner-title">แบบบ้าน</h1>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item">PLANS</li>
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
      <div class="col-md-12">

        <div class="accordion accordion-group accordion-classic" id="construction-accordion">
          <div class="card">
            <div class="card-header p-0 bg-transparent" id="headingThree">
              <h2 class="mb-0">
                <button class="btn btn-block text-left text-center collapsed " type="button" data-toggle="collapse" data-target="#collapseThree" @if(request('_token')) aria-expanded="true" @else aria-expanded="false" @endif  aria-controls="collapseThree">
                  <i class="fa fa-hand-pointer"></i> ค้นหาแบบบ้านที่ต้องการ
                </button>
              </h2>
            </div>
            <div id="collapseThree"  @if(request('_token'))  class="collapse show" @else  class="collapse" @endif  aria-labelledby="headingThree" data-parent="#construction-accordion">
              <form action="/housestyles#tag_show">
                @csrf
                <div class="card-body">
                  <div class="quote-item quote-border">
                    <form id="contact-form">
                      <div class="quote-text-border">
                        <div class="error-container"></div>
                        <div class="row">
                          <div class="col-md-4">
                            <div class="form-group">
                              <label>ราคาเริ่มต้น</label>
                              <select class="form-control" name="price">
                                <option value="" @if($string_price=='' )selected @endif>ทั้งหมด</option>
                                <option value="0,999999" @if($string_price=='0,999999' )selected @endif>ต่ำกว่า 1 ล้านบาท</option>
                                <option value="1000000,2000000" @if($string_price=='1000000,2000000' )selected @endif>1 - 2 ล้านบาท</option>
                                <option value="2000000,3000000" @if($string_price=='2000000,3000000' )selected @endif>2 - 3 ล้านบาท</option>
                                <option value="3000000,4000000" @if($string_price=='3000000,4000000' )selected @endif>3 - 4 ล้านบาท</option>
                                <option value="4000000,5000000" @if($string_price=='4000000,5000000' )selected @endif>4 - 5 ล้านบาท</option>
                                <option value="5000000,100000000" @if($string_price=='5000000,100000000' )selected @endif>5 - 10 ล้านบาท</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label>จำนวนชั้น</label>
                              <select class="form-control" name="floor">
                                <option value="" @if($floor=='' )selected @endif>ทั้งหมด</option>
                                <option value="1" @if($floor=='1' )selected @endif>1 ชั้น</option>
                                <option value="2" @if($floor=='2' )selected @endif>2 ชั้น</option>
                                <option value="3" @if($floor=='3' )selected @endif>3 ชั้น</option>
                                <option value="4" @if($floor=='4' )selected @endif>4 ชั้น</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label>ห้องนอน</label>
                              <select class="form-control" name="bedroom">
                                <option value=" " @if($bedroom=='' )selected @endif>ทั้งหมด</option>
                                <option value="1" @if($bedroom=='1' )selected @endif>1</option>
                                <option value="2" @if($bedroom=='2' )selected @endif>2</option>
                                <option value="3" @if($bedroom=='3' )selected @endif>3</option>
                                <option value="4" @if($bedroom=='4' )selected @endif>4</option>
                                <option value="5" @if($bedroom=='5' )selected @endif>5</option>
                                <option value="6" @if($bedroom=='6' )selected @endif>6</option>
                                <option value="7" @if($bedroom=='7' )selected @endif>7</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label>ห้องน้ำ</label>
                              <select class="form-control" name="bathroom">
                                <option value="" @if($bathroom=='' )selected @endif>ทั้งหมด</option>
                                <option value="1" @if($bathroom=='1' )selected @endif>1</option>
                                <option value="2" @if($bathroom=='2' )selected @endif>2</option>
                                <option value="3" @if($bathroom=='3' )selected @endif>3</option>
                                <option value="4" @if($bathroom=='4' )selected @endif>4</option>
                                <option value="5" @if($bathroom=='5' )selected @endif>5</option>
                                <option value="6" @if($bathroom=='6' )selected @endif>6</option>
                                <option value="7" @if($bathroom=='7' )selected @endif>7</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label>พื้นที่ใช้สอย</label>
                              <select class="form-control" name="area">
                                <option value="" @if($string_area=='' )selected @endif>ทั้งหมด</option>
                                <option value="0,200" @if($string_area=='0,200' )selected @endif>ต่ำกว่า 200 ตร.ม</option>
                                <option value="200,300" @if($string_area=='200,300' )selected @endif>200 - 300 ตร.ม</option>
                                <option value="300,400" @if($string_area=='300,400' )selected @endif>300 - 400 ตร.ม</option>
                                <option value="400,500" @if($string_area=='400,500' )selected @endif>400 - 500 ตร.ม</option>
                                <option value="500,600" @if($string_area=='500,600' )selected @endif>500 - 600 ตร.ม</option>
                                <option value="600,2000" @if($string_area=='600,2000' )selected @endif>มากกว่า 600 ตร.ว</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label>ชื่อแบบบ้าน</label>
                              <input type="text" class="form-control" name="planName">
                            </div>
                          </div>
                        </div>
                        <div class="text-right"><br>
                        </div>
                      </div>
                      <div class="quote-item-footer">
                        <button class="btn btn-primary solid blank" type="submit"> <i class="fa fa-search"></i> Search</button>
                      </div>
                    </form>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-12" id="tag_show">
        <div class="sidebar sidebar-left">
          <div class="widget widget-tags ">
            <ul class="list-unstyled">
              @foreach($tages as $tag)
              <li><a href="/housestyles?tag={{$tag->id}}#tag_show" @if(request('tag') == $tag->id) class="btn btn-primary"@endif>{{$tag->name}}</a></li>
              @endforeach
            </ul>
          </div><!-- Tags end -->

        </div><!-- Sidebar end -->
        <div class="gap-60"></div>

      </div><!-- Sidebar Col end -->
      @foreach($homestyles as $i=> $homestyle)
      <div class="col-lg-4 col-md-6 mb-5">
        <div class="ts-service-box">
          <div class="ts-service-image-wrapper">
            <a href="/housestyle/{{$homestyle->id}}/show"><img loading="lazy" class="w-100" src="{{ Storage::disk('spaces')->url($homestyle->img)}}" alt="service-image"></a>
          </div>
          <div class="d-flex">

            <div class="ts-service-info">
              <div class="meta-data">
                <h3 class="service-box-title"><a href="/housestyle/{{$homestyle->id}}/show">{{$homestyle->codePlan}}</a> <a href="/housestyle/{{$homestyle->id}}/show" class="text-success">เริ่มต้น {{number_format($homestyle->price,2)}} บาท</a></h3>
              </div>
              <div class="entry-header">
                <div class="post-meta">
                  <span class="post-author">
                    <i class="fa fa-bed"></i> {{$homestyle->bedroom}}
                  </span>
                  <span class="post-cat">
                    <i class="fa fa-bath"></i> {{$homestyle->toilet}}
                  </span>
                  <span class="post-comment">
                    <i class="fa fa-car"></i> {{$homestyle->car}}</a>
                  </span>
                </div>
              </div><!-- header end -->
              <span class="text-right">จำนวนชั้น : {{$homestyle->floor}} ชั้น</span>
              <br>
              <span class="text-right">ขนาดอาคาร : {{$homestyle->buildingWide}} X {{$homestyle->buildingLong}} ตร.ม. </span>
              <br>
              <span class="text-right">ขนาดที่ดิน : {{$homestyle->minimumWide}} X {{$homestyle->minimumLong}} ตร.ม. </span>
              <br>
              <span class="text-right">พื้นที่ใช้สอย :{{$homestyle->space}} ตร.ม. </span>
              <br>
              <a class="learn-more d-inline-block" href="/housestyle/{{$homestyle->id}}/show" aria-label="service-details"><i class="fa fa-caret-right"></i> ดูรายละเอียด</a>
            </div>
          </div>
        </div><!-- Service1 end -->
      </div><!-- Col 1 end -->
      @endforeach
    </div><!-- Main row end -->
    {{$homestyles->appends(['floor' => $floor],['bathroom' => $bathroom],['bedroom' => $bedroom],['area' => $string_area],['price' => $string_price])->links()}}
  </div><!-- Conatiner end -->
</section><!-- Main container end -->

@endsection