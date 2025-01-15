<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2> Xác nhận email </h2>
    <p> Click vào nút sau để xác nhận email: </p>
    <form action="{{route('dangky.store')}}" method="post">
        <input type="hidden" name="token" value="{{csrf_token()}}">
        <input type="hidden" name="password" value="{{$data['password']}}">
        <input type="hidden" name="ten" value="{{$data['ten']}}">
        <input type="hidden" name="email" value="{{$data['email']}}">
        <button type="submit"> Xác nhận </button>
    </form>
</body>

</html>