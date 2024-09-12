<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- <meta name="description" content="Vali is a responsive and free admin theme built with Bootstrap 5, SASS and PUG.js. It's fully customizable and modular."> -->
    <!-- Twitter meta-->
    <!-- <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:site" content="@pratikborsadiya">
    <meta property="twitter:creator" content="@pratikborsadiya"> -->
    <!-- Open Graph Meta-->
    <!-- <meta property="og:type" content="website">
    <meta property="og:site_name" content="Vali Admin">
    <meta property="og:title" content="Vali - Free Bootstrap 5 admin theme">
    <meta property="og:url" content="http://pratikborsadiya.in/blog/vali-admin">
    <meta property="og:image" content="http://pratikborsadiya.in/blog/vali-admin/hero-social.png">
    <meta property="og:description" content="Vali is a responsive and free admin theme built with Bootstrap 5, SASS and PUG.js. It's fully customizable and modular."> -->
    <title> @yield('title') - {{config('app.name')}}</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="{{asset('assets/frontend/img/favicon.svg')}}" rel="icon">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/main.css')}}">
    <!-- Plugins -->
    <link rel="stylesheet" href="{{asset('assets/admin/plugins/toastr/toastr.min.css')}}">

    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
 
    
    @stack('styles')

</head>
  <body class="app sidebar-mini">
    <!-- Navbar-->
    @include('admin.includes.header')
    <!-- Sidebar menu-->
    @include('admin.includes.sidebar')

    <main class="app-content">
    
      @yield("app_title")
      @include('admin.includes.alert')
      @yield("content")
    </main>
    <!-- Essential javascripts for application to work-->
    <script src="{{asset('assets/admin/js/jquery-3.7.0.min.js')}}"></script>
    <script src="{{asset('assets/admin/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/admin/plugins/toastr/toastr.min.js')}}"></script>

    <script src="{{asset('assets/admin/js/main.js')}}"></script>
    <!-- Page specific javascripts-->
    <!-- Google analytics script-->
    <!-- <script type="text/javascript">
      if(document.location.hostname == 'pratikborsadiya.in') {
      	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
      	ga('create', 'UA-72504830-1', 'auto');
      	ga('send', 'pageview');
      }
    </script> -->

            @stack('scripts')

            @if(Session::has('messege'))
              @toastr("{{ Session::get('messege') }}")
            @endif

          

  </body>
</html>