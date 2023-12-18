  <!DOCTYPE html>
  <html lang="en">

  <head>
    <!--  Title -->
    <title>Dashboard Jendela Tani</title>
    <!--  Required Meta Tag -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="handheldfriendly" content="true" />
    <meta name="MobileOptimized" content="width" />
    <meta name="description" content="Mordenize" />
    <meta name="author" content="" />
    <meta name="keywords" content="Mordenize" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!--  Favicon -->
    <link rel="shortcut icon" type="image/png" href="{{asset('dist/images/logos/favicon.ico')}}" />
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="{{asset('dist/libs/owl.carousel/dist/assets/owl.carousel.min.css')}}">
    <!-- Core Css -->
    <link id="themeColors" rel="stylesheet" href="{{asset('dist/css/style.min.css')}}" />
    <link rel="stylesheet" href="{{asset('dist/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css')}}">
    <script src="{{asset('dist/libs/jquery/dist/jquery.min.js')}}"></script>

    <script src="{{asset('dist/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('dist/js/datatable/datatable-basic.init.js')}}"></script>
  </head>

  <body>
    <!-- Preloader -->
    <div class="preloader">
      <img src="{{asset('dist/images/logos/favicon.ico')}}" alt="loader" class="lds-ripple img-fluid" />
    </div>
    <!-- Preloader -->
    <div class="preloader">
      <img src="{{asset('dist/images/logos/favicon.ico')}}" alt="loader" class="lds-ripple img-fluid" />
    </div>
    <!-- Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
      <!-- Sidebar Start -->
      <aside class="left-sidebar">
        <!-- Sidebar scroll-->
        <div>
          <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="./index.html" class="text-nowrap logo-img text-center">
              <img src="{{asset('images/logo-login.png')}}" class="dark-logo" width="60" alt="" style="margin-left: 60px;" />
            </a>
            <div class="close-btn d-lg-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
              <i class="ti ti-x fs-8 text-muted"></i>
            </div>
          </div>
          <!-- Sidebar navigation-->
          <nav class="sidebar-nav scroll-sidebar" data-simplebar>
            <ul id="sidebarnav">
              <!-- ============================= -->
              <!-- Home -->
              <!-- ============================= -->
              <li class="nav-small-cap">
                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                <span class="hide-menu">Home</span>
              </li>
              <!-- =================== -->
              <!-- Dashboard -->
              <!-- =================== -->
              <li class="sidebar-item">
                <a class="sidebar-link {{ request()->is('admin.dashboard') ? 'active' : '' }}" href="{{route('admin.dashboard')}}" aria-expanded="false">
                  <span>
                    <i class="ti ti-dashboard"></i>
                  </span>
                  <span class="hide-menu">Dashboard</span>
                </a>
              </li>


              <!-- ============================= -->
              <!-- Apps -->
              <!-- ============================= -->
              <li class="nav-small-cap">
                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                <span class="hide-menu">Wilayah</span>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link {{ request()->is('kecamatan') ? 'active' : '' }}" href="{{route('kecamatan.index')}}" aria-expanded="false">
                  <span>
                    <i class="ti ti-list-details"></i>
                  </span>
                  <span class="hide-menu">Kecamatan</span>
                </a>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link {{ request()->is('desa') ? 'active' : '' }}" href="{{route('desa.index')}}" aria-expanded="false">
                  <span>
                    <i class="ti ti-list-details"></i>
                  </span>
                  <span class="hide-menu">Desa</span>
                </a>
              </li>
              {{-- <li class="sidebar-item">
                <a class="sidebar-link" href="./page-user-profile.html" aria-expanded="false">
                  <span>
                    <i class="ti ti-user-circle"></i>
                  </span>
                  <span class="hide-menu">Users</span>
                </a>
              </li> --}}
              <!-- ============================= -->
              <!-- PAGES -->
              <!-- ============================= -->
              <li class="nav-small-cap">
                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                <span class="hide-menu">Data</span>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link {{ request()->is('harga.index') ? 'active' : '' }}" href="{{route('harga.index')}}" aria-expanded="false">
                  <span>
                    <i class="ti ti-report"></i>
                  </span>
                  <span class="hide-menu">Harga Pasar</span>
                </a>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link {{ request()->is('petani.index') ? 'active' : '' }}" href="{{route('petani.index')}}" aria-expanded="false">
                  <span>
                    <i class="ti ti-report"></i>
                  </span>
                  <span class="hide-menu">Petani</span>
                </a>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link {{ request()->is('petugas.index') ? 'active' : '' }}" href="{{route('petugas.index')}}" aria-expanded="false">
                  <span>
                    <i class="ti ti-report"></i>
                  </span>
                  <span class="hide-menu">Petugas</span>
                </a>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link {{ request()->is('dinas.index') ? 'active' : '' }}" href="{{route('dinas.index')}}" aria-expanded="false">
                  <span>
                    <i class="ti ti-report"></i>
                  </span>
                  <span class="hide-menu">Dinas</span>
                </a>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link {{ request()->is('penyuluh.index') ? 'active' : '' }}" href="{{route('penyuluh.index')}}" aria-expanded="false">
                  <span>
                    <i class="ti ti-report"></i>
                  </span>
                  <span class="hide-menu">Penyuluh</span>
                </a>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link {{ request()->is('poktan.index') ? 'active' : '' }}" href="{{route('dinas.index')}}" aria-expanded="false">
                  <span>
                    <i class="ti ti-report"></i>
                  </span>
                  <span class="hide-menu">Poktan</span>
                </a>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link {{ request()->is('gakpoktan.index') ? 'active' : '' }}" href="{{route('gakpoktan.index')}}" aria-expanded="false">
                  <span>
                    <i class="ti ti-report"></i>
                  </span>
                  <span class="hide-menu">Gakpoktan</span>
                </a>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link {{ request()->is('alsintan.index') ? 'active' : '' }}" href="" aria-expanded="false">
                  <span>
                    <i class="ti ti-report"></i>
                  </span>
                  <span class="hide-menu">Alsintan</span>
                </a>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link {{ request()->is('market.index') ? 'active' : '' }}" href="" aria-expanded="false">
                  <span>
                    <i class="ti ti-report"></i>
                  </span>
                  <span class="hide-menu">Market</span>
                </a>
              </li>
              <li class="sidebar-item">
                <form action="{{ route('logout') }}" method="POST">
                  <button type="submit" class="sidebar-link" href="">
                    <span class="d-flex">
                      <i class="ti ti-login"></i>
                    </span>
                    <span class="hide-menu">
                      @csrf
                    </span>
                  </button>
                </form>

              </li>
            </ul>
          </nav>
          <div class="fixed-profile p-3 bg-light-secondary rounded sidebar-ad mt-3">
            <div class="hstack gap-3">
              <div class="john-img">
                <img src="dist/images/profile/user-1.jpg" class="rounded-circle" width="40" height="40" alt="">
              </div>
              <div class="john-title">
                <h6 class="mb-0 fs-4 fw-semibold">Mathew</h6>
                <span class="fs-2 text-dark">Designer</span>
              </div>
              <button class="border-0 bg-transparent text-primary ms-auto" tabindex="0" type="button" aria-label="logout" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="logout">
                <i class="ti ti-power fs-6"></i>
              </button>
            </div>
          </div>
          <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
      </aside>
      <!-- Sidebar End -->
      <!-- Main wrapper -->
      <div class="body-wrapper">
        <!-- Header Start -->
        <header class="app-header">
          <nav class="navbar navbar-expand-lg navbar-light">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link sidebartoggler nav-icon-hover ms-n3" id="headerCollapse" href="javascript:void(0)">
                  <i class="ti ti-menu-2"></i>
                </a>
              </li>
            </ul>
            <div class="d-block d-lg-none">
              <img src="{{asset('dist/images/logos/dark-logo.svg')}}" class="dark-logo" width="180" alt="" />
              <img src="{{asset('dist/images/logos/light-logo.svg')}}" class="light-logo" width="180" alt="" />
            </div>
            <button class="navbar-toggler p-0 border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="p-2">
                <i class="ti ti-dots fs-7"></i>
              </span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
              <div class="d-flex align-items-center justify-content-between">
                <a href="javascript:void(0)" class="nav-link d-flex d-lg-none align-items-center justify-content-center" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobilenavbar" aria-controls="offcanvasWithBothOptions">
                  <i class="ti ti-align-justified fs-7"></i>
                </a>

              </div>
            </div>
          </nav>
        </header>
        <!-- Header End -->
        @yield('content')
        <!-- container-fluid over -->
      </div>
      <div class="dark-transparent sidebartoggler"></div>
      <div class="dark-transparent sidebartoggler"></div>
    </div>
    <!--  Shopping Cart -->
    <div class="offcanvas offcanvas-end shopping-cart" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
      <div class="offcanvas-header py-4">
        <h5 class="offcanvas-title fs-5 fw-semibold" id="offcanvasRightLabel">Shopping Cart</h5>
        <span class="badge bg-primary rounded-4 px-3 py-1 lh-sm">5 new</span>
      </div>
    </div>
    <!--  Mobilenavbar -->

    <!-- Customizer -->
    <button class="btn btn-primary p-3 rounded-circle d-flex align-items-center justify-content-center customizer-btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
      <i class="ti ti-settings fs-7" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Settings"></i>
    </button>
    <div class="offcanvas offcanvas-end customizer" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel" data-simplebar="">
      <div class="d-flex align-items-center justify-content-between p-3 border-bottom">
        <h4 class="offcanvas-title fw-semibold" id="offcanvasExampleLabel">Settings</h4>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body p-4">
        <div class="theme-option pb-4">
          <h6 class="fw-semibold fs-4 mb-1">Theme Option</h6>
          <div class="d-flex align-items-center gap-3 my-3">
            <a href="javascript:void(0)" onclick="toggleTheme('{{asset('dist/css/style.min.css')}}')" class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center gap-2 light-theme text-dark">
              <i class="ti ti-brightness-up fs-7 text-primary"></i>
              <span class="text-dark">Light</span>
            </a>
            <a href="javascript:void(0)" onclick="toggleTheme('dist/css/style-dark.min.css')" class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center gap-2 dark-theme text-dark">
              <i class="ti ti-moon fs-7 "></i>
              <span class="text-dark">Dark</span>
            </a>
          </div>
        </div>
        <div class="theme-direction pb-4">
          <h6 class="fw-semibold fs-4 mb-1">Theme Direction</h6>
          <div class="d-flex align-items-center gap-3 my-3">
            <a href="./index.html" class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center gap-2">
              <i class="ti ti-text-direction-ltr fs-6 text-primary"></i>
              <span class="text-dark">LTR</span>
            </a>
            <a href="../rtl/index.html" class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center gap-2">
              <i class="ti ti-text-direction-rtl fs-6 text-dark"></i>
              <span class="text-dark">RTL</span>
            </a>
          </div>
        </div>

      </div>
    </div>
    <!-- Customizer -->
    <!-- Import Js Files -->

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if (session('success'))
    <script>
      Swal.fire('Success', '{{ session('
        success ') }}', 'success');
    </script>
    @endif

    @if ($errors->any())
    <script>
      Swal.fire({
        title: 'Error!',
        icon: 'error',
        html: "<ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>",
      });
    </script>
    @endif
    <script>
      $(document).ready(function() {
        $('#flexSwitchCheckDefault').on('change', function() {
          if (this.checked) {
            $('input[name="status"]').val(1);
          } else {
            $('input[name="status"]').val(0);
          }
        });
      });
    </script>
    <script src="{{asset('dist/libs/simplebar/dist/simplebar.min.js')}}"></script>
    <script src="{{asset('dist/libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <!-- core files -->
    <script src="{{asset('dist/js/app.min.js')}}"></script>
    <script src="{{asset('dist/js/app.init.js')}}"></script>
    <script src="{{asset('dist/js/app-style-switcher.js')}}"></script>
    <script src="{{asset('dist/js/sidebarmenu.js')}}"></script>
    <script src="{{asset('dist/js/custom.js')}}"></script>
    <!-- current page js files -->

    <!-- <script src="{{asset('dist/libs/apexcharts/dist/apexcharts.min.js')}}"></script> -->
    <script src="{{asset('dist/js/dashboard2.js')}}"></script>
  </body>

  </html>