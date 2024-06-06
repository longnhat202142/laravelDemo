@extends('admin.layout_admin')
@section('danhmuc')
<div class="title">
    <h3>Quản lý danh mục</h3>
</div>
<div class="border border-3 rounded">
    <div class="container" style="margin-top: 10px">
        <nav class="navbar navbar-light">
            <div class="container-fluid">
                <form class="d-flex" action="{{ route('danhmuc') }}" method="get">
                  <input class="form-control me-2" name="text" type="search" placeholder="Search" aria-label="Search">
                  <button class="btn btn-outline-success"type="submit">Search</button>
                </form>
                <a href="{{ route('DanhMuc.getAdd')}}" class="btn btn-outline-primary mb-3">Bổ sung</a>
            </div>
            @if (!empty($text))
                <p style="margin-top: 5px">Từ khóa tìm kiếm: <strong>{{$text}}</strong></p>
            @endif
        </nav>
        <div>
        </div>
        <table class="table table-bordered" style="width: 100%">
            <thead>
                <tr class="table-head">
                    <th>STT</th>
                    <th>Thứ tự hiển thị</th>
                    <th>Tiêu đề</th>
                    <th>Mã danh mục</th>
                    <th>Người tạo</th>
                    <th>Ngày tạo</th>
                    <th>Người cập nhật</th>
                    <th>Ngày cập nhật</th>
                    <th>Danh mục cha</th>
                    <th>Trạng thái</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                
                @if(!empty($danhmucList))
                    @foreach ($danhmucList as $item)
                        <tr>
                            <td>{{$stt++}}</td>
                            <td>{{$item->ThuTuHienThi}}</td>
                            <td>{{$item->TieuDe}}</td>
                            <td>{{$item->MaDanhMuc}}</td>
                            <td>{{$item->IdNguoiTao}}</td>
                            <td>{{$item->NgayTao}}</td>
                            <td>{{$item->IdNguoiCapNhat}}</td>
                            <td>{{$item->NgayCapNhat}}</td>
                            <td>{{($item->IDCha > 0) ? $item->TieuDe: "" }}</td>
                            <td>{{$item->TrangThai}}</td>
                            <td class="actions" style="display: flex">
                                <a href="{{ route('DanhMuc.Edit', [$item->IDDanhMuc]) }}" class="btn btn-outline-info text-decoration-none"><i class="fa-regular fa-pen-to-square"></i></a>
                                <a href="{{ route('DanhMuc.Delete', [$item->IDDanhMuc]) }}" class="btn btn-outline-danger text-decoration-none" onclick="return confirm('Xóa bài viết ?');"><i class="fa-regular fa-trash-can"></i></a>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>   
        </table>
        @if ($danhmucList->isEmpty())
                    <div class="alert alert-danger" style="text-align: center" role="alert">
                        Dữ liệu không tồn tại!
                    </div>
        @endif
    </div>
</div>
<script>
   
</script>
@endsection
