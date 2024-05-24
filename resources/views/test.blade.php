@extends('admin.layout_admin')
@section('content')
<div class="title">
    <h3>Quản lý Thông báo</h3>
</div>
<div class="border border-3 rounded">
    <div class="container" style="margin-top: 10px">
        <nav class="navbar navbar-light">
            <div class="container-fluid">
                <form class="d-flex">
                  <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                  <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
                <a href="{{ route('admin.add')}}" class="btn btn-outline-primary mb-3">Bổ sung</a>
            </div>
          </nav>
        <table class="table table-bordered">
            <thead>
                <tr class="table-head">
                    <th>MaDanhMuc</th>
                    <th>TieuDe</th>
                    <th>ThuTuHienThi</th>
                    <th>TrangThai</th>
                    <th>Video</th>
                    <th>Anh</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($query as $key=>$item)
                <tr>
                    <td>{{$item->MaDanhMuc}}</td>
                    <td>{{$item->TieuDe}}</td>
                    <td>{{$item->ThuTuHienThi}}</td>
                    <td>{{$item->TrangThai}}</td>
                    <td>{{$item->Video}}</td>
                    <td>{{$item->Anh}}</td>
                    <td class="actions">
                        <a href="{{ route('admin.add')}}" class="btn btn-outline-info text-decoration-none"><i class="fa-regular fa-pen-to-square"></i></a>
                        <a href="#" class="btn btn-outline-warning text-decoration-none"><i class="fa-regular fa-eye"></i></a>
                        <a href="#" class="btn btn-outline-danger text-decoration-none"><i class="fa-regular fa-trash-can"></i></a>
                    </td>
                </tr>
            @endforeach
                <!-- Repeat similar rows as needed -->
            </tbody>
        </table>
    </div>
</div>
@endsection

    