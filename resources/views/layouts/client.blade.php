<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - UNICODE</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <link rel="stylesheet" href="{{asset('assets/clients/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/clients/css/style.css')}}">
</head>
<body>
    <x-component.header/>
    <x-component.slide-img/>
    <main class="py-5">
       <div class="container">
         <div class="row">
        <div class="col-4">
        <aside>
                @section('sidebar')
                @include('clients.blocks.sidebar')
                @show
            </aside>
        </div>
          <div class="col-8">
          <div class="content">
            @yield('content')
        </div>
          </div>
        </div>
       </div>
       
    </main>
    <x-component.ads/>
    @include('clients.blocks.footer')
   

</body>
</html>