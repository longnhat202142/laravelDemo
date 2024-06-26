@extends('admin.layout_admin')
@section('content')
<div class="title">
    <h3>Quản lý danh mục</h3>
</div>
<div class="border border-3 rounded" style="width: 95%;">
    <div class="container" style="margin-top: 10px">
        <nav class="navbar navbar-light">
            <div class="container-fluid">
                <form class="d-flex" action="{{ route('admin.danhmuc') }}" method="get">
                  <input class="form-control me-2" name="text" type="search" placeholder="Search" aria-label="Search">
                  <button class="btn btn-outline-success"type="submit">Search</button>
                </form>
                @can('admin.DanhMuc.getAdd')
                    <a href="{{ route('admin.DanhMuc.getAdd')}}" class="btn btn-outline-primary mb-3">Bổ sung</a>
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
                            <td>
                                @if ($item->IDCha != 0)
                                <span style="font-weight: 600; font-size: 12px;color: #983013">
                                    {{DB::table('danhmuc')->where('IDDanhMuc',$item->IDCha)->value('TieuDe') }}
                                </span>
                                @else
                                    <span style="font-weight: 600; font-size: 12px;color: #134098">----------</span>
                                @endif
                            </td>
                            <td>{{$item->TrangThai}}</td>
                            <td class="actions" style="display: flex">
                                @can('admin.DanhMuc.Delete')
                                    <a href="{{ route('admin.DanhMuc.Delete', [$item->IDDanhMuc]) }}" class="btn btn-outline-danger text-decoration-none" onclick="return confirm('Xóa bài viết ?');"><i class="fa-regular fa-trash-can"></i></a>
                                @endcan
                                @can('admin.DanhMuc.Edit')
                                   <a href="{{ route('admin.DanhMuc.Edit', [$item->IDDanhMuc]) }}" class="btn btn-outline-info text-decoration-none"><i class="fa-regular fa-pen-to-square"></i></a>
                                @endcan
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
