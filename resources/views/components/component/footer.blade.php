<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href={{ asset('assets/clients/css/bootstrap.min.css') }} rel="stylesheet">
    <link href={{ asset('assets/clients/css/style.css') }} rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>
<body>
  
    {{-- Thông báo và video --}}
      <div class="container border">
        <div class="row">
          <div class="col-sm-6">
            @for ($i = 0; $i <3; $i++)
                
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">VTV3 - GIỚI THIỆU VỀ TRƯỜNG ĐẠI HỌC KHOA HỌC, ĐH HUẾ</h5>
                <p class="hr"> </p>
                <video width="560" height="315" class="border" controls 
                poster="https://student.husc.edu.vn/Themes/Login/images/Logo-ko-nen.png">
                  <source src="mov_bbb.mp4" type="video/mp4">
                  Your browser does not support HTML video.
                </video>
                <div style="margin: auto; text-align: center">
                  <a target="_blank" href="#">
                    <img src="	https://husc.edu.vn/upload/download_button.png" alt="" title="Tải clip">
                  </a>
                </div>
              </div>
            </div>
            @endfor
            <div class="comic">
              <a href="" class="text-decoration-none" style="display: flex">
                <div >
                  <img src="	https://husc.edu.vn/images/tapchi.png" alt="">
                </div>
                <div style="margin: auto; text-align: left">
                  <p>TẠP CHÍ</p>
                  <h3>KHOA HỌC & CÔNG NGHỆ</h3>
                </div>
              </a>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="card">
              <div class="card-body"style="padding: 53.5px 0 0 0">
                <h5 class="card-title" style="margin: 0 0 40px">THÔNG BÁO MỚI
                  <p class="hr" style="height: 1.5px; width: 15%"> </p>
                </h5>
                @for ($i = 0; $i < 6; $i++)
                  <div class="news-a">
                    <a class="text-decoration-none" href="https://husc.edu.vn/announcements.php?readmore=2598">Thông tin luận án tiến sĩ của NCS Bùi Lê Thanh Nhàn</a>
                    <hr style="margin: 10px 0; background-color: darkgrey">
                    <div class="time"><img src="https://husc.edu.vn/images/icon-calendar.png" alt=""> 07-05-2024</div>
                    <div class="post-place">
                      <small>Được đăng ở:&nbsp; <br>
                        <a class="text-decoration-none" style="color: #333333; font-weight: 350" href="https://husc.edu.vn/saudaihoc/announcements.php?readmore=2598">Phòng đào tạo sau đại học</a>
                      </small></div>
                  </div>
                @endfor
                <div style="margin:auto; text-align: center">
                  <a href="#" class="btn" style="color: aliceblue; background-color: #143980">Xem Thêm</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    {{-- end Thông báo và video --}}
  
    {{-- Mô tả --}}
    {{-- <div class="all">
        <div class="container">
          <div class="content-de">
            <div class="text">
              <div class="header">
                  <span>HỌC TẬP TẠI</span>
                <H1>
                  TRƯỜNG ĐẠI HỌC KHOA HỌC
                </H1>
                <div class="hr"></div>
              </div>
              <p class="decription">
                Sinh viên lựa chọn Trường ĐHKH làm nơi học tập và rèn luyện có nhiều cơ hội tìm kiếm việc làm hơn, bởi chiến lược, chương trình đào tạo, kế hoạch quảng bá và chương trình tiếp thị việc làm được quan tâm, thực hiện thường xuyên và hiệu quả.
              </p>
              <div class="content">
                <table class="tabled">
                  <tr>
                    <td>
                      <div class="item"><i class="fa-solid fa-building-columns"></i> Cơ sở vật chất hiện đại</div>
                    </td>
                    <td>
                      <div class="item"><i class="fa-solid fa-lightbulb"></i> Ngành nghề định hướng nhu cầu việc làm</div>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <div class="item"><i class="fa-solid fa-computer"></i> Phương pháp giảng dạy tiên tiến</div>
                    </td>
                    <td>
                      <div class="item"><i class="fa-solid fa-people-group"></i> Môi trường thân thiện, năng động, minh bạch</div>
                    </td>
                  </tr>
                </table>
              </div>
            </div>
            <div class="img" style="background-image:url('https://husc.edu.vn/images/img_reason1.jpg')"> </div>
          </div>
        </div>
    </div> --}}
        {{-- end Mô tả --}}

    {{-- banner --}}
      {{-- <div id="demo" class="carousel slide" data-bs-ride="carousel">
        <!-- The slideshow/carousel -->
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="https://husc.edu.vn/images/weblinks/20190508094321_banner_citc.png" alt="Los Angeles" >
            <img src="https://husc.edu.vn/images/weblinks/20190508094321_banner_citc.png" alt="Los Angeles" >
            <img src="https://husc.edu.vn/images/weblinks/20190508094321_banner_citc.png" alt="Los Angeles" >
          </div>
          <div class="carousel-item">
            <img src="https://husc.edu.vn/images/weblinks/20190508094118_gishusc_2010_ver_21.gif" alt="Chicago" >
          </div>
          <div class="carousel-item">
            <img src="https://husc.edu.vn/images/weblinks/20190508093927_link_khoamt.gif" alt="New York">
          </div>
        </div>
        
        <!-- Left and right controls/icons -->
        <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
          <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
          <span class="carousel-control-next-icon"></span>
        </button>
      </div> --}}
    
    {{-- endbanner --}}

    {{-- footer --}}
    {{-- <footer class="text-white text-center text-lg-start" style="background-color: #143980">
        <!-- Grid container -->
        <div class="container p-4">
          <!--Grid row-->
          <div class="row mt-4">
            <!--Grid column-->
            <div class="col-lg-4 col-md-12 mb-4 mb-md-0">
              <h5 class="text-uppercase mb-4">Trường Đại học Khoa học, ĐH Huế</h5>
      
              <p>
                <i class="fa-solid fa-location-dot"></i> 77 Nguyễn Huệ, TP.Huế
              </p>
      
              <p>
                <i class="fa-solid fa-phone"></i><a href="tel:02343823290" class="text-decoration-none" style="color: white"> (0234) 3823290</a>
              </p>
      
              <p>
                <i class="fa-solid fa-envelope"></i><a href="mailto:khcndhkh@hueuni.edu.vn" class="text-decoration-none" style="color: white"> khcndhkh@hueuni.edu.vn</a>
              </p>
      
              <p>
                <i class="fa-brands fa-facebook"></i><a href="https://www.facebook.com/husc.edu.vn" class="text-decoration-none" style="color: white"> https://www.facebook.com/husc.edu.vn</a>
              </p>
      
            </div>
            <!--Grid column-->
      
            <!--Grid column-->
            <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
              <h5 class="text-uppercase mb-4 pb-1">Thông tin về Trường</h5>
                  <p ><i class="fa fa-caret-right"></i><a href="#TongQuang" class="text-decoration-none" style="color: white"> Tổng quan</a></p>
                   <p><i class="fa fa-caret-right"></i><a href="#CCTC" class="text-decoration-none" style="color: white"> Cơ cấu tổ chức</a></p>
                  <p><i class="fa fa-caret-right"></i><a href="#hotline" class="text-decoration-none" style="color: white"> Đường dây nóng</a></p>
                  <p><i class="fa fa-caret-right"></i><a href="#CLGD" class="text-decoration-none" style="color: white"> Công khai chất lượng giáo dục</a></p>
               
            </div>
            <!--Grid column-->
      
            <!--Grid column-->
            <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
              <h5 class="text-uppercase mb-4">Liên kết</h5>
                  <p ><i class="fa fa-caret-right"></i><a href="#" class="text-decoration-none" style="color: white"> Thông tin tuyển sinh</a></p>
                 <p><i class="fa fa-caret-right"></i><a href="#" class="text-decoration-none" style="color: white"> Trang thông tin đào tạo tín chỉ</a></p>
                <p><i class="fa fa-caret-right"></i><a href="#" class="text-decoration-none" style="color: white"> Thanh toán học phí trực tuyến</a></p>
           </div>
            <!--Grid column-->
          </div>
          <!--Grid row-->
        </div>
        <!-- Grid container -->
      
        <!-- Copyright -->
        
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
          Copyright © HUSC
        </div>
        <!-- Copyright -->
      </footer> --}}
      {{-- end footer --}}
</body>
<script href={{asset('assets/clients/js/bootstrap.min.css')}}></script>
</html>