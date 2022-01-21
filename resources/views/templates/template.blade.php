@include('templates.header')
@yield('custom-css')

<body class="hold-transition sidebar-mini layout-fixed">
   
    <div class="wrapper">
        @include('templates.navbar')

        @include('templates.sidebar')
        
        @yield('content_body')

    </div>
    
</body>
    @yield('custom-js')
    @include('templates.footer')
</html>
