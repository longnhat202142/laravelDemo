<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <link rel="stylesheet" href="{{asset('assets/clients/css/bootstrap.min.css')}}">
    {{-- <link rel="stylesheet" href="{{asset('assets/clients/css/style.css')}}"> --}}
</head>
<body>
    <div class="container-fluid">
        <x-component.header/>
        <x-component.slide-img/>
        @yield('content')
        <x-component.navbar/>
        <x-component.news/>
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
          </div>
    <!-- <x-component.Video/> -->
    <x-component.MoTa/>
    <x-component.ads/>
    <x-component.footer/>
    <script src="{{asset('assets/clients/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/clients/js/custom.js')}}"></script>

</body>
</html>