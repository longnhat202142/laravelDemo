@extends('admin.layout_admin')
@section('content')
<div class="title">
    <h3>Quản lý vai trò</h3>
</div>
<div class="border border-3 rounded" style="width: 95%;">
    <div class="container" style="margin-top: 10px">
        <nav class="navbar navbar-light">
            <div class="container-fluid">
                <form class="d-flex" action="{{ route('admin.vaitro') }}" method="get">
                  <input class="form-control me-2" name="text" type="search" placeholder="Search" aria-label="Search">
                  <button class="btn btn-outline-success"type="submit">Search</button>
                </form>
                @can('admin.VaiTro.getAdd')
                    <a href="{{ route('admin.VaiTro.getAdd')}}" class="btn btn-outline-primary mb-3">Bổ sung</a>
                @endcan
                
            </div>
            @if (!empty($text))
                <p style="margin-top: 5px">Từ khóa tìm kiếm: <strong>{{$text}}</strong></p>
            @endif
        </nav>
        <div>
        </div>
        <table class="table table-bordered" style="width: 107%;max-width: 107%; margin: 10px -45px ">
            <thead>
                <tr class="table-head">
                    <th>STT</th>
                    <th>Vai trò</th>
                    <th>Trạng thái</th>
                    <th>Ngày tạo</th>
                    <th>Ngày cập nhật</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                
                @if(!empty($vaitroList))
                    @foreach ($vaitroList as $item)
                        <tr>
                            <td>{{$stt++}}</td>
                            <td>{{$item->VaiTro}}</td>
                            <td>
                            @if ($item->TrangThai == 1)
                                <label class="border border-2 rounded-2" style="background-color: green; color: aliceblue;font-weight: 600; font-size: xx-small; padding: 4px">Active</label>
                            @else
                                <label class="border border-2 rounded-2" style="background-color: rgb(181, 11, 11); color: aliceblue;font-weight: 600; font-size: xx-small; padding: 5px">Inactive</label>  
                            @endif
                            </td>
                            <td>{{$item->NgayTao}}</td>
                            <td>{{$item->NgayCapNhat}}</td>
                            <td class="actions" style="display: flex">
                                @can('admin.VaiTro.Delete')
                                    <a href="{{ route('admin.VaiTro.Delete', [$item->IDVaiTro]) }}" class="btn btn-outline-danger text-decoration-none" onclick="return confirm('Xóa bài viết ?');"><i class="fa-regular fa-trash-can"></i></a>
                                @endcan
                                @can('admin.VaiTro.Edit')
                                    <a href="{{ route('admin.VaiTro.Edit', [$item->IDVaiTro]) }}" class="btn btn-outline-info text-decoration-none"><i class="fa-regular fa-pen-to-square"></i></a>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>   
        </table>
        @if ($vaitroList->isEmpty())
                    <div class="alert alert-danger" style="text-align: center" role="alert">
                        Dữ liệu không tồn tại!
                    </div>
        @endif
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>
@endsection
