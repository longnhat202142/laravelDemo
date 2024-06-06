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
            @if (isset($baiviet)&&$baiviet != null)
            <div style="font-size: 15px; text-align: justify; padding-right: 20px">{!!$baiviet->NoiDung!!}</div>
            @else
            @foreach (DB::table('tintuc')->where('IDLoai','2')->orderBy('NgayTao','DESC')->get() as $item)
            <div class="" style="width: 30%; margin: 0 15px">
              <a href="{{ route('search_detail_tt', ['id'=>$item->IDTinTuc]) }}"><img src="http://husc.hueuni.edu.vn/images/news/thumbs/2024/20240503164247_aa_t1.jpg" alt="" style="width:max-content"></a>
                <div class="img">
                </div>
                <div class="content-list">
                  <h4><a class="text-decoration-none" href="{{ route('search_detail_tt', ['id'=>$item->IDTinTuc]) }}">{{$item->TieuDe}}</a></h4>
                  <div class="time">
                    <span style="color: #aca9a9">
                      <img src="	https://husc.edu.vn/images/icon-calendar.png" alt="">
                      {{$item->NgayTao}}
                    </span>
                    <hr style="color: #aca9a9">
                    <span style="color: #aca9a9">Chuyên mục: 
                      <a class="text-decoration-none" style="color: #134980; font-size: small" href="#">{{DB::table('danhmuc')->where('IDDanhMuc',$item->IDDanhMuc)->value('TieuDe')}}</a>
                    </span>
                  </div>
                  <hr style="color: #aca9a9">
                  <div class="decription" style="margin-bottom: 40px">
                    <p style="text-align:justify">{!!$item->NoiDung!!}</p>
                  </div>
                </div>
              </div>
              @endforeach
              @endif
        </div>
        </div>
      </div>
    </div>
  
@endsection