<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>

        .container{
           
        }
        .container_wrapper{
            display: flex;
            overflow: hidden;
            padding: 10px;
        }
        .box_body{
            display: flex;
            flex-direction: row;
            flex-wrap: nowrap;
            align-items: center;
            position: relative;
            white-space: nowrap;
            position: relative;
            transition: transform 0.5s ease;
        }
        .box_body-img{
            margin: 0 20px;
            display: inline-block; /* Hiển thị các phần tử cạnh nhau */
  vertical-align: top;
        }
    </style>
</head>
<body>
    {{-- quảng cáo --}}
    <div class="container" style="height:200px;display:flex">
        <div class="container_wrapper">
            <div class="box_body">
                <div class="box_body-img">
                    <a href="">
                        <img src="http://husc.hueuni.edu.vn/images/weblinks/20190508094321_banner_citc.png" alt="" class="box_body-img--img">
                    </a>
                </div>
                <div class="box_body-img">
                    <a href="">
                        <img src="http://husc.hueuni.edu.vn/images/weblinks/20190508094050_sociology_faculty_-_husc_-_banner.png" alt="" class="box_body-img--img">
                    </a>
                </div>
                <div class="box_body-img">
                    <a href="">
                        <img src="http://husc.hueuni.edu.vn/images/weblinks/20190508093927_link_khoamt.gif" alt="" class="box_body-img--img">
                    </a>
                </div>
                <div class="box_body-img">
                    <a href="">
                        <img src="http://husc.hueuni.edu.vn/images/weblinks/20190508093700_logodhh.gif" alt="" class="box_body-img--img">
                    </a>
                </div>
                <div class="box_body-img">
                    <a href="">
                        <img src="http://husc.hueuni.edu.vn/images/weblinks/20190508093853_banertv3.jpg" alt="" class="box_body-img--img">
                    </a>
                </div>
                <div class="box_body-img">
                    <a href="">
                        <img src="http://husc.hueuni.edu.vn/images/weblinks/20190508094024_dtvt_husc_animated.gif" alt="" class="box_body-img--img">
                    </a>
                </div>
                <div class="box_body-img">
                    <a href="">
                        <img src="http://husc.hueuni.edu.vn/images/weblinks/20190508094217_esuhai_logo_2.png" alt="" class="box_body-img--img">
                    </a>
                </div>
               
            </div>
        </div>
    </div>
    <script>
let slideIndex = 0;
showSlides();

function showSlides() {
  let slides = document.querySelectorAll('.box_body-img');
  let totalSlides = slides.length;
  
  // Thêm một bản sao của ảnh đầu tiên vào cuối danh sách
  let cloneFirstSlide = slides[0].cloneNode(true);
  document.querySelector('.box_body').appendChild(cloneFirstSlide);

  let offset = -slideIndex * slides[1].offsetWidth;
 
  console.log(totalSlides);
  console.log(cloneFirstSlide);
  
//   totalSlides = 0 ;
  

  document.querySelector('.box_body').style.transition = 'transform 0.5s ease';
  document.querySelector('.box_body').style.transform = `translateX(${offset}px)`;

  slideIndex++;

  setTimeout(function() {
    // Đặt lại vị trí của slideIndex và không có hiệu ứng transition
    if (slideIndex >= totalSlides) {
      slideIndex = 0;
      offset = -slideIndex * slides[0].offsetWidth;
      document.querySelector('.box_body').style.transition = 'none';
      document.querySelector('.box_body').style.transform = `translateX(${offset}px)`;
      setTimeout(showSlides, 0); // Không có thời gian nghỉ
    } else {
      setTimeout(showSlides, 1000); // Thời gian chuyển đổi giữa các ảnh
    }
  }, 1500); // Thời gian chuyển đổi giữa các ảnh
}

    </script>
</body>
</html>