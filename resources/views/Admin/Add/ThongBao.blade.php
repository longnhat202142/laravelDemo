@extends('admin.layout_crud')
@section('content')
     {{-- content --}}
     <div class="content">
      <div class="row border border-3 rounded-3">
        <form action="{{$list ? route('ThongBao.Edit', [$list->IDTinTuc]) : route('ThongBao.Add') }}" class="col-12" style="padding: 15px 15px 7px 15px" enctype="multipart/form-data" method="POST">
          @csrf
          @if ($list)
              @method('PUT')
          @endif
            <div class="container">
              <div class="form-group row">
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="TieuDe" value="{{!empty($list)?$list->TieuDe:""}}" id="TieuDe" placeholder="Tiêu đề...">
                </div>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="MaTinTuc" value="{{!empty($list)?$list->MaTinTuc:""}}" id="MaTinTuc" placeholder="Mã tin tức...">
                </div>
            </div>
              <div class="form-group row">
                  <div class="col">
                      <select name="IDDanhMuc" id="IDDanhMuc" class="form-control">
                          <option value="0" selected>--- Chọn chuyên mục ---</option>
                          @foreach (DB::table('DanhMuc')->get() as $item)
                            <option value="{{$item->IDDanhMuc}}">{{$item->TieuDe}}</option>
                          @endforeach
                      </select>
                  </div>
                  <div class="col">
                      <select name="IDLoai" id="IDLoai" class="form-control">
                          <option value="0">--- Chọn loại tin ---</option>
                          <option value="1" {{(isset($list) && $list->IDLoai == 1)? 'selected' : ''}} >Thông báo</option>
                          <option value="2" {{(isset($list) && $list->IDLoai == 2)? 'selected' : ''}} >Tin tức</option>
                      </select>
                  </div>
                  <div class="col">
                    <div class="form-check ">
                      <input class="form-check-input" type="checkbox" value="1" id="flexCheckDefault" {{(isset($list) && $list->TinNong == 1)? 'checked' : ''}} name="TinNong">
                      <label class="form-check-label" for="flexCheckDefault">
                        Tin nóng
                      </label>
                    </div>
                  </div>
              </div>
              
                
                
              {{-- editor --}}
              <textarea name="NoiDung" class="form-control my-editor" rows="18">{{ $list ? htmlspecialchars_decode($list->NoiDung) : '' }}</textarea>
              {{-- end editor --}}
              <div style="margin-top: 5px">
                  {{-- <input type="submit" value="Lưu Bài viết" class="btn btn-outline-success"> --}}
                  <button type="submit" class="btn btn-outline-success text-decoration-none">Lưu bài viết</button>
                  {{-- xem trước --}}
                  <!-- Button trigger modal -->
                  <button type="button" href="#" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                  Xem trước
                </button>
                    
                    <!-- Modal -->
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true"> --}}
                      <div class="modal-dialog modal-xl modal-dialog-scrollable">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="staticBackdropLabel">{{$list ? $list->TieuDe: ""}}</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <textarea name="noidung" class="form-control" rows="18" >{{ $list ? htmlspecialchars_decode($list->NoiDung) : '' }}</textarea>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                             </div>
                          </div>
                        </div>
                      </div>
                  {{-- end xem trước --}}
              </div>
          </form>
          
      </div>
      
  </div>
  {{-- end content --}}
@endsection