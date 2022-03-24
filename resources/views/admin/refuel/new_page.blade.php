<div class="card-body">
    <div>
        <span class="text-muted text-sm"><b>ใบวางบิล เลขที่ {{$billings->first()->name}}</b></span><br>
        <span class="text-muted text-sm"><b>วันที่ {{$billings->first()->date}}</b></span>
    </div>

    <div style="border-radius: 2px; border: 1px solid #dee2e6; padding: 10px;">
        <span>ผู้ออกบิล #: {{$billings->first()->user->name}} </span>
        <br>
        <span>โทร #: 0973431257 </span>
        <br>
        <span>เลขประจำตัวผู้เสียภาษี: 0305560006359</span>
    </div>

    <div style="border-radius: 2px; border: 1px solid #dee2e6; padding: 5px;">
        <span><b>ข้อมูลลูกค้า <a href="javascript:void(0)"><i class="fa fa-edit i-no-print" data-toggle="modal" data-target="#modal-default"></i></a></b></span>
        <ul class="ml-4 mb-0 fa-ul">
            <li class="mt-2 font-content">ลูกค้า : {{$billings->first()->note}}</li>
        </ul>
    </div>

    <form action="/billing/admin/refuel/new/update_note/{{$billings->first()->id}}" method="post">
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
                        <textarea type="text" class="form-control" id="note" rows="4" name="note">{{$billings->first()->note}}</textarea>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <div class="table-responsive">
        <table class="table table-bordered font-content" style="font-size: 12px;">
            <thead>
                <tr class="text-center">
                    <th>#</th>
                    <th>ถัง</th>
                    <th>ประเภท</th>
                    <th>หมายเหตุ</th>
                    <th>จำนวน</th>
                    <th>ราคา</th>
                    <th>รวม</th>
                </tr>
            </thead>
            <tbody>
                @foreach($billings as $billing)
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
                @endforeach
            </tbody>
            <tbody>
                <tr class="text-center">
                    <th colspan="4">รวมทั้งสิ้น</th>
                    <th colspan="2">{{thaibaht(number_format($billings->sum('priceTotal'), 2,'.',''))}} </th>
                    <th class="text-right">{{number_format($billings->sum('priceTotal'), 2)}}</th>
                </tr>
            </tbody>
        </table>
    </div>
</div>