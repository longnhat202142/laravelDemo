@extends('admin.layout_crud')
@section('content')
     {{-- content --}}
     <div class="content">
      <div class="row border border-3 rounded-3">
        <form action="{{$list ? route('admin.VaiTro.Edit', [$list->IDVaiTro]) : route('admin.VaiTro.Add') }}" class="col-12" style="padding: 15px 15px 7px 15px" enctype="multipart/form-data" method="POST">
          @csrf
          @if ($list)
              @method('PUT')
          @endif
            <div class="row">
              <div class="col">
                <div class="form-group row">
                  <div class="col-12">
                      <input type="text" class="form-control" name="VaiTro" value="{{!empty($list)?$list->VaiTro:""}}" id="MaVaiTro" placeholder="Vai trò">
                  </div>
                </div>
                  <div class="form-group row">
                      <div class="col">
                        <div class="form-check ">
                          <input class="form-check-input" type="checkbox" value="1" id="flexCheckDefault" {{(isset($list) && $list->TrangThai == 1)? 'checked' : ''}} name="TrangThai">
                          <label class="form-check-label" for="flexCheckDefault">
                            Hoạt động
                          </label>
                        </div>
                      </div>  
                  </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <input type="text" ng-model="rname" class="form-control" placeholder="tên route">
                </div>
                  <div class=" container-fluid rounded-2 border">
                    <div class="form-group" style="max-height: 150px; overflow-y: auto">
                      @foreach ($routes as $item)
                      <div class="form-check ">
                          <input class="form-check-input checkbox" type="checkbox" value="{{$item}}" id="flexCheckDefault" @if (isset($list->Quyen)&&in_array($item, json_decode($list->Quyen, true))) checked @endif name="Quyen[]">
                          <label class="form-check-label" for="flexCheckDefault">
                          {{$item}}
                        </label>
                      </div>
                          @endforeach
                    </div>
                  </div>
                  <div class="form-check ">
                    <input class="form-check-input" type="checkbox" id="checkAll" name="checkAll" onclick="toggle(this)">
                    <label class="form-check-label" for="checkAll">
                    Tất cả
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
    function toggle(source) {
        checkboxes = document.getElementsByClassName('checkbox');
        for(var i=0, n=checkboxes.length;i<n;i++) {
            checkboxes[i].checked = source.checked;
        }
    }
</script>
@endsection