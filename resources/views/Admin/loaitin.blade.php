<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
  <link rel="stylesheet" href="{{asset('assets/clients/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/clients/css/style.css')}}">
</head>
<body>
   <div class="container">
     <h1>{{$title}}</h1>
     <a href="{{route('loaitin.add')}}" class="btn btn-primary">Thêm người dùng</a>
    <table class="table table-bordered">
        <thead>
            <tr>
             
                <th>Mã loại</th>
                <th>Tên loại</th>
            </tr>
        </thead>
        <tbody>
            @if(!empty($loaitinList))
             @foreach($loaitinList as $key =>$item)
             <tr>
                <td>{{$item->IDLoai}}</td>
                <td>{{$item->TenLoai}}</td>


             </tr>
             @endforeach

             @endif
        </tbody>
    </table>
   </div>
      <script src="{{asset('assets/clients/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/clients/js/custom.js')}}"></script>
</body>
   
</html>
