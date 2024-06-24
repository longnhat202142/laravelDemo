@extends('admin.layout_admin')
@section('content')
<div class="title">
    <h3>Quản lý thông báo và tin tức</h3>
</div>
<div class="border border-3 rounded" style="width: 95%;">
    <div class="container" style="margin-top: 10px">
        <nav class="navbar navbar-light">
            <div class="container-fluid">
                <form class="d-flex" action="{{ route('admin.thongbao') }}" method="get">
                  <input class="form-control me-2" name="text" type="search" placeholder="Search" aria-label="Search">
                  <button class="btn btn-outline-success"type="submit">Search</button>
                  <div style="margin-left: 10px; width: 65%">
                    <select name="IDLoai" id="IDLoai" class="form-control">
                        <option value="0">--- Loại tin ---</option>
                        @foreach ($loaitin as $item)
                            <option value="{{$item->IDLoai}}">{{$item->TenLoai}}</option>
                        @endforeach
                    </select>
                  </div>
                </form>
                @can('admin.ThongBao.getAdd')
                    <a href="{{ route('admin.ThongBao.getAdd')}}" class="btn btn-outline-primary mb-3">Bổ sung</a>
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
                    <th>Tiêu đề</th>
                    <th>Ảnh</th>
                    <th>Mã tin</th>
                    <th>Người tạo</th>
                    <th>Ngày tạo</th>
                    <th>Người cập nhật</th>
                    <th>Ngày cập nhật</th>
                    <th>Danh mục</th>
                    <th>Loại tin</th>
                    <th>Trạng thái</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                
                @if(!empty($thongbaoList))
                    @foreach ($thongbaoList as $item)
                        <tr>
                            <td>{{$stt++}}</td>
                            <td>{{$item->TieuDe}}</td>
                            <td><img src="{{!empty($item->Anh) ? asset('public/storage/AnhDaiDien/' . $item->Anh) : 'https://duonganh.com.vn/en/admin/assets/images/404.png' }}" style="max-width: 100px; max-height: 100px" alt="Ảnh đại diện"></td>
                            <td>{{$item->MaTinTuc}}</td>
                            <td>{{DB::table('users')->where('id',$item->IDNguoiTao)->value('name')}}</td>
                            <td>{{$item->NgayTao}}</td>
                            <td>{{DB::table('users')->where('id',$item->IDNguoiCapNhat)->value('name')}}</td>
                            <td>{{$item->NgayCapNhat}}</td>
                            <td>{{DB::table('danhmuc')->where('IDDanhMuc',$item->IDDanhMuc)->value('TieuDe')}}</td>
                            <td>{{($item->IDLoai == 1)?"Thông báo":"Tin tức"}}</td>
                            <td>
                                @if ($item->NgayTao == now())
                                    <label class="border border-2 rounded-2" style="background-color: rgb(138, 136, 9); color: aliceblue;font-weight: 600; font-size: xx-small; padding: 4px">Tin mới</label>
                                @endif
                                @if ($item->TinNong == 1)
                                    <label class="border border-2 rounded-2" style="background-color: rgb(217, 103, 9); color: aliceblue;font-weight: 600; font-size: xx-small; padding: 4px">Tin nóng</label>
                               @endif
                               @if ($item->TrangThai == 1)
                                   <label class="border border-2 rounded-2" style="background-color: green; color: aliceblue;font-weight: 600; font-size: xx-small; padding: 4px">Active</label>
                               @else
                                   <label class="border border-2 rounded-2" style="background-color: rgb(181, 11, 11); color: aliceblue;font-weight: 600; font-size: xx-small; padding: 5px">Inactive</label>  
                               @endif
                            </td>
                            <td class="actions" style="display: flex">
                                @can('admin.ThongBao.Edit', $item)
                                    <a href="{{ route('admin.ThongBao.Edit', [$item->IDTinTuc]) }}" class="btn btn-outline-info text-decoration-none">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </a>
                                @endcan
                                
                                @can('admin.ThongBao.Delete', $item)
                                    <a href="{{ route('admin.ThongBao.Delete', [$item->IDTinTuc]) }}" class="btn btn-outline-danger text-decoration-none" onclick="return confirm('Xóa bài viết ?');">
                                        <i class="fa-regular fa-trash-can"></i>
                                    </a>
                                @endcan
                           </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>   
        </table>
        @if ($thongbaoList->isEmpty())
                    <div class="alert alert-danger" style="text-align: center" role="alert">
                        Dữ liệu không tồn tại!
                    </div>
        @endif
    </div>
    
   {{$pag->appends(request()->all())->links()}}
    </div>
<script>
   
</script>
@endsection
