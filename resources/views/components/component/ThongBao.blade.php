@extends('layouts.layout')
@section('content')
<div class="row main">
  <div class="col-8">
    <div class="card" style="border: 0">
      <div class="card-body">
        @if ((isset($baiviet)&&$baiviet != null))
        <div class="card-content">
       
          <div>
           <div>
               <h2>{{$baiviet->TieuDe}}</h2>
               <hr>
               <p class="">{{$baiviet->NgayTao}}</p>
               <hr>
                 </div> 
                </div>
          </div>
        @else
          <div class="card-title">CÁC THÔNG BÁO MỚI NHẤT
            <div class="hr"></div>
          </div>
        @endif
        <div class="news-content">
         @if (isset($baiviet)&&$baiviet != null)
         <div style="font-size: 15px">{!!$baiviet->NoiDung!!}</div>
         @else
           @if (!($list->isEmpty()))
            @foreach ($list as $item)
             <div class="item" style="margin-top: 15px">
               <i class="fa-regular fa-file-lines"></i>
               <div class="content">
                   <a class="text-decoration-none" href="{{ route('search_detail_tb', ['id'=>$item->IDTinTuc]) }}">
                     {{$item->TieuDe}}</a>
                   <div class="time" style="color: #333333"><img src="https://husc.edu.vn/images/icon-calendar.png" alt=""> {{$item->NgayTao}}</div>
                   <div class="post-place">
                     <small style="color: #333333" >Được đăng ở:&nbsp; <br>
                       <a class="text-decoration-none" style="color: #333333; font-weight: 350" href="">
                         {{$item->IDDanhMuc}}
                       </a>
                     </small></div>
                     <hr style="margin: 10px 0; background-color: #aca9a9">
                   </div>  
                 </div>
             @endforeach
           @else
             <div class="alert alert-danger" style="text-align: center;font-size: 20px; margin-top: 10px;font-weight: 600" role="alert">
              Không có tin phù hợp!
              </div>
           @endif
         @endif
      </div>
      </div>
    </div>
    @if (isset($baiviet)&&$baiviet != null)
      <div style="text-align: right">
        <p style="font-size: 10x">
          <i class="fa-regular fa-user"></i>
        Người đăng:
        {{$user}}
        </p>
        <p style="font-size: 10px">
          Được đăng ở: {{$palace}}
        </p>
      </div>
    @else
    @if (isset($list))
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
    @endif
    @endif
  </div>
@endsection