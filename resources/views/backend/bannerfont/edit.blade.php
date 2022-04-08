<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>


    <form id="app" v-cloak action="/admin/Bannerandfont/edit/{{$slide->id}}" method="post" enctype="multipart/form-data" onsubmit="return confirm('ยืนยันเพิ่มผลงานของเรา ?')">
        @csrf
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Number for edit<code>*</code></label>
                            <input type="number" class="form-control" name="number" required value="{{$slide->number}}">
                        </div>
                        <div class="form-group">
                            <th>
                                <label for="exampleFormControlTextarea1"><code>รูปภาพที่ต้องการเปลี่ยน</code></label>
                                <input type="file" name="photo">
                            </th>
                        </div><br>

                        <div class="form-group">
                            <th>
                                <label for="exampleFormControlTextarea1"><code>เเก้ไขข้อความ</code></label>
                                <input type="text" class="form-control" name="note" required value="{{$slide->note}}">
                            </th>
                        </div>


                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">font style for edit<code>*</code></label>
                            <select name="font_style" class="form-control" required>

                                <option value="left" @if($slide->font_style == 'left') selected @endif >left</option>
                                <option value="center" @if($slide->font_style == 'center') selected @endif>center</option>
                                <option value="right" @if($slide->font_style == 'right') selected @endif>right</option>

                            </select>
                        </div>
                        <br>
                        <button class="btn btn-danger pull-left" type="delete">ลบทั้งหมด</button>
                        <button class="btn btn-success pull-right" type="submit">บันทึก</button>

                    </div>
                    <div class="card-body">
                        <table>
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>type</th>
                                    <th>note</th>
                                    <th>link</th>
                                    <th>แก้ไข</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($slide->fonts as $font)

                                <tr>
                                    <td>{{$font->id}}</td>
                                    <td>{{$font->type}}</td>
                                    <td>{{$font->note}}</td>
                                    <td>{{$font->link}}</td>
                                    <td>ลิ้งค์</td>
                                </tr>
                            </tbody>

                            @endforeach


                    </div>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>

    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>