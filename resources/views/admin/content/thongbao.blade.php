@extends('admin.layout_admin')
@section('thongbao')
<div class="title">
    <h3>Quản lý thông báo và tin tức</h3>
</div>
<div class="border border-3 rounded">
    <div class="container" style="margin-top: 10px">
        <nav class="navbar navbar-light">
            <div class="container-fluid">
                <form class="d-flex" action="{{ route('thongbao') }}" method="get">
                  <input class="form-control me-2" name="text" type="search" placeholder="Search" aria-label="Search">
                  <button class="btn btn-outline-success"type="submit">Search</button>
                </form>
                <a href="{{ route('ThongBao.getAdd')}}" class="btn btn-outline-primary mb-3">Bổ sung</a>
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
                    <th>Tiêu đề</th>
                    <th>Mã tin</th>
                    <th>Người tạo</th>
                    <th>Ngày tạo</th>
                    <th>Người cập nhật</th>
                    <th>Ngày cập nhật</th>
                    <th>Danh mục</th>
                    <th>Loại tin</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                
                @if(!empty($thongbaoList))
                    @foreach ($thongbaoList as $item)
                        <tr>
                            <td>{{$stt++}}</td>
                            <td>{{$item->TieuDe}}</td>
                            <td>{{$item->MaTinTuc}}</td>
                            <td>{{DB::table('users')->where('id',$item->IDNguoiTao)->value('name')}}</td>
                            <td>{{$item->NgayTao}}</td>
                            <td>{{DB::table('users')->where('id',$item->IDNguoiCapNhat)->value('name')}}</td>
                            <td>{{$item->NgayCapNhat}}</td>
                            <td>{{DB::table('danhmuc')->where('IDDanhMuc',$item->IDDanhMuc)->value('TieuDe')}}</td>
                            <td>{{($item->IDLoai == 1)?"Thông báo":"Tin tức"}}</td>
                            <td class="actions" style="display: flex">
                                <a href="{{ route('ThongBao.Edit', [$item->IDTinTuc]) }}" class="btn btn-outline-info text-decoration-none"><i class="fa-regular fa-pen-to-square"></i></a>
                                {{-- <a href="{{ route('thongbao', ['id'=>$item->IDTinTuc]) }}" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                    <i class="fa-regular fa-eye"></i>
                                </a>     --}}
                                <a href="{{ route('ThongBao.Delete', [$item->IDTinTuc]) }}" class="btn btn-outline-danger text-decoration-none" onclick="return confirm('Xóa bài viết ?');"><i class="fa-regular fa-trash-can"></i></a>
                                {{-- modal --}}
                                
                                {{-- <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-xl modal-dialog-scrollable">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="staticBackdropLabel">{{($id!=NULL) ? $id: ""}}</h5>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                        ddđ
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                         </div>
                                      </div>
                                    </div>
                                  </div> --}}
                                {{-- end modal --}}
                                
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
</div>
<script>
   
</script>
@endsection
