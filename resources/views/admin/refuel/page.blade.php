<page size="A4" id="billing" class="header-padding">
      <div id="billing" class="mt-5">
        <div class="card-body pt-0 pb-0">
            <div class="row">
                <div class="col-sm-2 text-center">
                    <img class="profile-user-img img-fluid img-circle w-100" src="{{ asset('/logo.jpg') }}" alt="User profile picture">
                </div>
                <div class="col-sm-7 font-head">
                    <h3>บริษัท ทวีชัย คอนกรีต โปรดักส์ จำกัด</h3>
                    <p>160 หมู่ที่ 1 ตำบลบัวหุ่ง อำเภอราษีไศล จังหวัดศรีสะเกษ โทร #: 0973431257 เลขประจำตัวผู้เสียภาษี: 0305560006359</p>
                </div>
                <div class="col-sm-3">
                    <div style="text-align: right;">
                        <span class="text-muted text-sm"><b>ใบวางบิล เลขที่ {{$billing->name}}</b></span><br>
                        <span class="text-muted text-sm"><b>วันที่ {{$billing->date}}</b></span>
                    </div>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-6">
                    <div style="border-radius: 5px; border: 1px solid #dee2e6; padding: 10px;">
                        <ul class="ml-4 mb-0 fa-ul font-content">
                            <li>ผู้ออกบิล #: {{$billing->user->name}} </li>
                            <li>โทร #: 0973431257 </li>
                            <li>เลขประจำตัวผู้เสียภาษี: 0305560006359</li>
                        </ul>
                    </div>
                </div>
                <div class="col-6">
                    <div style="border-radius: 5px; border: 1px solid #dee2e6; padding: 10px;">
                        <span><b>ข้อมูลลูกค้า <a href="javascript:void(0)"><i class="fa fa-edit i-no-print" data-toggle="modal" data-target="#modal-default"></i></a></b></span>
                        <ul class="ml-4 mb-0 fa-ul">
                            <li class="mt-2 font-content">ลูกค้า : {{$billing->note}}</li>
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
                                <th>ถัง</th>
                                <th>ประเภทรถ</th>
                                <th>หมายเหตุ</th>
                                <th>จำนวน</th>
                                <th>ราคา/หน่วย</th>
                                <th>รวม</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach($billing->refuels as $on=>$refuel)
                              <tr class="text-center">
                                <td> {{$on+1}}</td>
                                <td>{{$refuel->tank->name}}</td>
                                <td>@if($refuel->carType == 1 ) รถภายใน </br> {{$refuel->car ? $refuel->car->name : '-'}} @elseif($refuel->carType == 2) รถในเครือ </br>{{$refuel->group ? $refuel->group->name : '-'}}@else รถภายนอก @endif</td>
                                <td>{{$refuel->note}}</td>
                                <td>{{number_format($refuel->amount,2)}}</td>
                                <td>{{number_format($refuel->price,2)}}</td>
                                <td class="text-right">{{number_format($refuel->priceTotal,2)}}</td>
                              </tr>
                              @endforeach
                            </tbody>
                            <tbody>
                                <tr class="text-center">
                                    <th colspan="4">รวมทั้งสิ้น</th>
                                    <th colspan="2">{{thaibaht(number_format($billing->priceTotal, 2,'.',''))}} </th>
                                    <th class="text-right">{{number_format($billing->priceTotal, 2)}}</th>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="col-4 text-center font-content">
                        <div style="border-radius: 5px; border: 1px solid #dee2e6;">
                            <br>
                            <hr style="margin-left: 5px; margin-right: 5px; margin-bottom: 0px;">
                            <span>ผู้รับวางบิล</span><br>
                            <span style="color: gray;">วันที่ ____/______/_______</span>
                            <br>
                            <br>
                        </div>
                    </div>
                    <div class="col-4 text-center font-content" style="padding: 0px">
                        <div style="border-radius: 5px; border: 1px solid #dee2e6;">
                            <br>
                            <hr style="margin-left: 5px; margin-right: 5px; margin-bottom: 0px; visibility: hidden;">
                            <span style="color: gray;">____/______/_______</span><br>
                            <span>วันที่นัดชำระ</span>
                            <br>
                            <br>
                        </div>
                    </div>
                    <div class="col-4 text-center font-content">
                        <div style="border-radius: 5px; border: 1px solid #dee2e6;">
                            <br>
                            <hr style="margin-left: 5px; margin-right: 5px; margin-bottom: 0px;">
                            <span>ผู้วางบิล</span><br>
                            <span style="color: gray;">วันที่ ____/______/_______</span>
                            <br>
                            <br>
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
            </div>
        </div>
    </div>

    <form action="/billing/admin/refuel/new/update_note/{{$billing->id}}" method="post">
        {{ csrf_field() }}
        <div class="modal fade" id="modal-default">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">ข้อมูลลูกค้า</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        ข้อมูลลูกค้า
                        <textarea type="text" class="form-control" id="note" rows="4" name="note">{{$billing->note}}</textarea>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
      </page>