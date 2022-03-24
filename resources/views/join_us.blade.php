@extends('master')

@section('content')
<div class="container-fluid">


    <div class="container p-5">
        <div class="card">
            <div class="card-header">
                <div class="text-center p-3">
                    <h2 class="text-muted">
                     
                        <h2>
                            <h2>ร่วมงานกับเรา</h2>
                            <hr width="20%" color="#ff6600" align="center">
                            <h5 class="card-title">Taweechai Perfect Builder Co.,Ltd.</h5>
                </div>

                <form role="form" method="post" action="/join_us" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="col-md-12">
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">ตำแหน่งที่ต้องการ</label>
                                    <select class="form-control" id="position" name="position" required>
                                        <option value="">กรุณาเลือก</option>
                                        <option value="วิศวกรโยธา">วิศวกรโยธา</option>
                                        <option value="เจ้าหน้าที่ธุรการ">เจ้าหน้าที่ธุรการ</option>
                                        <option value="ที่ปรึกษาการขาย">ที่ปรึกษาการขาย</option>
                                        <option value="สถาปนิก">สถาปนิก</option>
                                        <option value="โฟร์แมน">โฟร์แมน</option>
                                        <option value="โปรแกรมเมอร์">โปรแกรมเมอร์</option>
                                        <option value="เจ้าหน้าที่ฝ่ายจัดซื้อ">เจ้าหน้าที่ฝ่ายจัดซื้อ</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">เงินเดือนที่ต้องการ</label>
                                    <input type="text" class="form-control" placeholder="บาท/เดือน" id="salaryDesired" name="salaryDesired" required>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">ชื่อ</label>
                                    <input type="text" class="form-control" placeholder="First name" id="fritName" name="fritName" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">นามสกุล</label>
                                    <input type="text" class="form-control" placeholder="Last name" id="lastName" name="lastName" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">ชื่อเล่น</label>
                                    <input type="text" class="form-control" placeholder="Frist Name" id="nickName" name="nickName" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">เลขที่บัตรประจำตัวประชาชน</label>
                                    <input type="text" class="form-control" placeholder="ID card" id="idCard" name="idCard" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">เบอร์โทรติดต่อ</label>
                                    <input type="text" class="form-control" placeholder="tel" id="tel" name="tel" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">อีเมล</label>
                                    <input type="text" class="form-control" placeholder="Email" id="email" name="email" required>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">ที่อยู่บ้านเลขที่</label>
                                    <input type="text" class="form-control" placeholder="Home address" id="homeAddress" name="homeAddress" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">หมู่ที่</label>
                                    <input type="text" class="form-control" placeholder="Mu" id="mu" name="mu" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">ถนน</label>
                                    <input type="text" class="form-control" placeholder="Road" id="road" name="road">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">ตำบล/แขวง</label>
                                    <input type="text" class="form-control" placeholder="District / Province" id="tumbon" name="tumbon" required>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">อำเภอ</label>
                                    <input type="text" class="form-control" placeholder="District" id="district" name="district" required>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">จังหวัด</label>
                                    <input type="text" class="form-control" placeholder="Province" id="provice" name="provice" required>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">รหัสไปรษณีย์</label>
                                    <input type="text" class="form-control" placeholder="Zip code" id="zipCode" name="zipCode" required>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">วันเดือนปีเกิด</label>
                                    <input type="text" class="form-control" placeholder="ว/ด/ป" id="birth" name="birth" required>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">อายุ</label>
                                    <input type="text" class="form-control" placeholder="Age" id="age" name="age" required>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">เชื้อชาติ</label>
                                    <input type="text" class="form-control" placeholder="Race" id="race" name="race" required>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">สัญชาติ</label>
                                    <input type="text" class="form-control" placeholder="Nationality" id="nationality" name="nationality" required>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">ศาสนา</label>
                                    <input type="text" class="form-control" placeholder="Religion" id="religion" name="religion" required>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">ส่วนสูง</label>
                                    <input type="text" class="form-control" placeholder="Height" id="height" name="height" required>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">น้ำหนัก</label>
                                    <input type="text" class="form-control" placeholder="Weight" id="weight" name="weight" required>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">เพศ
                                    <label for="exampleFormControlSelect1"></label>
                                    <select class="form-control" id="sex" name="sex" required>
                                        <option value="">กรุณาเลือก</option>
                                        <option value="ชาย">ชาย</option>
                                        <option value="หญิง">หญิง</option>
                                        <option value="อื่นๆ">อื่นๆ</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">สถานะ
                                    <label for="exampleFormControlSelect1"></label>
                                    <select class="form-control" id="status" name="status" required>
                                        <option value="">กรุณาเลือก</option>
                                        <option value="โสด">โสด</option>
                                        <option value="มีแฟนเเล้ว">มีเเฟนเเล้ว</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="">portfolio<code>*</code> </label>
                            <input type="file" name="photo" class="form-control form-control-sm" autocomplete="off" required>
                        </div>
                        <div class="row text-center">
                            <div class="col-md-12">
                                <button class="btn btn-primary " type="submit">submit</button>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection