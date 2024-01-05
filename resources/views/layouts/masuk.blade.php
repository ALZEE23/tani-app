<!DOCTYPE html>
<html lang="en" class=" ">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Jendela Tani Menu</title>
  <meta content="Odis Mobile App" name="description" />
  <meta content="themepassion" name="author" />
  <!-- PWA  -->
  <meta name="theme-color" content="#6777ef" />
  <link rel="apple-touch-icon" href="{{ asset('logo.png') }}">
  <link rel="manifest" href="{{ asset('/manifest.json') }}">

  <!-- App Icons -->

  <!-- CORE CSS FRAMEWORK - START -->
  <!-- <link href="{{asset('css/preloader.css')}}" type="text/css" rel="stylesheet" media="screen" /> -->

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


<body class=" menu-full header-image html" data-header="light" data-footer="light" data-header_align="app" data-menu_type="left" data-menu="light" data-menu_icons="on" data-footer_type="left" data-site_mode="light" data-footer_menu="show" data-footer_menu_style="light">
  <!-- <div class="preloader-background">
      <div class="preloader-wrapper">
        <div class="loader">
        </div>
      </div>
    </div> -->



  <!-- SIDEBAR - START -->

  <!-- MAIN MENU - START -->



  <!-- MAIN MENU - END -->



  <!--  SIDEBAR - END --><!-- SIDEBAR - START -->

  <!-- MAIN MENU - START -->



  <!-- MAIN MENU - END -->



  <!--  SIDEBAR - END -->

  <!-- START navigation -->
  <nav class="fix_topscroll logo_on_fixed  topbar navigation">
    <div class="nav-wrapper container">
      <a href="{{route('home')}}" class="waves-effect waves-circle navicon back-button htmlmode show-on-large">
        <i class="mdi mdi-chevron-left" data-page=""></i>
      </a>



      <a href="#" data-target="slide-settings" class="waves-effect waves-circle navicon right sidenav-trigger show-on-large">
        @auth
        <!-- Tambahan code untuk tombol logout -->
        <form action="{{ route('logout') }}" method="POST">
          @csrf
          <button type="submit">X</button>
        </form>
        @endauth
      </a>

      <!-- <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a> -->
    </div>
  </nav>
  <ul id="slide-nav" class="sidenav sidemenu">
    <li class="copy-spacer"></li>
    <li class="copy-wrap">
      <div class="copyright">&copy; Copyright @ themepassion</div>

  </ul>
  <!-- END navigation -->

  <div class="menu-close"><i class="mdi mdi-close"></i></div>

  <div class="content-area">
    @yield('content')

  </div><!--.content-area-->
  <style>
    .footer-menu ul {
      display: flex;
      justify-content: space-around;
      padding: 0;
      list-style: none;
      flex-wrap: nowrap;
      overflow-x: auto;
    }

    .footer-menu li {
      flex: 1;
      text-align: center;
      white-space: nowrap;
      font-size: 0.9em;
      /* Sesuaikan ukuran font */
      margin: 0 5px;
      /* Sesuaikan margin */
    }

    /* Media query untuk layar dengan lebar maksimum 768px */
    @media screen and (max-width: 768px) {
      .footer-menu ul {
        overflow-x: visible;
        flex-wrap: wrap;
        justify-content: space-between;
      }

      .footer-menu li {
        flex: 0 0 30%;
        /* Ubah persentase sesuai kebutuhan */
        margin: 10px 0;
      }
    }
  </style>

  <div class="footer-menu circular">
    <ul>
      <li>
        <a href="{{route('KritikDanSaran')}}">
          <i class="mdi mdi-mailbox"></i>
          <span>Kritik & Saran</span>
        </a>
      </li>
      @if ($notif_count > 0)
      <li>
        <a href="{{route('notif')}}" style="color:var(--primary-color)">
          <i class="mdi mdi-bell" style="color:#96cf66"></i>
          <span style="color:#96cf66">Pemberitahuan {{$notif_count}}</span></span>
        </a>
      </li>
      @else
      <li style="">
        <a href="{{route('notif')}}">
          <i class="mdi mdi-bell"></i>
          <span>Pemberitahuan</span></span>
        </a>
      </li>
      @endif
      <li>
        <a href="{{route('profile.index')}}">
          <i class="mdi mdi-account-circle"></i>
          <span>Profile</span>
        </a>
      </li>
    </ul>
  </div>







  <script src="{{asset('js/pwa.js')}}"></script>

  <!-- LOAD FILES AT PAGE END FOR FASTER LOADING -->

  <!-- CORE JS FRAMEWORK - START -->
  <script src="{{asset('modules/jquery/jquery-2.2.4.min.js')}}"></script>
  <script src="{{asset('modules/materialize/materialize.js')}}"></script>
  <script src="{{asset('modules/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
  <script src="{{('js/variables.js')}}"></script>
  <!-- CORE JS FRAMEWORK - END -->


  <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START -->
  <script src="{{asset('js/common.js')}}"></script><!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END -->


  <!-- CORE TEMPLATE JS - START -->
  <script src="{{asset('modules/app/init.js')}}"></script>
  <script src="{{asset('modules/app/settings.js')}}"></script>

  <script src="{{asset('modules/app/scripts.js')}}"></script>

  <!-- END CORE TEMPLATE JS - END -->
  <script src="{{ asset('/sw.js') }}"></script>
  <script>
    if ("serviceWorker" in navigator) {
      // Register a service worker hosted at the root of the
      // site using the default scope.
      navigator.serviceWorker.register("/sw.js").then(
        (registration) => {
          console.log("Service worker registration succeeded:", registration);
        },
        (error) => {
          console.error(`Service worker registration failed: ${error}`);
        },
      );
    } else {
      console.error("Service workers are not supported.");
    }
  </script>

  <!-- <script src="{{asset('js/preloader.js')}}"></script> -->
</body>

</html>