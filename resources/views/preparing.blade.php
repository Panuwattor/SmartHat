@extends('master')
@section('description')
<title>TCON BUILD เตรีมตัวก่อนสร้างบ้าน</title>
<meta name="description" content="TCON BUILD เตรีมตัวก่อนสร้างบ้าน ขั้นตอนการดำเนินงาน">
@endsection
@section('content')
<div id="banner-area" class="banner-area" style="background-image:url(/images/banner/preparing.jpg)">
    <div class="banner-text">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="banner-heading">
                        <h1 class="banner-title">เตรีมตัวก่อนสร้างบ้าน</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item">Prepare before building a house</li>
                            </ol>
                        </nav>
                    </div>
                </div><!-- Col end -->
            </div><!-- Row end -->
        </div><!-- Container end -->
    </div><!-- Banner text end -->
</div>
<section id="main-container" class="main-container">
    <div class="container">

        <div class="row">
            <div class="col-lg-6">
                <h3 class="border-title mar-t0">ขั้นตอนการดำเนินงาน</h3>
                <p>วางเงินจองเพื่อเริ่มในการออกแบบบ้าน เป็นจำนวนเงิน 5,000 บาท </p>
                <div class="accordion accordion-group accordion-classic" id="construction-accordion">
                    <div class="card">
                        <div class="card-header p-0 bg-transparent" id="headingOne">
                            <h2 class="mb-0">
                                <button class="btn btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    ขั้นตอนการออกแบบแบ่งเป็น 3 ขั้นตอน
                                </button>
                            </h2>
                        </div>

                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#construction-accordion">
                            <div class="card-body">
                                <li>แบบแปลน</li>
                                <li>แบบ 3D</li>
                                <li>แบบขออนุญาติปลูกสร้าง</li>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header p-0 bg-transparent" id="headingTwo">
                            <h2 class="mb-0">
                                <button class="btn btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    การชำระค่าแบบจะแบ่งการชำระเป็น 3 งวด
                                </button>
                            </h2>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#construction-accordion">
                            <div class="card-body">
                                <li>1. เมื่อแบบแปลนแล้วเสร็จ ชำระ 30% ของราคาค่าแบบ</li>
                                <li>2. เมื่อแบบ 3D แล้วเสร็จ ชำระ 40% ของราคาค่าแบบ</li>
                                <li>3. เมื่อแบบขออนุญาติปลูกสร้างแล้วเสร็จ ชำระ 30% ของราคาค่าแบบ</li>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header p-0 bg-transparent" id="headingThree">
                            <h2 class="mb-0">
                                <button class="btn btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    หมายเหตุ
                                </button>
                            </h2>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#construction-accordion">
                            <div class="card-body">
                                การออกแบบขั้นตอนที่ 1 และ 2 สามารถออกแบบได้ 3 ครั้ง หากมีการปรับแบบเป็นครั้งที่ 4 จะคิดค่าบริการเพิ่มเป็นจำนวนครั้งละ 1000 บาท
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ Accordion end -->

                <div class="gap-40"></div>

                <h3 class="border-title">การดำเนินงานก่อสร้าง</h3>

                <div class="accordion accordion-group accordion-classic" id="safety-accordion">
                    <div class="card">
                        <div class="card-header p-0 bg-transparent" id="headingFour">
                            <h2 class="mb-0">
                                <button class="btn btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                                    แบ่งงวดงานการดำเนินงานก่อสร้างและการชำระเงินออกเป็น 8 งวด
                                </button>
                            </h2>
                        </div>

                        <div id="collapseFour" class="collapse show" aria-labelledby="headingFour" data-parent="#safety-accordion">
                            <div class="card-body">
                                <li>งวดที่ 1 ชำระ 10%</li>
                                <li>งวดที่ 2 ชำระ 15%</li>
                                <li>งวดที่ 3 ชำระ 20%</li>
                                <li>งวดที่ 4 ชำระ 15%</li>
                                <li>งวดที่ 5 ชำระ 10%</li>
                                <li>งวดที่ 6 ชำระ 15%</li>
                                <li>งวดที่ 7 ชำระ 10%</li>
                                <li>งวดที่ 8 ชำระ 5%</li>
                                <li></li>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">

                <h3 class="border-title">ระยะเวลาในการปลูกสร้างบ้าน</h3>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="column text-center">ลำดับ</th>
                            <th class="column sortable active asc text-center">รูปแบบ</th>
                            <th class="column sortable text-center">พื้นที่ใช้สอย</th>
                            <th class="column sortable text-center">ระยะเวลาในการปลูกสร้างบ้าน</th>
                        </tr>
                    </thead>
                    <thead></thead>
                    <th></th>
                    <tbody>
                        <tr>
                            <td class="text-center">1</td>
                            <td class="text-center">บ้านชั้นเดียว</td>
                            <td class="text-center">100-190 ตรม.</td>
                            <td class="text-center">7 เดือน</td>
                        </tr>
                        <tr>
                            <td class="text-center">2</td>
                            <td class="text-center">บ้านชั้นเดียว</td>
                            <td class="text-center">190-250 ตรม.</td>
                            <td class="text-center">12 เดือน</td>
                        </tr>
                        <tr>
                            <td class="text-center">3</td>
                            <td class="text-center">บ้านชั้นเดียว</td>
                            <td class="text-center">250 ตรม.ขึ้นไป</td>
                            <td class="text-center">14 เดือน</td>
                        </tr>
                        <tr>
                            <td class="text-center">4</td>
                            <td class="text-center">บ้านสองชั้น</td>
                            <td class="text-center">100-190 ตรม.</td>
                            <td class="text-center">8 เดือน</td>
                        </tr>
                        <tr>
                            <td class="text-center">5</td>
                            <td class="text-center">บ้านสองชั้น</td>
                            <td class="text-center">190-250 ตรม.</td>
                            <td class="text-center">12 เดือน</td>
                        </tr>
                        <tr>
                            <td class="text-center">6</td>
                            <td class="text-center">บ้านสองชั้น</td>
                            <td class="text-center">250 ตรม.ขึ้นไป</td>
                            <td class="text-center">14 เดือน</td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div><!-- Content row end -->

    </div><!-- Container end -->
</section><!-- Main container end -->

@endsection