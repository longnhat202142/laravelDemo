<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
 
  <style>
   
    
   .nav_item:hover{
        background-color:#d92727;
        transition: background-color 0.5s ease;
    }
    .item_list{
      display: none;
      position:absolute;
      background: #ffffff;
      z-index: 1;
      transition: transform 0.3s ease; /* Thêm hiệu ứng chuyển động */
      transform: translateY(100%);
    }
    .item_list.show {
    display: block;
  
}
.nav_item:hover .item_list {
    
    transform: translateY(0);
}
    h4{
        
        letter-spacing: 3px;
    }
    .item_ul{
      padding: 10px 8px;
     
    }
    .item_list::before{
      position: absolute;
    content: "";
    background: transparent;
    width: 7px;
    height: 0;
    border-left: 15px solid transparent;
    border-right: 15px solid transparent;
    border-bottom: 20px solid #ffffff;
    top: -15px;
    left: 15px;
    z-index: -1;
    }
    nav_item:hover .item_list{
      display: block;
    }
   
    .item_list-content{
      list-style:none;
      margin: 5px 0;
    }
    .text-decoration-none{
      
      font-size: 18px;
      letter-spacing: 1px;
      color: #2c343b;
    }
    .text-decoration-none:hover {
      color: #d92727;
      transition:color 0.2s ease;
      text-decoration: none;
    }
  </style>
</head>
<body>

<header class="py-4 fixed-top " style="transition: background-color 0.5s ease;" id="elementToChange">
  <div class="  d-flex" style="justify-content:center">
  
        
        
            <ul class="nav">
              
                <li class="nav_item" style=" position: static;" id="container1" >
                    <div class="nav_item-link">
                    <h4 style=" letter-spacing: 1px;">
                    <a  class="nav-link active item_link " aria-current="page" href="{{route('home')}}">
                    <i style="color:#ffffff" class="fa-solid fa-house-chimney"></i>
                    </a>
                    </h4>
                    </div>
                    
                    
                </li>
                <li class="nav_item" style=" position: static;" id="container2">
                    <div>
                    <h4 style=" letter-spacing: 1px;">
                    <a class="nav-link active item_link "  style="color:#ffffff;text-decoration: none;" aria-current="page" href="{{route('home')}}">GIỚI THIỆU</a>
                    </h4>
                    </div> 
                    <div class="item_list" >
                      <ul class="item_ul">
                        <li class="item_list-content">
                            <a href="https://husc.edu.vn/gioithieu.php?page_tag=gioithieu" class="text-decoration-none">
                            <i class="fa-solid fa-angle-right"></i> Tổng quan
                            </a>
                        </li>
                        <li class="item_list-content">
                            <a href="https://husc.edu.vn/cocautochuc.php" class="text-decoration-none">
                            <i class="fa-solid fa-angle-right"></i> Cơ cấu tổ chức
                            </a>
                        </li>
                      </ul>
                    </div>
                </li>
                <li class="nav_item" style=" position: static;" id="container3">
                  <div>
                  <h4 style=" letter-spacing: 1px;"> 
                    <a class="nav-link item_link" style="color:#ffffff;text-decoration: none;" href="https://tuyensinh.husc.edu.vn/">TUYỂN SINH </a>
                    </h4>
                  </div>

                    
                </li>
                <li class="nav_item" style=" position: static;" id="container4">
                    <div style="">
                    <h4 style=" letter-spacing: 1px;">
                    <a class="nav-link item_link" style="color:#ffffff;text-decoration: none;" href="https://husc.edu.vn/nganhdaotao.dh.php">ĐÀO TẠO</a>
                    </h4>
                    </div>
                    
                    <div class="item_list">
                      <ul class="item_ul">
                      <li class="item_list-content">
                            <a href="https://husc.edu.vn/nganhdaotao.dh.php" class="text-decoration-none">
                            <i class="fa-solid fa-angle-right"></i> Đào tạo đại học
                            </a>
                        </li>
                        <li class="item_list-content">
                            <a href="https://husc.edu.vn/saudaihoc/viewpage.php?page_tag=nganhdaotao" class="text-decoration-none">
                            <i class="fa-solid fa-angle-right"></i> Đào tạo sau đại học
                            </a>
                        </li>
                        <li class="item_list-content">
                            <a href="https://husc.edu.vn/khaothi/articles.php?cat_id=35" class="text-decoration-none">
                            <i class="fa-solid fa-angle-right"></i> Công khai chất lượng GD
                            </a>
                        </li>
                      </ul>
                    </div>
                </li>
                <li class="nav_item" style=" position: static;" id="container5">
                    <div>
                    <h4 style=" letter-spacing: 1px;">
                    <a class="nav-link item_link" style="color:#ffffff;text-decoration: none;" href="#">KHOA HỌC CÔNG NGHỆ</a>
                    </h4>
                    </div>
                    <div class="item_list">
                      <ul class="item_ul">
                      <li class="item_list-content">
                            <a href="" class="text-decoration-none">
                            <i class="fa-solid fa-angle-right"></i> Thông báo 
                            </a>
                        </li>
                        <li class="item_list-content">
                            <a href="" class="text-decoration-none">
                            <i class="fa-solid fa-angle-right"></i> Tin tức
                            </a>
                        </li>
                        <li class="item_list-content">
                            <a href="" class="text-decoration-none">
                            <i class="fa-solid fa-angle-right"></i> Danh mục đề tài hàng năm
                            </a>
                        </li>
                      </ul>
                    </div>
                    
                </li>
                <li class="nav_item" style=" position: static;" id="container6">
                    <div>
                    <h4 style=" letter-spacing: 1px;">
                    <a class="nav-link item_link" style="color:#ffffff;text-decoration: none;" href="#">TIN TỨC,THÔNG BÁO</a>
                    </h4>
                    </div>
                    <div class="item_list">
                      <ul class="item_ul">
                      <li class="item_list-content">
                            <a href="{{ url('tintuc') }}" class="text-decoration-none">
                            <i class="fa-solid fa-angle-right"></i> Tin tức
                            </a>
                        </li>
                        <li class="item_list-content">
                            <a href="{{url('thongbao')}}" class="text-decoration-none">
                            <i class="fa-solid fa-angle-right"></i> Thông báo 
                            </a>
                        </li>
                        <li class="item_list-content">
                            <a href="https://husc.edu.vn/tuyendung.php" class="text-decoration-none">
                            <i class="fa-solid fa-angle-right"></i> Thông tin tuyển dụng
                            </a>
                        </li>
                      </ul>
                    </div>
                    
                </li>
                <li class="nav_item" style=" position: static;" id="container7">
                    <h4 style=" letter-spacing: 1px;">
                    <a class="nav-link item_link" style="color: #ffffff;text-decoration: none;" href="https://husc.edu.vn/oauth/login.php">LỊCH CÔNG TÁC </a>
                    </h4>
                </li>
                <li class="nav_item" style=" position: static;" id="container">
                    <div>
                    <h4 style=" letter-spacing: 1px;">
                    <a class="nav-link item_link" style="color:#ffffff;text-decoration: none;" href="https://husc.edu.vn/downloads.php">DỮ LIỆU </a>
                    </h4>
                    </div>
                    <div class="item_list">
                      <ul class="item_ul">
                      <li class="item_list-content">
                            <a href="https://husc.edu.vn/downloads.php" class="text-decoration-none">
                            <i class="fa-solid fa-angle-right"></i> Tải file, văn bản, biểu mẫu
                            </a>
                        </li>
                        <li class="item_list-content">
                            <a href="https://husc.edu.vn/nhandienthuonghieu/" class="text-decoration-none">
                            <i class="fa-solid fa-angle-right"></i>  Nhận dạng thương hiệu 
                            </a>
                        </li>
                      </ul>
                    </div>
                </li>
                <li class="nav_item" style=" position: static;" id="container8">
                    <h4 style=" letter-spacing: 1px;">
                    <a class="nav-link active item_link" aria-current="page" href="{{route('admin.login')}}">
                    <i style="color:#ffffff;text-decoration: none;" class="fa-solid fa-right-to-bracket"></i>
                    </a>
                    </h4>
                    
                </li>
           
            </ul>
        
    </div>
  
</header>


<script>
  // JavaScript để xử lý sự kiện cuộn trang và thay đổi màu nền
  window.addEventListener('scroll', function() {
    const element = document.getElementById('elementToChange');
    const scrollPosition = window.scrollY;

    // Kiểm tra vị trí cuộn trang
    if (scrollPosition > 100) { // Đổi 100 thành vị trí cuộn trang mong muốn
      // Thay đổi màu nền khi cuộn trang
      element.style.backgroundColor = '#143980'; // Màu đỏ (tùy chọn)
      element.style.color = '#ffffff'; // Màu văn bản (tùy chọn)
    } else {
      // Nếu vị trí cuộn trang nhỏ hơn 100px, trở lại màu nền mặc định
      element.style.backgroundColor = ''; // Màu nền mặc định
      element.style.color = '#000'; // Màu văn bản mặc định
    }
  });

  const containers = document.querySelectorAll('.nav_item');

// Lặp qua mỗi phần tử container và thêm sự kiện hover vào
containers.forEach(nav_item => {
    const popup = nav_item.querySelector('.item_list');

    // Thêm sự kiện mouseenter (hover vào) cho phần tử nav_item
    nav_item.addEventListener('mouseenter', function() {
        // Thêm lớp "show" cho phần tử popup tương ứng khi hover vào
        popup.classList.add('show');
    });

    // Thêm sự kiện mouseleave (hover ra) cho phần tử nav_item
    nav_item.addEventListener('mouseleave', function() {
        // Loại bỏ lớp "show" khỏi phần tử popup tương ứng khi hover ra
        popup.classList.remove('show');
    });
});
</script>
</body>
</html>