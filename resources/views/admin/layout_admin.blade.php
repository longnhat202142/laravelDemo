<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý Tin tức thông báo</title>
    <link href={{ asset('assets/clients/css/bootstrap.min.css') }} rel="stylesheet">
    <link href={{ asset('assets/clients/css/admin/style.css') }} rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
   
</head>
<body>

    {{-- navbar --}}
        <div class="menu">
            <nav class="navbar navbar-expand-sm shadow-sm p-3 fixed-top" style="background-color: #f2f2f2">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#"><img src="	https://husc.edu.vn/images/logo.png" alt=""> <strong>HUSC</strong></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
                      <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="mynavbar">
                      <div class="navbar-nav me-auto"> 
                      </div>
                      {{-- user --}}
                        <div class="dropdown ">
                          <button class=" rounded-pill btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" >
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/12/User_icon_2.svg/800px-User_icon_2.svg.png" alt="" style="height: 30px; width: 30px">
                            Nhật Minh
                          </button>
                          <ul class="dropdown-menu">
                            <div class="us">
                             <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/12/User_icon_2.svg/800px-User_icon_2.svg.png" alt="" style="height: 30px; width: 30px; margin-left: 5px">
                            Trần Hữu Nhật Minh
                            <hr>
                            <a href="" class="text-decoration-none" style="color: #333333; margin-left: 5px"><i class="fa-solid fa-arrow-right-from-bracket"></i> Đăng xuất</a>
                            </div>
                          </ul>
                        </div>
                      {{-- end user --}}
                    </div>
                  </div>
            </nav>
        </div>
    {{-- end navbar --}}
    {{-- sidebar --}}
        <div class="sidebar">
            <h3>Quản lý</h3>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link active" href="#">Quản lý giới thiệu</a>
                    <ul class="nav flex-column ml-3">
                        <li class="nav-item"><a class="nav-link" href="#">Tổng quan</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Cơ cấu tổ chức</a></li>
                    </ul>
                </li>
                <li class="nav-item"><a class="nav-link" href="#">Quản lý tuyển sinh</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Quản lý đào tạo</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Quản lý khoa học</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Quản lý tin tức</a></li>
                <ul class="nav flex-column ml-3">
                    <li class="nav-item"><a class="nav-link" href="#">Tin tức</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Thông báo</a></li>
                </ul>
                <li class="nav-item"><a class="nav-link" href="#">Quản lý tài nguyên</a></li>
            </ul>
        </div>
    {{-- endsidebar --}}
    <div class="content">
          
         {{-- content  --}}
         @yield('content')
         {{-- end content  --}}
    </div>
</body>
<script href={{asset('assets/clients/js/bootstrap.min.css')}}></script>
</html>
