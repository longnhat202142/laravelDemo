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
                <th width="5%">Sửa </th>
                <th width="5%">Xoá </th>
            </tr>
        </thead>
        <tbody>
            @if(!empty($loaitinList))
             @foreach($loaitinList as $key =>$item)
             <tr>
                <td>{{$item->IDLoai}}</td>
                <td>{{$item->TenLoai}}</td>
                <td>
                    <a href="{{route('loaitin.edit',[$item->IDLoai])}}" class="btn btn-warning btn-sm">Sửa</a>
                </td>

                 <td>
                    <a href="#" class="btn btn-danger btn-sm">Xoá</a>
                </td>
             </tr>
             @endforeach
             @else
             <tr>
                <td coldspan="4">Không có người dùng</td>
             </tr>
             @endif
        </tbody>
    </table>
   </div>
      <script src="{{asset('assets/clients/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/clients/js/custom.js')}}"></script>
</body>
   
</html>
