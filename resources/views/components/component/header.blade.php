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
                <li class="nav_item" style=" position: static;" id="container3">
                  <div>
                  <h4 style=" letter-spacing: 1px;"> 
                    <a class="nav-link item_link" style="color:#ffffff;text-decoration: none;" href="{{ route('ThongBao') }}">THÔNG BÁO </a>
                    </h4>
                  </div>
                  <div class="item_list">
                    <ul class="item_ul">
                      @foreach (DB::table('danhmuc')->get() as $item)
                        @if ($item->IDCha == 0)
                          <li class="item_list-content">
                                <a href="{{ route('search_detail_tb', ['id' ,'ChuyenMuc'=>$item->IDDanhMuc]) }}" class="text-decoration-none">
                                <i class="fa-solid fa-angle-right"></i> {{$item->TieuDe}} 
                                </a>
                                @foreach (DB::table('DanhMuc')->where('IDCha','<>',0)->get() as $chil)
                                  @if ($chil->IDCha == $item->IDDanhMuc)
                                    <ul>
                                      <a href="{{ route('search_detail_tb', ['id' ,'ChuyenMuc'=>$chil->IDDanhMuc]) }}" class="text-decoration-none">
                                        <i class="fa-solid fa-angle-right"></i> {{$chil->TieuDe}} 
                                      </a>
                                    </ul>
                                  @endif
                                @endforeach
                          </li>
                        @endif
                      @endforeach
                    </ul>
                  </div>
                    
                </li>
                <li class="nav_item" style=" position: static;" id="container4">
                    <div style="">
                    <h4 style=" letter-spacing: 1px;">
                    <a class="nav-link item_link" style="color:#ffffff;text-decoration: none;" href="{{ route('tintuc') }}">TIN TỨC</a>
                    </h4>
                    </div>
                    <div class="item_list">
                      <ul class="item_ul">
                        @foreach (DB::table('danhmuc')->get() as $item)
                          @if ($item->IDCha == 0)
                            <li class="item_list-content">
                                  <a href="{{ route('search_detail_tt', ['id' ,'ChuyenMuc'=>$item->IDDanhMuc]) }}" class="text-decoration-none">
                                  <i class="fa-solid fa-angle-right"></i> {{$item->TieuDe}} 
                                  </a>
                                  @foreach (DB::table('DanhMuc')->where('IDCha','<>',0)->get() as $chil)
                                    @if ($chil->IDCha == $item->IDDanhMuc)
                                      <ul>
                                        <a href="{{ route('search_detail_tt', ['id' ,'ChuyenMuc'=>$chil->IDDanhMuc]) }}" class="text-decoration-none">
                                          <i class="fa-solid fa-angle-right"></i> {{$chil->TieuDe}} 
                                        </a>
                                      </ul>
                                    @endif
                                  @endforeach
                            </li>
                          @endif
                        @endforeach
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