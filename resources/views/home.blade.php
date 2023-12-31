<script src="js/preloader.js"></script>


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
  <title>Jendela Tani Menu</title>
  <meta content="Odis Mobile App" name="description" />
  <meta content="themepassion" name="author" />


  <!-- App Icons -->

  <!-- CORE CSS FRAMEWORK - START -->
  <link href="{{asset('css/preloader.css')}}" type="text/css" rel="stylesheet" media="screen" />

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
      <a id="logo-container" href="index.html" class=" brand-logo "><svg xmlns="http://www.w3.org/2000/svg" width="400.000000pt" height="400.000000pt" viewBox="0 0 400.000000 400.000000" preserveAspectRatio="xMidYMid meet">
          <g transform="translate(0.000000,400.000000) scale(0.100000,-0.100000)" fill="#000000" stroke="none">
            <path d="M1810 3566 c0 -3 13 -24 29 -48 16 -24 34 -62 41 -84 l12 -42 101 -7 c248 -17 377 -112 444 -325 37 -121 43 -235 43 -931 l0 -676 49 -7 c27 -4 75
-15 107 -26 31 -11 59 -20 61 -20 2 0 2 343 0 763 -3 722 -5 766 -24 842 -45 182 -95 285 -182 374 -130 134 -294 191 -547 191 -74 0 -134 -2 -134 -4z" />
            <path d="M1482 3541 c-55 -14 -110 -58 -142 -114 -87 -152 22 -337 200 -337 133 0 230 99 230 234 0 138 -150 251 -288 217z" />
            <path d="M1226 3093 c-4 -9 -16 -62 -26 -118 -19 -94 -20 -148 -20 -971 0 -819 1 -876 19 -975 39 -208 90 -318 197 -425 76 -77 164 -127 279 -159 79 -22 361 -32 448 -16 79 15 167 42 167 51 0 3 -22 16 -48 28 -26 12 -71 41 -99 65 l-51 44 -64 -9 c-34 -5 -103 -6 -153 -3 -258 19 -391 134 -451 390 -18 75 -19 134 -19 995 0 503 3 931 6 950 6 33 5 36 -34 54 -22 11 -63 41 -91 68 -27 26 -51 48 -52 48 -1 0 -5 -8 -8 -17z" />
            <path d="M2356 1304 c-27 -9 -61 -23 -75 -31 -53 -33 -123 -110 -149 -163 -24 -48 -27 -67 -27 -155 0 -87 3 -107 26 -155 103 -215 370 -276 563 -129 86 66 136 170 136 284 0 98 -27 170 -90 238 -101 111 -246 153 -384 111z" />
          </g>
        </svg>Jendela tani</a>




      <a href="#" data-target="slide-settings" class="waves-effect waves-circle navicon right sidenav-trigger show-on-large">
        @auth
        <!-- Tambahan code untuk tombol logout -->
        <form action="{{ route('logout') }}" method="POST">
          @csrf
          <button type="submit">X</button>
        </form>
        @endauth
        @yield('content')
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

    <div class="pagehead-bg   primary-bg">
    </div>

    <div class="container has-pagehead is-pagetitle">
      <div class="section">
        <h5 class="pagetitle">Main Menu {{auth()->user()->name}}</h5>
      </div>
    </div>






    <div class="container over z-depth-1">
      <div class="section">
        <div class="row ">
          <div class="ui-grid">
            <a href="{{route('kelembagaan')}}">
              <div class="col s6" style="height:165px"><img alt="image" class="" style="width: 80px; height:80px;" src="{{asset('images/family-tree.png')}}">
                <h6>
                  Kelembagaan
                </h6>
              </div>
            </a>
            <!-- <div class="col s1"></div> -->
            <a href="{{route('teknologi')}}">
              <div class="col s6" style="height:165px"><img alt="image" class="" style="width: 80px; height:80px" src="{{asset('images/smart-farm.png')}}">
                <h6>
                  Teknologi Pertanian
                </h6>
              </div>
            </a>
            <a href="{{route('alsintan')}}">
              <div class="col s6" style="height:165px"><img alt="image" class="" style="width: 80px; height:80px" src="{{asset('images/tractor.png')}}">
                <h6>
                  Akses Alsintan
                </h6>
              </div>
            </a>
            <a href="{{route('pasar.index')}}">
              <div class="col s6" style="height:165px"><img alt="image" class="" style="width: 80px; height:80px" src="{{asset('images/market.png')}}">
                <h6>
                  Akses Pasar
                </h6>
              </div>
            </a>
            <a href="{{route('produksi.index')}}">
              <div class="col s6" style="height:165px"><img alt="image" class="" style="width: 80px; height:80px" src="{{asset('images/agriculture.png')}}">
                <h6>
                  Produksi Tanaman & Peternakan
                </h6>
              </div>
            </a>
            <a href="{{route('penyuluhan')}}">
              <div class="col s6" style="height:165px"><img alt="image" class="" style="width: 80px; height:80px" src="{{asset('images/business.png')}}">
                <h6>
                  Kegiatan Penyuluhan
                </h6>
              </div>
            </a>
          </div>

        </div>
      </div>








    </div>

  </div>
  </div>










  <div class="backtotop">
    <a class="btn-floating btn primary-bg">
      <i class="mdi mdi-chevron-up"></i>
    </a>
  </div>



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
          <i class="mdi mdi-bell"></i>
          <span>Pemberitahuan {{$notif_count}}</span></span>
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







  <script src="{{('js/pwa.js')}}"></script>

  <!-- LOAD FILES AT PAGE END FOR FASTER LOADING -->

  <!-- CORE JS FRAMEWORK - START -->
  <script src="{{asset('modules/jquery/jquery-2.2.4.min.js')}}"></script>
  <script src="{{asset('modules/materialize/materialize.js')}}"></script>
  <script src="{{asset('modules/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
  <script src="{{('js/variables.js')}}"></script>
  <!-- CORE JS FRAMEWORK - END -->


  <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START -->
  <script src="{{('js/common.js')}}"></script><!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END -->


  <!-- CORE TEMPLATE JS - START -->
  <script src="{{('modules/app/init.js')}}"></script>
  <script src="{{('modules/app/settings.js')}}"></script>

  <script src="{{('modules/app/scripts.js')}}"></script>

  <!-- END CORE TEMPLATE JS - END -->


  <script src="{{('js/preloader.js')}}"></script>
</body>

</html>