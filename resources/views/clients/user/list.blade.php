@extends ('layouts.client')

@section('title')
{{$title}}
@endsection



@section('content')
@if(session('msg'))
<div class="alert alert-success">{{session('msg')}}</div>
@endif
<h1>{{$title}}</h1>
-DANH SÁCH NGƯỜI DÙNG

@endsection
