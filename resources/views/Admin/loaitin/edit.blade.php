<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
  <link rel="stylesheet" href="{{asset('assets/clients/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/clients/css/style.css')}}">
</head>
<body>
   <div class="container">

  
     <h1>{{$title}}</h1>
    <form action="{{route('loaitin.post-edit')}}" method="POST">
    <!-- <div class="mb-3">
        <label for="">Mã loại</label>
        <input type="text" class="form-control" name="IDLoai" 
        placeholder="Mã loại" value="{{old('IDLoai')}}">
        @error('IDLoai')
           <span style="color:red">{{$message}}</span>
        @enderror
     
    </div> -->

     <div class="mb-3">
        <label for="">Tên loại</label>
        <input type="text" class="form-control" name="TenLoai" 
        placeholder="Tên loại" 
        value="{{old('TenLoai') ?? $getLoaitin->TenLoai}}">
         @error('TenLoai')
           <span style="color:red">{{$message}}</span>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Cập nhật</button>
    <a href="{{route('loaitin.index')}}" class="btn btn-warning">Quay lại</a>
    @csrf
    </form>
   </div>
      <script src="{{asset('assets/clients/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/clients/js/custom.js')}}"></script>
</body>
   
</html>
