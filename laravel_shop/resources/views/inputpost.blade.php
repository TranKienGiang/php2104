<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
</head>
<body>
    <form method="POST" action="/demopost">
        @csrf  
        <label class="form-label">Nhập Tên</label><br>
        <input required class="form-control" name="fname" type="input"></imput><br>
        <label class="form-label">Nhập Tuổi</label><br>
        <input required class="form-control" name="fage" type="input"></imput><br>
        <label class="form-label">Nhập Địa Chỉ</label><br>
        <input required class="form-control" name="faddress" type="input"></imput><br>
        <br>
        <button class="btn btn-primary" type="submit" >Submit</button>

    </form>
    <style type="text/css">
        form {
            margin: 24px;
        }
    </style>

</body>
</html>