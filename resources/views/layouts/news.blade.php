<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - UNICODE</title>
    <link rel="stylesheet" href="{{asset('assets/clients/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/clients/css/style.css')}}">
</head>
<body>
    {{-- @include('clients.blocks.header') --}}
    <x-component.header/>
    @yield('content')
    <x-component.news/>
    <x-component.Video/>
    <x-component.MoTa/>
    <x-component.footer/>
    <script src="{{asset('assets/clients/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/clients/js/custom.js')}}"></script>

</body>
</html>