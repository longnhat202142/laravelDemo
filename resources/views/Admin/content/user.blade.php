@extends('admin.layout_admin')
@section('content')
<div class="title">
    <h3>Quản lý người dùng</h3>
</div>
<div class="border border-3 rounded" style="width: 95%;">
    <div class="container" style="margin-top: 10px">
        <nav class="navbar navbar-light">
            <div class="container-fluid">
                <form class="d-flex" action="{{ route('admin.user') }}" method="get">
                  <input class="form-control me-2" name="text" type="search" placeholder="Search" aria-label="Search">
                  <button class="btn btn-outline-success"type="submit">Search</button>
                </form>
                @can('admin.User.getAdd')
                    <a href="{{ route('admin.User.getAdd')}}" class="btn btn-outline-primary mb-3">Bổ sung</a>
                @endcan
            </div>
            @if (!empty($text))
                <p style="margin-top: 5px">Từ khóa tìm kiếm: <strong>{{$text}}</strong></p>
            @endif
        </nav>
        <div>
        </div>
        <table class="table table-bordered" style="width: 107%;max-width: 107%; margin: 10px -45px ">
            <thead>
                <tr class="table-head">
                    <th>STT</th>
                    <th>Tên người dùng</th>
                    <th>Email</th>
                    <th>Vai trò</th>
                    <th>Trạng thái</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                
                @if(!empty($userList))
                    @foreach ($userList as $item)
                        <tr>
                            <td>{{$stt++}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->email}}</td>
                            <td>
                                @foreach (json_decode($us->roleDetails($item->id), true) as $role)
                                    <label class="border border-2 rounded-2" style="background-color: rgb(255, 226, 5); color: #333333;font-weight: 600; font-size: xx-small; padding: 4px">
                                        {{htmlspecialchars($role, ENT_QUOTES, 'UTF-8')}}
                                    </label>    
                                @endforeach
                            </td>
                            <td> 
                                @if ($item->TrangThai == 1)
                                    <label class="border border-2 rounded-2" style="background-color: green; color: aliceblue;font-weight: 600; font-size: xx-small; padding: 4px">Active</label>
                                @else
                                    <label class="border border-2 rounded-2" style="background-color: rgb(181, 11, 11); color: aliceblue;font-weight: 600; font-size: xx-small; padding: 5px">Inactive</label>  
                                @endif
                            </td>
                            <td class="actions" style="display: flex">
                                @can('admin.User.Delete')                                
                                    <a href="{{ route('admin.User.Delete', [$item->id]) }}" class="btn btn-outline-danger text-decoration-none" onclick="return confirm('Xóa bài viết ?');"><i class="fa-regular fa-trash-can"></i></a>
                                @endcan
                                @can('admin.User.Edit')
                                    <a href="{{ route('admin.User.Edit', [$item->id]) }}" class="btn btn-outline-info text-decoration-none"><i class="fa-regular fa-pen-to-square"></i></a>
                                @endcan
                                @can('admin.User.Role')
                                    <a href="{{ route('admin.User.Role', [$item->id]) }}" class="btn btn-outline-warning text-decoration-none"><i class="fa-solid fa-address-book"></i></a>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>   
        </table>
        @if ($userList->isEmpty())
                    <div class="alert alert-danger" style="text-align: center" role="alert">
                        Dữ liệu không tồn tại!
                    </div>
        @endif
    </div>
</div>
<script>
   
</script>
@endsection
