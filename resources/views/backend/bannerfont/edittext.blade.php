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

</div>
<h3 class="text-center"> slideshowfont pagewebsite</h3>
<div class="card-body">

    <div class="col-md-3"></div>
</div>

<form action="/admin/Bannerandfont/updatetextup/{{$slidefont->id}}" method="post" enctype="multipart/form-data" onsubmit="return confirm('ยืนยันเพิ่มผลงานของเรา ?')">
    @csrf
    <div class="card-body">

        <div class="form-group">
            <label for="">Type</label>
            <select name="type" class="form-control" required>
                <option value="">select</option>
                <option value="text_small" @if($slidefont->type == "text_small") selected @endif>text_small</option>
                <option value="text_normal" @if($slidefont->type == "text_normal") selected @endif>text_normal</option>
                <option value="text_large" @if($slidefont->type == "text_large") selected @endif>text_large</option>
                <option value="button" @if($slidefont->type == "button") selected @endif>button</option>
                <option value="button_outline" @if($slidefont->type == "button_outline") selected @endif>button_outline</option>
            </select>
        </div>

        <div class="form-group">
            <label for="exampleFormControlTextarea1">note<code>*</code></label>
            <input type="text" class="form-control" name="note" required value="{{$slidefont->note}}"><br>


        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">link<code>*</code></label>
            <input type="text" class="form-control" name="link" value="{{$slidefont->link}}"><br>

            <button class="btn btn-success pull-right" type="submit">บันทึก</button>
        </div>
</form>



<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>