@extends('admin.layout_crud')
@section('content')
     {{-- content --}}
     <div class="content">
      <div class="row border border-3 rounded-3">
        <form action="{{$list ? route('admin.DanhMuc.Edit', [$list->IDDanhMuc]) : route('admin.DanhMuc.Add') }}" class="col-12" style="padding: 15px 15px 7px 15px" enctype="multipart/form-data" method="POST">
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
                            <option value="{{$item->IDDanhMuc}}" {{(isset($list) && $list->IDDanhMuc == $item->IDDanhMuc )? 'selected' : ''}}>{{$item->TieuDe}}</option>
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
                  <button type="submit" class="btn btn-outline-success text-decoration-none">Lưu</button>
                  {{-- xem trước --}}
              </div>
          </form>
          
      </div>
      
  </div>
  {{-- end content --}}
  <script>
    function ChangeToSlug() {
        var title, slug;
  
        // Lấy text từ thẻ input title 
        title = document.getElementById("TieuDe").value;
  
        // Đổi chữ hoa thành chữ thường
        slug = title.toLowerCase();
  
        // Đổi ký tự có dấu thành không dấu
        slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
        slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
        slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
        slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
        slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
        slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
        slug = slug.replace(/đ/gi, 'd');
  
        // Xóa các ký tự đặc biệt
        slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
        // Đổi khoảng trắng thành ký tự gạch ngang
        slug = slug.replace(/ /gi, "-");
        // Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
        slug = slug.replace(/\-\-\-\-\-/gi, '-');
        slug = slug.replace(/\-\-\-\-/gi, '-');
        slug = slug.replace(/\-\-\-/gi, '-');
        slug = slug.replace(/\-\-/gi, '-');
        // Xóa các ký tự gạch ngang ở đầu và cuối
        slug = '@' + slug + '@';
        slug = slug.replace(/\@\-|\-\@|\@/gi, '');
  
        // In slug ra textbox có id “MaTinTuc”
        document.getElementById('MaDanhMuc').value = slug;
    }
  
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('TieuDe').addEventListener('input', ChangeToSlug);
    });
  </script>
@endsection