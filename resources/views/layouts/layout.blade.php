<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href={{ asset('assets/clients/css/bootstrap.min.css') }} rel="stylesheet">
    <link href={{ asset('assets/clients/css/style/ThongBao.css') }} rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title></title>
</head>
<body>
    <x-component.header/>
        <x-component.slide-img/>
     {{-- trang Thông báo --}}
     <div class="news-all">
        <div class="container d-flex">
          @yield('content')
            <div class="col-4 sidebar-all" style="height: 500px">
              <div class="card" style="border: 0">
                <div class="card-body" style="background-color: #f6f6f6">
                  <div class="card-title">CHUYÊN MỤC</div>
                  <ul>
                  @foreach (DB::table('DanhMuc')->where('IDCha', 0)->get() as $item)
                    @if ($item->IDCha == 0)
                      <li style=" list-style-type: none;">
                        @if ($url == 'http://127.0.0.1:8000/thongbao')
                          <a class="text-decoration-none cm" href="{{ route('ThongBao', [$item->IDDanhMuc]) }}">{{$item->TieuDe}}</a>
                        @else
                          <a class="text-decoration-none cm" href="{{ route('tintuc', [$item->IDDanhMuc]) }}">{{$item->TieuDe}}</a>
                        @endif
                        @foreach (DB::table('DanhMuc')->where('IDCha','<>',0)->get() as $chil)
                          @if ($chil->IDCha == $item->IDDanhMuc)
                            <ul>
                              <li>
                                @if ($url == 'http://127.0.0.1:8000/tintuc')
                                  <a class="text-decoration-none cm" href="{{ route('tintuc', [$chil->IDDanhMuc]) }}">{{$chil->TieuDe}}</a>
                                @else
                                <a class="text-decoration-none cm" href="{{ route('ThongBao', [$chil->IDDanhMuc]) }}">{{$chil->TieuDe}}</a>
                              @endif
                              </li>
                            </ul>
                          @endif
                        @endforeach  
                        </li>
                      @endif
                  @endforeach
                  </ul>
                  <hr style="color: #aca9a9">
                  <div class="card-title">Tin nóng</div>
                  <ul>
                    @foreach ($hotnew as $item)
                      <li style=" list-style-type: none;">
                        <a class="text-decoration-none cm" href="{{ route('search_detail_tt', ['id'=>$item->IDTinTuc]) }}">{{$item->TieuDe}}</a>
                        <i class="fa-solid fa-fire" style="color: rgb(255, 94, 0); font-size: medium"></i>
                      </li>
                    @endforeach
                    </ul>
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    {{-- end trang thông báo --}}
    {{-- qc --}}
    <div id="demo" class="carousel slide carousel-css" data-bs-ride="carousel" style="margin-top: 10px; margin-bottom: 30px">

      <div class="carousel-inner" >
        <div class="carousel-item active">
          <img src="https://husc.edu.vn/images/img_admission.jpg" alt="Los Angeles" class="d-block" style="width:100%">
        </div>
        <div class="carousel-item">
          <img src="https://husc.edu.vn/images/cdae.jpg" alt="Chicago" class="d-block" style="width:100%">
        </div>
       
      </div>
      
      <!-- Left and right controls/icons -->
      <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" style="border-radius: 50%; background-color: #8f8888;"></span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
        <span class="carousel-control-next-icon" style="border-radius: 50%; background-color: #8f8888;"></span>
      </button>
    </div>
    {{-- end qc --}}
    <x-component.ads/>
    <x-component.footer/>
  
</body>
<script href={{asset('assets/clients/js/bootstrap.min.css')}}></script>
</html>