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
    
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-mg-6">
                        <h3>Thêm Menu</h3>
                    </div>
                    <div class="">
                        <a href="{{route('menu.index')}}" class="btn btn-primary float-end">Danh Sách menu</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{route('menu.store')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <strong>ID Menu</strong>
                                <input type="text" class="form-control" name="IDMenu" placeholder="Nhập ID Menu">
                            </div>
                            <div class="form-group">
                                <strong>Tiêu Đề </strong>
                                <input type="text" class="form-control" name="TieuDe" placeholder="Nhập Tiêu đề">
                            </div>
                            <div class="form-group">
                                <strong>Trạng Thái</strong>
                                <input type="number" class="form-control" name="TrangThai" placeholder="Nhập trạng thái ">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <strong>Thứ tự hiển thị</strong>
                                <input type="number" class="form-control" name="ThuTuHienThi" placeholder="Nhập thứ tự hiển thị">
                            </div>
                            <div class="form-group">
                                <strong>LienKet </strong>
                                <input type="text" class="form-control" name="LienKet" placeholder="Nhập liên kết">
                            </div>
                            <div class="form-group">
                                <strong>ID cha</strong>
                                <input type="number" class="form-control" name="IDCha" placeholder="Nhập ID Cha ">
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success mt-2 float-end" >Lưu</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>