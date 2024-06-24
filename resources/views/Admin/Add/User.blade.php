@extends('admin.layout_crud')
@section('content')
     {{-- content --}}
     <div class="content">
      <div class="row border border-3 rounded-3">
        <form action="{{$list ? route('admin.User.Edit', [$list->id]) : route('admin.User.Add') }}" class="col-12" style="padding: 15px 15px 7px 15px" enctype="multipart/form-data" method="POST">
            @csrf
            @if ($list)
                @method('PUT')
            @endif
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="form-group row">
                            <div class="form-group col-12">
                                <input type="text" class="form-control" name="name" value="{{!empty($list)?$list->name:""}}" id="name" {{isset($roles)? "disabled" : ""}} placeholder="Tên người dùng">
                            </div>
                            <div class=" form-groupcol-12">
                                <input type="email" class="form-control" name="email" value="{{!empty($list)?$list->email:""}}" id="email" {{isset($roles)? "disabled" : "" }} placeholder="Email người dùng">
                            </div>
                            <div class=" form-group col">
                                <div class="form-check ">
                                  <input class="form-check-input" type="checkbox" value="1" id="flexCheckDefault" {{(isset($list) && $list->TrangThai == 1)? 'checked' : ''}} {{isset($roles)? "disabled" : ""}} name="TrangThai">
                                  <label class="form-check-label" for="flexCheckDefault">
                                    Hoạt động
                                  </label>
                                </div>
                              </div>
                        </div>
                    </div>
                    @if (isset($roles))
                        <div class="col">
                            <div class=" container-fluid rounded-2 border">
                                <input type="hidden" name="id" value="{{isset($list) ? $list->id: ""}}">
                                <div class="form-group" style="max-height: 150px; overflow-y: auto">
                                  @foreach ($roles as $item)
                                  <div class="form-check ">
                                      <input class="form-check-input" type="checkbox" value="{{$item->IDVaiTro}}" id="flexCheckDefault" 
                                      {{isset($roledetails)&&in_Array($item->VaiTro,$roledetails) ? "checked":"" }}
                                      name="VaiTro[]">
                                      <label class="form-check-label" for="flexCheckDefault">
                                      {{$item->VaiTro}}
                                    </label>
                                  </div>
                                      @endforeach
                                </div>
                              </div>
                        </div>
                    @endif
                    </div>
                </div>
                <button type="submit" class="btn btn-outline-success text-decoration-none">Lưu</button>
            </div>
        </form>
      </div>
  </div>
  {{-- end content --}}
@endsection