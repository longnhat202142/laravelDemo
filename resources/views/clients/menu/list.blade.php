
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />


<link rel="stylesheet" href="{{asset('assets/clients/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/clients/css/style.css')}}">
</head>
<body>
<h1>{{$title}}</h1>

<div class="container">
    @if (Session::has('thongbao'))
        <div class="arlert arlert-success">
            {{Session::get('thongbao')}}
        </div>
    
    @endif
<div>
    <a href="{{route('menu.create')}}" class="btn btn-primary float-end">Thêm</a>
</div>
<table class="table table-bordered">
    <thead>
        <tr>
            <th width="5%">ID menu</th>
            <th>Tiêu Đề </th>
            <th>Trạng Thái </th>
            <th>Liên Kết </th>
            <th>Thao tác</th>
        </tr>
    </thead>
    <tbody>
        @if(!empty($menu))
       
        @foreach ( $menu as $item )
        <tr>
            <td>{{$item->IDMenu}}</td>
            <td>{{$item->TieuDe}}</td>
            <td>{{$item->TrangThai}}</td>
            <td>{{$item->LienKet}}</td>
            <td>
                <form action="{{route('menu.destroy',$item->IDMenu)}}" method="POST">
                    <a href="{{route('menu.edit',$item->IDMenu)}}" class="btn btn-info">Sửa</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Xóa</button>
                </form>
            </td>
        </tr>
        @endforeach
       @endif
        
    </tbody>
</table>
</div>

</body>
</html>
