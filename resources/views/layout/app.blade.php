<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon.ico">
        <meta name="author" content="" />
        <title>@yield('title')</title>
        @include('layout.css_global')
        @yield('css_custom')
    </head>
    
    <body class="sb-nav-fixed">
        @include('layout.topnav')
        <div id="layoutSidenav">
            @include('layout.sidenav')

            <div id="layoutSidenav_content">
                        <div class="container-fluid px-4">
                            <h1 class="mt-4"></h1>
                            
                            @include('layout.content')
                        </div>

                @include('layout.footer')
            </div>
        </div>
        
        @include('layout.script')
        @yield('js_lokal')
    </body>
    
</html>
