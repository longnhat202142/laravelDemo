<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý Tin tức thông báo</title>
    <link href={{ asset('assets/clients/css/bootstrap.min.css') }} rel="stylesheet">
    <link href={{ asset('assets/clients/css/admin/layout_admin.css') }} rel="stylesheet">
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
                      @if (isset(Auth::user()->name))
                        <div class="dropdown ">
                            <button class=" rounded-pill btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" >
                              <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/12/User_icon_2.svg/800px-User_icon_2.svg.png" alt="" style="height: 30px; width: 30px">
                               {{Auth::user()->name}}
                            </button>
                            <ul class="dropdown-menu">
                              <div class="us">
                               <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/12/User_icon_2.svg/800px-User_icon_2.svg.png" alt="" style="height: 30px; width: 30px; margin-left: 5px">
                               {{Auth::user()->name}}
                              <hr>
                              <span>{{Auth::user()->email}}</span>
                              <hr>
                              <a href="{{ route('admin.logout') }}" class="nav-link text-decoration-none" style="color: #333333; margin-left: 5px"
                              onclick="event.preventDefault();
                                                       document.getElementById('logout-form').submit();"><i class="fa-solid fa-arrow-right-from-bracket"></i> Đăng xuất</a>
                              <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
                                @csrf
                              </form>
                              </div>
                            </ul>
                        </div>
                      @else
                      <a href="{{ route('admin.login') }}" class="text-decoration-none" style="color: #333333;">Quay lại</a>
                      @endif
                      {{-- end user --}}
                    </div>
                  </div>
            </nav>
        </div>
    {{-- end navbar --}}
    {{-- sidebar --}}
        <div class="sidebar">
            <ul class="nav flex-column">
              @can('')
                <li class="nav-item"><a class="nav-link" href="#"><i class="fa-solid fa-house-chimney"></i><p style="font-size: xx-small; width: max-content; margin-left: -8px">Trang chủ</p></a></li>
              @endcan
              @can('admin.danhmuc')
                <li class="nav-item"><a class="nav-link" href="{{ route('admin.danhmuc') }}"><i class="fa-solid fa-layer-group"></i><p style="font-size: xx-small; width: max-content; margin-left: -8px">Danh mục</p></a></li>
              @endcan
              @can('admin.thongbao')
                <li class="nav-item"><a class="nav-link" href="{{ route('admin.thongbao') }}"><i class="fa-regular fa-newspaper"></i><p style="font-size: xx-small; width: max-content; margin-left: -2px">Tin tức</p></a></li>
              @endcan
              @can('admin.user')
                <li class="nav-item"><a class="nav-link" href="{{ route('admin.user') }}"><i class="fa-solid fa-user"></i><p style="font-size: xx-small; width: max-content; margin-left: -8px">Người dùng</p></a></li>
              @endcan
              @can('admin.vaitro')
                <li class="nav-item"><a class="nav-link" href="{{ route('admin.vaitro') }}"><i class="fa-solid fa-address-book"></i><p style="font-size: xx-small; width: max-content; margin-left: -2px">Vai trò</p></a></li>
              @endcan
            </ul>
        </div>
    {{-- endsidebar --}}
    <div class="content">
          @yield('content')
    </div>
</body>
<script href={{asset('assets/clients/js/bootstrap.min.js')}}></script>
</html>
