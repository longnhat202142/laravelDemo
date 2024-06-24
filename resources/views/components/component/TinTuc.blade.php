@extends('layouts.layout')
@section('content')
<link rel="stylesheet" href="{{asset('assets/clients/css/news.css')}}">
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
              <div class="card-title">TIN MỚI NHẤT
                <div class="hr"></div>
              </div>
            @endif
          <div class="news-content">
            <div class="row">
            @if (isset($baiviet)&&$baiviet != null)
            <div style="font-size: 15px; text-align: justify; padding-right: 20px">{!!$baiviet->NoiDung!!}</div>
            @else
            @foreach ($list as $item)
            <div class="col">
              <a href="{{ route('search_detail_tt', ['id'=>$item->IDTinTuc]) }}">
                <img class="border border-0 rounded-2"  src="{{!empty($item->Anh) ? asset('public/storage/AnhDaiDien/' . $item->Anh) : 'https://duonganh.com.vn/en/admin/assets/images/404.png' }}" alt="" style="max-width: 320px;margin-top:10px; width: 320px; height: 200px">
              </a>
                <div class="img">
                </div>
                <div class="content-list">
                  <h4>
                    @if($item->TinNong == 1)
                  <i class="fa-solid fa-fire" style="color: rgb(255, 94, 0)"></i>
                  @endif
                    <a class="text-decoration-none" href="{{ route('search_detail_tt', ['id'=>$item->IDTinTuc]) }}">{{$item->TieuDe}}</a>
                    </h4>
                  <div class="time">
                    <span style="color: #aca9a9">
                      <img src="	https://husc.edu.vn/images/icon-calendar.png" alt="">
                      {{$item->NgayTao}}
                    </span>
                    <hr style="color: #aca9a9">
                    <span style="color: #aca9a9">Chuyên mục: 
                      <a class="text-decoration-none" style="color: #134980; font-size: small" href="#">{{$item->IDDanhMuc}}</a>
                    </span>
                  </div>
                  <hr style="color: #aca9a9">
                  <div class="decription" style="margin-bottom: 40px">
                    <p style="text-align:justify">{!!$item->TomTat!!}</p>
                  </div>
                </div>
              </div>
              @endforeach
              @endif
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
            @endif
        </div>
        
        </div>
      </div>
    </div>
  
@endsection