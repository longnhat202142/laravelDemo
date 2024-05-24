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
    <title>Document</title>
</head>
<body>
     {{-- trang Thông báo --}}
     <div class="news-all">
        <div class="container">
          <div class="row main">
            <div class="col-8">
              <div class="card ">
                <div class="card-body">
                  <div class="card-title">CÁC THÔNG BÁO MỚI NHẤT
                    <div class="hr"></div>
                  </div>
                  <div class="news-content">
                  @for ($i = 0; $i < 6; $i++)
                    <div class="item">
                      <i class="fa-regular fa-file-lines"></i>
                      <div class="content">
                          <a class="text-decoration-none" href="https://husc.edu.vn/announcements.php?readmore=2598">
                            Lịch bảo vệ luận án tiến sĩ cấp ĐHH của NCS Nguyễn Thị Anh Thư</a>
                          <div class="time" style="color: #333333"><img src="https://husc.edu.vn/images/icon-calendar.png" alt=""> 07-05-2024</div>
                          <div class="post-place">
                            <small style="color: #333333" >Được đăng ở:&nbsp; <br>
                              <a class="text-decoration-none" style="color: #333333; font-weight: 350" href="https://husc.edu.vn/saudaihoc/announcements.php?readmore=2598">Phòng đào tạo sau đại học</a>
                            </small></div>
                            <hr style="margin: 10px 0; background-color: #aca9a9">
                          </div>  
                      </div>
                      @endfor
                    </div>
                </div>
              </div>
              <nav aria-label="Page navigation example" class="pag">
                <ul class="pagination">
                  <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                      <span aria-hidden="true">&laquo;</span>
                      <span class="sr-only">Previous</span>
                    </a>
                  </li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                      <span aria-hidden="true">&raquo;</span>
                      <span class="sr-only">Next</span>
                    </a>
                  </li>
                </ul>
              </nav>
            </div>
            <div class="col-4 sidebar-all">
              <div class="card">
                <div class="card-body" style="background-color: #f6f6f6">
                  <div class="card-title">CHUYÊN MỤC</div>
                  <ul>
                  @for ($i = 0; $i < 13; $i++)
                    <li style=" list-style-type: none;">
                      <a class="text-decoration-none cm" href="#">Đào tạo Đại học & Công tác Sinh viên</a>
                    </li>
                  @endfor
                  </ul>
                  <hr style="color: #aca9a9">
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    {{-- end trang thông báo --}}
  
</body>
<script href={{asset('assets/clients/js/bootstrap.min.css')}}></script>
</html>