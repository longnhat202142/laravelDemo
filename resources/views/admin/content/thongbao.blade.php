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
                    <th>STT</th>
                    <th>Tên thông báo</th>
                    <th>Thời điểm tạo</th>
                    <th>Người tạo</th>
                    <th>Chuyên mục</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Kết quả sơ tuyển đề xuất đề tài cấp Bộ học Kỳ 1</td>
                    <td>11-03-2024</td>
                    <td>Adminitr</td>
                    <td>Khoa học công nghệ</td>
                    <td class="actions">
                        <a href="{{ route('admin.add')}}" class="btn btn-outline-info text-decoration-none"><i class="fa-regular fa-pen-to-square"></i></a>
                        <a href="#" class="btn btn-outline-warning text-decoration-none"><i class="fa-regular fa-eye"></i></a>
                        <a href="#" class="btn btn-outline-danger text-decoration-none"><i class="fa-regular fa-trash-can"></i></a>
                    </td>
                </tr>
                <!-- Repeat similar rows as needed -->
            </tbody>
        </table>
    </div>
</div>
@endsection