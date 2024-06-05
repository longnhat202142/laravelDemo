@extends('admin.layout_admin')
@section('menu')

<div class="container">
    @if (Session::has('thongbao'))
        <div class="arlert arlert-success">
            {{Session::get('thongbao')}}
        </div>
    
    @endif
<div>
<div class="title">
    <h3>Quản lý Menu</h3>
</div>
<div class="border border-3 rounded">
    <div class="container" style="margin-top: 10px">
        <nav class="navbar navbar-light">
            <div class="container-fluid">
                <form class="d-flex">
                  <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                  <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
                <a href="#" class="btn btn-outline-primary mb-3">Bổ sung</a>
            </div>
          </nav>
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
</div>
@endsection