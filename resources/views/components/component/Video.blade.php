<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href={{ asset('assets/clients/css/bootstrap.min.css') }} rel="stylesheet">
    <link href={{ asset('assets/clients/css/style/Video.css') }} rel="stylesheet">
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
</body>
<script href={{asset('assets/clients/js/bootstrap.min.css')}}></script>
</html>