<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý Tin tức thông báo</title>
    <link href={{ asset('assets/clients/css/bootstrap.min.css') }} rel="stylesheet">
    <link href={{ asset('assets/clients/css/admin/add.css') }} rel="stylesheet">
    {{-- eidtor --}}
    <script src="https://cdn.tiny.cloud/1/gjpf1fcmnepdwbxadkqs2aouqo5jpz5c7zv1gcsz0o0g3a3l/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    
    <!-- Place the following <script> and <textarea> tags your HTML's <body> -->
      <script>
        var editor_config = {
          path_absolute : "/",
          selector: 'textarea.my-editor',
          relative_urls: false,
          plugins: [
            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime media nonbreaking save table directionality",
            "emoticons template paste textpattern"
          ],
          toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
          file_picker_callback : function(callback, value, meta) {
            var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
            var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;
      
            var cmsURL = editor_config.path_absolute + 'laravel-filemanager?editor=' + meta.fieldname;
            if (meta.filetype == 'image') {
              cmsURL = cmsURL + "&type=Images";
            } else {
              cmsURL = cmsURL + "&type=Files";
            }
      
            tinyMCE.activeEditor.windowManager.openUrl({
              url : cmsURL,
              title : 'Filemanager',
              width : x * 0.8,
              height : y * 0.8,
              resizable : "yes",
              close_previous : "no",
              onMessage: (api, message) => {
                callback(message.content);
              }
            });
          }
        };
      
        tinymce.init(editor_config);
      </script>
    {{-- end eidtor --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

    {{-- navbar --}}
    <div class="menu">
        <nav class="navbar navbar-expand-sm shadow-sm p-3 fixed-top" style="background-color: #f2f2f2">
            <div class="container-fluid">
                <a href="{{session('back_url')}}" class="back"><i class="fa-solid fa-arrow-left"></i></a>
                <a class="navbar-brand" href="#"><img src="	https://husc.edu.vn/images/logo.png" alt=""> <strong>HUSC</strong></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="mynavbar">
                  <div class="navbar-nav me-auto"> 
                  </div>
                  {{-- user --}}
                    <div class="dropdown ">
                      <button class=" rounded-pill btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" >
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/12/User_icon_2.svg/800px-User_icon_2.svg.png" alt="" style="height: 30px; width: 30px">
                        {{Auth::user()->name}}
                      </button>
                      <ul class="dropdown-menu">
                        <div class="us">
                         <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/12/User_icon_2.svg/800px-User_icon_2.svg.png" alt="" style="height: 30px; width: 30px; margin-left: 5px">
                         {{Auth::user()->name}}
                        <hr>
                        <span>{{Auth::user()->email}}</span>
                        <hr>
                        <a href="{{ route('logout') }}" class="nav-link text-decoration-none" style="color: #333333; margin-left: 5px"
                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();"><i class="fa-solid fa-arrow-right-from-bracket"></i> Đăng xuất</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                          @csrf
                      </form>
                      </div>
                      </ul>
                    </div>
                  {{-- end user --}}
                </div>
              </div>
        </nav>
    </div>
    {{-- end navbar --}}
    
     {{-- sidebar --}}
     <div class="sidebar">
        <div class="img">
            <img src="https://cdn-icons-png.flaticon.com/512/2042/2042895.png" alt="">
        </div>
        <ul class="nav flex-column">
            <hr>
            <li class="text">
                <h4>Creator</h4>
            </li>
            <hr>
            <li class="text">
                <p>{{Auth::user()->name}}</p>
            </li>
            <hr>
            <li class="text">
                <p>{{Auth::user()->email}}</p>
            </li>
            
        </ul>
    </div>
{{-- endsidebar --}}
    
    {{-- content --}}
    @yield('content')
    {{-- end content --}}

</body>
<script href={{asset('assets/clients/js/bootstrap.min.css')}}></script>
<script src="{{asset('assets/clients/js/editor.js')}}"></script>
</html>