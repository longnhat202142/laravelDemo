<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href={{ asset('assets/clients/css/bootstrap.min.css') }} rel="stylesheet">
    <link href={{ asset('assets/clients/css/style/TuyenDung.css') }} rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>
<body>
    {{-- Thông tin tuyển dụng --}}
        
    <div class="news-list">
        <div class="container">
          <div class="title">
            <p>THÔNG TIN TUYỂN DỤNG</p>
            <div class="hr"></div>
          </div>
          <div class="row">
            @for ($i = 0; $i < 16; $i++)
              <div class="col-12 col-sm-6 col-md-4 col-lg-4">
                  <div class="img"><a href=""><img src="https://husc.edu.vn/images_main/announcements.jpg" alt=""></a></div>
                  <div class="content-list">
                    <h4><a class="text-decoration-none" href="#">Kết quả trúng tuyển hợp đồng giao khoán năm 2023</a></h4>
                    <div class="time">
                      <span>
                        <img src="	https://husc.edu.vn/images/icon-calendar.png" alt="">
                        13-07-2023
                      </span>
                    </div>
                    <hr style="color: #aca9a9">
                    <div class="decription" style="margin-bottom: 40px">
                      <p>Hiệu trưởng Trường ĐHKH thông báo kết quả trúng tuyển và tuyển dụng vào các vị trí làm việc là giáo viên thuộc Trường THPT chuyên Khoa học Huế như sau:</p>
                    </div>
                  </div>
                </div>
                @endfor
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
      </div>
      
    {{-- end Thông tin tuyển dụng --}}

</body>
<script href={{asset('assets/clients/js/bootstrap.min.css')}}></script>
</html>