<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <div class="container-fluid px-4">
                   
    <form action="{{ route('caculater') }}" method="post">
        @csrf
    <div class="mb-3">
    <label for="" class="from-lable">Nhập số thứ nhất</label>
    <input type="number" name="number1" class="form-control" >
    </div>
    <div class="mb-3">
        <label for="">Phép tính</label>
        <select name="calculation" id="" class="form-control">
            <option value="+">Cộng</option>
            <option value="-">Trừ</option>
            <option value="*">Nhân</option>
            <option value="/">Chia</option>
        </select>
    </div>
        <div class="mb-3">
            <label for="" class="from-lable">Nhập số thứ hai</label>
            <input type="number" name="number2" class="form-control" >
        </div>
        <button type="submit" class="btn btn-primary">Tính</button>

        </form>
    </div>
        @if(isset($result))
<p>Kết quả là: {{ $result }}</p>
@endif
</body>
</html>