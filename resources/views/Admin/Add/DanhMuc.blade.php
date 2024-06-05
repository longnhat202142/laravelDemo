@extends('admin.layout_crud')
@section('content')
     {{-- content --}}
     <div class="content">
      <div class="row border border-3 rounded-3">
        <form action="{{$list ? route('DanhMuc.Edit', [$list->IDDanhMuc]) : route('DanhMuc.Add') }}" class="col-12" style="padding: 15px 15px 7px 15px" enctype="multipart/form-data" method="POST">
          @csrf
          @if ($list)
              @method('PUT')
          @endif
            <div class="container">
              <div class="form-group row">
                <div class="col-12">
                    <input type="text" class="form-control" name="TieuDe" value="{{!empty($list)?$list->TieuDe:""}}" id="TieuDe" placeholder="Tiêu đề...">
                </div>
            </div>
            <div class="form-group row">
              <div class="col-12">
                  <input type="text" class="form-control" name="MaDanhMuc" value="{{!empty($list)?$list->MaDanhMuc:""}}" id="MaDanhMuc" placeholder="Mã danh mục...">
              </div>
              </div>
              <div class="form-group row">
                  {{-- <label for="chuyenmuc" class="col-sm-3 col-form-label">Chuyên mục</label> --}}
                  <div class="col-12">
                      <select name="IDCha" id="IDCha" class="form-control">
                          <option value="0" selected>--- Chuyên mục cha ---</option>
                          @foreach ($danhmucList as $item)
                            <option value="{{$item->IDDanhMuc}}">{{$item->TieuDe}}</option>
                          @endforeach
                      </select>
                  </div>
              </div>
              <div class="form-group row">
                  <div class="col-2">
                      <input type="number" class="form-control" name="ThuTuHienThi" value="{{ !empty($list) ? $list->ThuTuHienThi : 1 }}" min="1">
                    </div>
                    
                  <div class="col">
                    <div class="form-check ">
                      <input class="form-check-input" type="checkbox" value="1" id="flexCheckDefault" {{(isset($list) && $list->TrangThai == 1)? 'checked' : ''}} name="TrangThai">
                      <label class="form-check-label" for="flexCheckDefault">
                        Hiển thị
                      </label>
                    </div>
                  </div>  
              </div>
              <div style="margin-top: 5px">
                  {{-- <input type="submit" value="Lưu Bài viết" class="btn btn-outline-success"> --}}
                  <button type="submit" class="btn btn-outline-success text-decoration-none">Lưu bài viết</button>
                  {{-- xem trước --}}
              </div>
          </form>
          
      </div>
      
  </div>
  {{-- end content --}}
@endsection