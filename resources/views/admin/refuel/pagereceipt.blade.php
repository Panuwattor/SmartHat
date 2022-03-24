<div id="billing">
    <div class="card-body pt-3 pb-0">
        <div class="row">
            <div class="col-sm-2 text-center">
                <img class="profile-user-img img-fluid img-circle w-100" src="{{ asset('/logo.jpg') }}" alt="User profile picture">
            </div>
            <div class="col-sm-6 font-head">
                <h3>บริษัท ทวีชัย คอนกรีต โปรดักส์ จำกัด</h3>
                <p>160 หมู่ที่ 1 ตำบลบัวหุ่ง อำเภอราษีไศล จังหวัดศรีสะเกษ โทร #: 0973431257 เลขประจำตัวผู้เสียภาษี: 0305560006359</p>
            </div>
            <div class="col-sm-4">
                <div style="text-align: right;">
                    <h3 class="lead"><b>ใบเสร็จรับเงิน</b></h3>
                </div>
                <div style="text-align: right;">
                    <span class="text-muted text-sm"><b>เลขที่ OR-{{$receipt->id + 10000}}</b></span><br>
                    <span class="text-muted text-sm"><b>วันที่ {{$receipt->date->format('Y-m-d')}}</b></span>
                </div>
            </div>
        </div>

        <div class="row mt-2">
            <div class="col-6">
                <div style="border-radius: 5px; border: 1px solid #dee2e6; padding: 10px;">
                    <ul class="ml-4 mb-0 fa-ul font-content">
                        <li>ผู้ออกบิล #: {{$receipt->billing->user->name}} </li>
                        <li>โทร #: 0973431257 </li>
                        <li>เลขประจำตัวผู้เสียภาษี: 0305560006359</li>
                    </ul>
                </div>
            </div>
            <div class="col-6">
                <div style="border-radius: 5px; border: 1px solid #dee2e6; padding: 10px;">
                    <span><b>ข้อมูลลูกค้า</b></span>
                    <ul class="ml-4 mb-0 fa-ul">
                        <li class="mt-2 font-content">ลูกค้า : {{$receipt->billing->note}}</li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-2"></div>
        </div>
    </div>
    <div class="card-footer">
        <div class="card invoice p-1 mb-1">
            <div class="row" style="font-weight: normal;">
                <div class="col-12 table-responsive">
                    <table class="table table-bordered font-content" style="margin-bottom: 5px;">
                    <thead>
                        <tr class="text-center">
                        <th>#</th>
                        <th>ใบวางบิล</th>
                        <th>ถัง</th>
                        <th>ประเภทรถ</th>
                        <th>หมายเหตุ</th>
                        <th>จำนวน</th>
                        <th>ราคา/หน่วย</th>
                        <th>รวม</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($receipt->billings as $billing)
                        @foreach($billing->refuels as $on=>$refuel)
                        <tr class="text-center">
                        <td> {{$on+1}}</td>
                        <td> {{$billing->name}}</td>
                        <td>{{$refuel->tank->name}}</td>
                        <td>@if($refuel->carType == 1 ) รถภายใน </br> {{$refuel->car ? $refuel->car->name : '-'}} @elseif($refuel->carType == 2) รถในเครือ </br>{{$refuel->group ? $refuel->group->name : '-'}}@else รถภายนอก @endif</td>
                        <td>{{$refuel->note}}</td>
                        <td>{{number_format($refuel->amount,2)}}</td>
                        <td>{{number_format($refuel->price,2)}}</td>
                        <td class="text-right">{{number_format($refuel->priceTotal,2)}}</td>
                        </tr>
                        @endforeach
                        @endforeach
                    </tbody>
                        
                        <tbody>
                            <tr class="text-center">
                                <th style="padding: 3px;"  colspan="7">ราคารวม</th>
                                <th style="padding: 3px;" class="text-center">{{number_format($receipt->billings->sum('priceTotal'), 2)}}</th>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="col-6 text-center font-content">
                    <div>
                        <br>
                        <span>ลงชื่อ................................................ลูกค้า</span><br>
                        <span>(................................................)</span><br>
                        <span>วันที่____/______/_______</span><br><br>
                    </div>
                </div>
                <div class="col-6 text-center font-content" style="padding: 0px ">
                    <div>
                        <br>
                        <span>ลงชื่อ................................................ผู้ส่ง</span><br>
                        <span>(................................................)</span><br>
                        <span>วันที่____/______/_______</span><br><br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
