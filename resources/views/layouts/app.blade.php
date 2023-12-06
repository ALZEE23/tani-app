<!DOCTYPE html>
<html lang="en" class=" ">

<head>
  <!-- 
         * @Package: Odis Mobile App 
         * @Author: themepassion
         * @Version: 1.0
        -->
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Odis Mobile App: </title>
  <meta content="Odis Mobile App" name="description" />
  <meta content="themepassion" name="author" />


  <!-- App Icons -->
  <link rel="apple-touch-icon" sizes="57x57" href="assets/images/icons/apple-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="60x60" href="assets/images/icons/apple-icon-60x60.png">
  <link rel="apple-touch-icon" sizes="72x72" href="assets/images/icons/apple-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="76x76" href="assets/images/icons/apple-icon-76x76.png">
  <link rel="apple-touch-icon" sizes="114x114" href="assets/images/icons/apple-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="120x120" href="assets/images/icons/apple-icon-120x120.png">
  <link rel="apple-touch-icon" sizes="144x144" href="assets/images/icons/apple-icon-144x144.png">
  <link rel="apple-touch-icon" sizes="152x152" href="assets/images/icons/apple-icon-152x152.png">
  <link rel="apple-touch-icon" sizes="180x180" href="assets/images/icons/apple-icon-180x180.png">
  <link rel="icon" type="image/png" sizes="192x192" href="assets/images/icons/android-icon-192x192.png">
  <link rel="icon" type="image/png" sizes="512x512" href="assets/images/icons/android-icon-512x512.png">
  <link rel="icon" type="image/png" sizes="32x32" href="assets/images/icons/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="96x96" href="assets/images/icons/favicon-96x96.png">
  <link rel="icon" type="image/png" sizes="16x16" href="assets/images/icons/favicon-16x16.png">
  <link rel="manifest" href="assets/images/icons/manifest.json">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="assets/images/icons/ms-icon-144x144.png">
  <meta name="theme-color" content="#ffffff">






  <!-- CORE CSS FRAMEWORK - START -->

  <link href="{{asset('modules/materialize/materialize.min.css')}}" type="text/css" rel="stylesheet" media="screen" />
  <link href="{{asset('modules/fonts/mdi/appicon/appicon.css')}}" type="text/css" rel="stylesheet" media="screen" />
  <link href="{{asset('modules/fonts/mdi/materialdesignicons.min.css')}}" type="text/css" rel="stylesheet" media="screen" />
  <link href="{{asset('modules/perfect-scrollbar/perfect-scrollbar.css')}}" type="text/css" rel="stylesheet" media="screen" />


  <!-- CORE CSS FRAMEWORK - END -->

  <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START -->
    <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END -->

  <!-- CORE CSS TEMPLATE - START -->

  
    <link href="{{asset('css/style.css')}}" type="text/css" rel="stylesheet" media="screen" id="main-style" />
  <!-- CORE CSS TEMPLATE - END -->
  

</head>
<!-- END HEAD -->

<!-- BEGIN BODY -->


<body class=" menu-full  isfullscreen  html"  data-header="light" data-footer="light"  data-header_align="app"  data-menu_type="left" data-menu="light" data-menu_icons="on" data-footer_type="left" data-site_mode="light" data-footer_menu="show" data-footer_menu_style="light"  >

<div class="content-area">
@auth
    <!-- Tambahan code untuk tombol logout -->
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>
@endauth
@yield('content')
</div><!--.content-area-->







<script src="{{asset('assets/js/pwa.js')}}"></script>

<!-- LOAD FILES AT PAGE END FOR FASTER LOADING -->

<!-- CORE JS FRAMEWORK - START -->
<script src="{{asset('modules/jquery/jquery-2.2.4.min.js')}}"></script>
<script src="{{asset('modules/materialize/materialize.js')}}"></script>
<script src="{{asset('modules/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('assets/js/variables.js')}}"></script>
<!-- CORE JS FRAMEWORK - END -->


<!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START -->
<script src="{{asset('assets/js/common.js')}}"></script><!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END -->


<!-- CORE TEMPLATE JS - START -->
<script src="{{asset('modules/app/init.js')}}"></script>
<script src="{{asset('modules/app/settings.js')}}"></script>

<script src="{{asset('modules/app/scripts.js')}}"></script>

<!-- END CORE TEMPLATE JS - END -->


</body>

</html>