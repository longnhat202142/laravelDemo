<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="{{asset('assets/clients/css/news.css')}}">

{{-- <div class="container">
    <div class="wrap">
        <h1>Chuyên mục : Khoa học công nghệ</h1>
        <div class="content">
            <span> TRANG CHỦ  / TIN TỨC</span>
        </div>
    </div>
</div> --}}

<div class="section box box-news">
   <div class="container" style="padding: 0 100px">
   <div class="box-header-bottom" style="margin-left: 20px">
         <h1 class="box-title" style="color: #134980">TIN TỨC MỚI
          <p style="background-color: #134980; height: 2px; margin: 5px 20%"></p>
         </h1>
         
         {{-- khung tin --}}
         <div class="row">
          @foreach (DB::table('tintuc')->where('IDLoai','2')->where('TrangThai', '1')->orderBy('NgayTao','DESC')->take(6)->get() as $item)
            <div class="col" style="width: 30%; margin: 0 15px">
              <a href="{{ route('search_detail_tt', ['id'=>$item->IDTinTuc]) }}">
                <img class="border border-0 rounded-2"  src="{{!empty($item->Anh) ? asset('public/storage/AnhDaiDien/'.$item->Anh) : 'https://duonganh.com.vn/en/admin/assets/images/404.png' }}" alt="" style="max-width: 320px;; width: 320px; height: 200px;">
              </a>
                <div class="img">
                </div>
                <div class="content-list">
                  <h4>
                    @if($item->TinNong == 1)
                    <i class="fa-solid fa-fire" style="color: rgb(255, 94, 0)"></i>
                    @endif
                    <a class="text-decoration-none" href="{{ route('search_detail_tt', ['id'=>$item->IDTinTuc]) }}">{{$item->TieuDe}}</a></h4>
                  <div class="time">
                    <span style="color: #aca9a9">
                      <img src="	https://husc.edu.vn/images/icon-calendar.png" alt="">
                      {{$item->NgayTao}}
                    </span>
                    <hr style="color: #aca9a9">
                    <span style="color: #aca9a9">Chuyên mục: 
                      <a class="text-decoration-none" style="color: #134980" href="#">{{DB::table('danhmuc')->where('IDDanhMuc',$item->IDDanhMuc)->value('TieuDe')}}</a>
                    </span>
                  </div>
                  <hr style="color: #aca9a9">
                  <div class="decription" style="margin-bottom: 40px">
                    <p style="text-align:justify">{!!$item->TomTat!!}</p>
                  </div>
                </div>
              </div>
              @endforeach
        </div>
         {{-- end khung tin --}}
      </div>
   </div>
      
   </div>
   </div>

