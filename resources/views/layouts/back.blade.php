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
            <a href="./index.html" class="text-nowrap logo-img">
              <img src="{{asset('dist/images/logos/dark-logo.svg')}}" class="dark-logo" width="180" alt="" />
              <img src="{{('dist/images/logos/light-logo.svg')}}" class="light-logo" width="180" alt="" />
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
      <div class="offcanvas-body h-100 px-4 pt-0" data-simplebar>
        <ul class="mb-0">
          <li class="pb-7">
            <div class="d-flex align-items-center">
              <img src="dist/images/products/product-1.jpg" width="95" height="75" class="rounded-1 me-9 flex-shrink-0" alt="" />
              <div>
                <h6 class="mb-1">Supreme toys cooker</h6>
                <p class="mb-0 text-muted fs-2">Kitchenware Item</p>
                <div class="d-flex align-items-center justify-content-between mt-2">
                  <h6 class="fs-2 fw-semibold mb-0 text-muted">$250</h6>
                  <div class="input-group input-group-sm w-50">
                    <button class="btn border-0 round-20 minus p-0 bg-light-success text-success " type="button" id="add1"> - </button>
                    <input type="text" class="form-control round-20 bg-transparent text-muted fs-2 border-0  text-center qty" placeholder="" aria-label="Example text with button addon" aria-describedby="add1" value="1" />
                    <button class="btn text-success bg-light-success  p-0 round-20 border-0 add" type="button" id="addo2"> + </button>
                  </div>
                </div>
              </div>
            </div>
          </li>
          <li class="pb-7">
            <div class="d-flex align-items-center">
              <img src="dist/images/products/product-2.jpg" width="95" height="75" class="rounded-1 me-9 flex-shrink-0" alt="" />
              <div>
                <h6 class="mb-1">Supreme toys cooker</h6>
                <p class="mb-0 text-muted fs-2">Kitchenware Item</p>
                <div class="d-flex align-items-center justify-content-between mt-2">
                  <h6 class="fs-2 fw-semibold mb-0 text-muted">$250</h6>
                  <div class="input-group input-group-sm w-50">
                    <button class="btn border-0 round-20 minus p-0 bg-light-success text-success " type="button" id="add2"> - </button>
                    <input type="text" class="form-control round-20 bg-transparent text-muted fs-2 border-0  text-center qty" placeholder="" aria-label="Example text with button addon" aria-describedby="add2" value="1" />
                    <button class="btn text-success bg-light-success  p-0 round-20 border-0 add" type="button" id="addon34"> + </button>
                  </div>
                </div>
              </div>
            </div>
          </li>
          <li class="pb-7">
            <div class="d-flex align-items-center">
              <img src="dist/images/products/product-3.jpg" width="95" height="75" class="rounded-1 me-9 flex-shrink-0" alt="" />
              <div>
                <h6 class="mb-1">Supreme toys cooker</h6>
                <p class="mb-0 text-muted fs-2">Kitchenware Item</p>
                <div class="d-flex align-items-center justify-content-between mt-2">
                  <h6 class="fs-2 fw-semibold mb-0 text-muted">$250</h6>
                  <div class="input-group input-group-sm w-50">
                    <button class="btn border-0 round-20 minus p-0 bg-light-success text-success " type="button" id="add3"> - </button>
                    <input type="text" class="form-control round-20 bg-transparent text-muted fs-2 border-0  text-center qty" placeholder="" aria-label="Example text with button addon" aria-describedby="add3" value="1" />
                    <button class="btn text-success bg-light-success  p-0 round-20 border-0 add" type="button" id="addon3"> + </button>
                  </div>
                </div>
              </div>
            </div>
          </li>
        </ul>
        <div class="align-bottom">
          <div class="d-flex align-items-center pb-7">
            <span class="text-dark fs-3">Sub Total</span>
            <div class="ms-auto">
              <span class="text-dark fw-semibold fs-3">$2530</span>
            </div>
          </div>
          <div class="d-flex align-items-center pb-7">
            <span class="text-dark fs-3">Total</span>
            <div class="ms-auto">
              <span class="text-dark fw-semibold fs-3">$6830</span>
            </div>
          </div>
          <a href="./eco-checkout.html" class="btn btn-outline-primary w-100">Go to shopping cart</a>
        </div>
      </div>
    </div>
    <!--  Mobilenavbar -->
    <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="mobilenavbar" aria-labelledby="offcanvasWithBothOptionsLabel">
      <nav class="sidebar-nav scroll-sidebar">
        <div class="offcanvas-header justify-content-between">
          <img src="{{asset('dist/images/logos/favicon.ico')}}" alt="" class="img-fluid">
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body profile-dropdown mobile-navbar" data-simplebar="" data-simplebar>
          <ul id="sidebarnav">
            <li class="sidebar-item">
              <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                <span>
                  <i class="ti ti-apps"></i>
                </span>
                <span class="hide-menu">Apps</span>
              </a>
              <ul aria-expanded="false" class="collapse first-level my-3">
                <li class="sidebar-item py-2">
                  <a href="#" class="d-flex align-items-center">
                    <div class="bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                      <img src="dist/images/svgs/icon-dd-chat.svg" alt="" class="img-fluid" width="24" height="24">
                    </div>
                    <div class="d-inline-block">
                      <h6 class="mb-1 bg-hover-primary">Chat Application</h6>
                      <span class="fs-2 d-block fw-normal text-muted">New messages arrived</span>
                    </div>
                  </a>
                </li>
                <li class="sidebar-item py-2">
                  <a href="#" class="d-flex align-items-center">
                    <div class="bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                      <img src="dist/images/svgs/icon-dd-invoice.svg" alt="" class="img-fluid" width="24" height="24">
                    </div>
                    <div class="d-inline-block">
                      <h6 class="mb-1 bg-hover-primary">Invoice App</h6>
                      <span class="fs-2 d-block fw-normal text-muted">Get latest invoice</span>
                    </div>
                  </a>
                </li>
                <li class="sidebar-item py-2">
                  <a href="#" class="d-flex align-items-center">
                    <div class="bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                      <img src="dist/images/svgs/icon-dd-mobile.svg" alt="" class="img-fluid" width="24" height="24">
                    </div>
                    <div class="d-inline-block">
                      <h6 class="mb-1 bg-hover-primary">Contact Application</h6>
                      <span class="fs-2 d-block fw-normal text-muted">2 Unsaved Contacts</span>
                    </div>
                  </a>
                </li>
                <li class="sidebar-item py-2">
                  <a href="#" class="d-flex align-items-center">
                    <div class="bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                      <img src="dist/images/svgs/icon-dd-message-box.svg" alt="" class="img-fluid" width="24" height="24">
                    </div>
                    <div class="d-inline-block">
                      <h6 class="mb-1 bg-hover-primary">Email App</h6>
                      <span class="fs-2 d-block fw-normal text-muted">Get new emails</span>
                    </div>
                  </a>
                </li>
                <li class="sidebar-item py-2">
                  <a href="#" class="d-flex align-items-center">
                    <div class="bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                      <img src="dist/images/svgs/icon-dd-cart.svg" alt="" class="img-fluid" width="24" height="24">
                    </div>
                    <div class="d-inline-block">
                      <h6 class="mb-1 bg-hover-primary">User Profile</h6>
                      <span class="fs-2 d-block fw-normal text-muted">learn more information</span>
                    </div>
                  </a>
                </li>
                <li class="sidebar-item py-2">
                  <a href="#" class="d-flex align-items-center">
                    <div class="bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                      <img src="dist/images/svgs/icon-dd-date.svg" alt="" class="img-fluid" width="24" height="24">
                    </div>
                    <div class="d-inline-block">
                      <h6 class="mb-1 bg-hover-primary">Calendar App</h6>
                      <span class="fs-2 d-block fw-normal text-muted">Get dates</span>
                    </div>
                  </a>
                </li>
                <li class="sidebar-item py-2">
                  <a href="#" class="d-flex align-items-center">
                    <div class="bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                      <img src="dist/images/svgs/icon-dd-lifebuoy.svg" alt="" class="img-fluid" width="24" height="24">
                    </div>
                    <div class="d-inline-block">
                      <h6 class="mb-1 bg-hover-primary">Contact List Table</h6>
                      <span class="fs-2 d-block fw-normal text-muted">Add new contact</span>
                    </div>
                  </a>
                </li>
                <li class="sidebar-item py-2">
                  <a href="#" class="d-flex align-items-center">
                    <div class="bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                      <img src="dist/images/svgs/icon-dd-application.svg" alt="" class="img-fluid" width="24" height="24">
                    </div>
                    <div class="d-inline-block">
                      <h6 class="mb-1 bg-hover-primary">Notes Application</h6>
                      <span class="fs-2 d-block fw-normal text-muted">To-do and Daily tasks</span>
                    </div>
                  </a>
                </li>
                <ul class="px-8 mt-7 mb-4">
                  <li class="sidebar-item mb-3">
                    <h5 class="fs-5 fw-semibold">Quick Links</h5>
                  </li>
                  <li class="sidebar-item py-2">
                    <a class="fw-semibold text-dark" href="#">Pricing Page</a>
                  </li>
                  <li class="sidebar-item py-2">
                    <a class="fw-semibold text-dark" href="#">Authentication Design</a>
                  </li>
                  <li class="sidebar-item py-2">
                    <a class="fw-semibold text-dark" href="#">Register Now</a>
                  </li>
                  <li class="sidebar-item py-2">
                    <a class="fw-semibold text-dark" href="#">404 Error Page</a>
                  </li>
                  <li class="sidebar-item py-2">
                    <a class="fw-semibold text-dark" href="#">Notes App</a>
                  </li>
                  <li class="sidebar-item py-2">
                    <a class="fw-semibold text-dark" href="#">User Application</a>
                  </li>
                  <li class="sidebar-item py-2">
                    <a class="fw-semibold text-dark" href="#">Account Settings</a>
                  </li>
                </ul>
              </ul>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="app-chat.html" aria-expanded="false">
                <span>
                  <i class="ti ti-message-dots"></i>
                </span>
                <span class="hide-menu">Chat</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="app-calendar.html" aria-expanded="false">
                <span>
                  <i class="ti ti-calendar"></i>
                </span>
                <span class="hide-menu">Calendar</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="app-email.html" aria-expanded="false">
                <span>
                  <i class="ti ti-mail"></i>
                </span>
                <span class="hide-menu">Email</span>
              </a>
            </li>
          </ul>
        </div>
      </nav>
    </div>
    <!-- Search Bar -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasRightLabel">Shopping Cart</h5>
        <span data-bs-dismiss="offcanvas" class="link-secondary cursor-pointer">
          <!-- <i class="feather-base ms-4" data-feather="x-circle"></i> -->
        </span>
      </div>
      <div class="offcanvas-body h-100" data-simplebar>
        <ul>
          <li class="pb-4 border-bottom">
            <div class="d-flex align-items-center py-2">
              <img src="dist/images/products/product-1.jpg" width="98" class="rounded-2 me-3" alt="" />
              <div>
                <h6 class="fs-4 fw-normal mb-0">Supreme toys cooker</h6>
                <p class="mb-0 text-muted fs-3">Kitchenware Item</p>
                <div class="d-flex align-items-center mt-1">
                  <h6 class="fs-4 me-2 fw-normal mb-0">$250</h6>
                  <div class="input-group input-group-sm w-35">
                    <button class="btn btn-light-success text-success rounded-1 minus" type="button" id="add1"> - </button>
                    <input type="text" class="form-control bg-transparent border-0 rounded-1 text-center qty" placeholder="" aria-label="Example text with button addon" aria-describedby="add1" value="1" />
                    <button class="btn btn-light-success text-success rounded-1 add" type="button" id="addo2"> + </button>
                  </div>
                </div>
              </div>
            </div>
          </li>
          <li class="py-4 border-bottom">
            <div class="d-flex align-items-center py-2">
              <img src="dist/images/products/product-2.jpg" width="98" class="rounded-2 me-3" alt="" />
              <div>
                <h6 class="fs-4 fw-normal mb-0">Supreme toys cooker</h6>
                <p class="mb-0 text-muted fs-3">Kitchenware Item</p>
                <div class="d-flex align-items-center mt-1">
                  <h6 class="fs-4 me-2 fw-normal mb-0">$250</h6>
                  <div class="input-group input-group-sm w-35">
                    <button class="btn btn-light-success text-success rounded-1 minus" type="button" id="add2"> - </button>
                    <input type="text" class="form-control bg-transparent border-0 rounded-1 text-center qty" placeholder="" aria-label="Example text with button addon" aria-describedby="add2" value="1" />
                    <button class="btn btn-light-success text-success rounded-1 add" type="button" id="addon34"> + </button>
                  </div>
                </div>
              </div>
            </div>
          </li>
          <li class="py-4 border-bottom">
            <div class="d-flex align-items-center py-2">
              <img src="dist/images/products/product-3.jpg" width="98" class="rounded-2 me-3" alt="" />
              <div>
                <h6 class="fs-4 fw-normal mb-0">Supreme toys cooker</h6>
                <p class="mb-0 text-muted fs-3">Kitchenware Item</p>
                <div class="d-flex align-items-center mt-1">
                  <h6 class="fs-4 me-2 fw-normal mb-0">$250</h6>
                  <div class="input-group input-group-sm w-35">
                    <button class="btn btn-light-success text-success rounded-1 minus" type="button" id="add3"> - </button>
                    <input type="text" class="form-control bg-transparent border-0 rounded-1 text-center qty" placeholder="" aria-label="Example text with button addon" aria-describedby="add3" value="1" />
                    <button class="btn btn-light-success text-success rounded-1 add" type="button" id="addon3"> + </button>
                  </div>
                </div>
              </div>
            </div>
          </li>
        </ul>
        <div class="align-bottom">
          <div class="d-flex align-items-center py-2">
            <span class="text-muted fs-3">Sub Total</span>
            <div class="ms-auto">
              <span class="text-dark fw-normal fs-3">$2530</span>
            </div>
          </div>
          <div class="d-flex align-items-center py-2">
            <span class="text-muted fs-3">Total</span>
            <div class="ms-auto">
              <span class="text-dark fw-normal fs-3">$6830</span>
            </div>
          </div>
          <a class="btn btn-primary text-white w-100 d-block" href="javascript:void(0);"> Place order </a>
        </div>
      </div>
    </div>
    <!-- Search Bar -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content rounded-1">
          <div class="modal-header border-bottom">
            <input type="search" class="form-control fs-3" placeholder="Search here" id="search" />
            <span data-bs-dismiss="modal" class="lh-1 cursor-pointer">
              <i class="ti ti-x fs-5 ms-3"></i>
            </span>
          </div>
          <div class="modal-body message-body" data-simplebar="">
            <h5 class="mb-0 fs-5 p-1">Quick Page Links</h5>
            <ul class="list mb-0 py-2">
              <li class="p-1 mb-1 bg-hover-light-black">
                <a href="#">
                  <span class="fs-3 text-black fw-normal d-block">Modern</span>
                  <span class="fs-3 text-muted d-block">/dashboards/dashboard1</span>
                </a>
              </li>
              <li class="p-1 mb-1 bg-hover-light-black">
                <a href="#">
                  <span class="fs-3 text-black fw-normal d-block">Dashboard</span>
                  <span class="fs-3 text-muted d-block">/dashboards/dashboard2</span>
                </a>
              </li>
              <li class="p-1 mb-1 bg-hover-light-black">
                <a href="#">
                  <span class="fs-3 text-black fw-normal d-block">Contacts</span>
                  <span class="fs-3 text-muted d-block">/apps/contacts</span>
                </a>
              </li>
              <li class="p-1 mb-1 bg-hover-light-black">
                <a href="#">
                  <span class="fs-3 text-black fw-normal d-block">Posts</span>
                  <span class="fs-3 text-muted d-block">/apps/blog/posts</span>
                </a>
              </li>
              <li class="p-1 mb-1 bg-hover-light-black">
                <a href="#">
                  <span class="fs-3 text-black fw-normal d-block">Detail</span>
                  <span class="fs-3 text-muted d-block">/apps/blog/detail/streaming-video-way-before-it-was-cool-go-dark-tomorrow</span>
                </a>
              </li>
              <li class="p-1 mb-1 bg-hover-light-black">
                <a href="#">
                  <span class="fs-3 text-black fw-normal d-block">Shop</span>
                  <span class="fs-3 text-muted d-block">/apps/ecommerce/shop</span>
                </a>
              </li>
              <li class="p-1 mb-1 bg-hover-light-black">
                <a href="#">
                  <span class="fs-3 text-black fw-normal d-block">Modern</span>
                  <span class="fs-3 text-muted d-block">/dashboards/dashboard1</span>
                </a>
              </li>
              <li class="p-1 mb-1 bg-hover-light-black">
                <a href="#">
                  <span class="fs-3 text-black fw-normal d-block">Dashboard</span>
                  <span class="fs-3 text-muted d-block">/dashboards/dashboard2</span>
                </a>
              </li>
              <li class="p-1 mb-1 bg-hover-light-black">
                <a href="#">
                  <span class="fs-3 text-black fw-normal d-block">Contacts</span>
                  <span class="fs-3 text-muted d-block">/apps/contacts</span>
                </a>
              </li>
              <li class="p-1 mb-1 bg-hover-light-black">
                <a href="#">
                  <span class="fs-3 text-black fw-normal d-block">Posts</span>
                  <span class="fs-3 text-muted d-block">/apps/blog/posts</span>
                </a>
              </li>
              <li class="p-1 mb-1 bg-hover-light-black">
                <a href="#">
                  <span class="fs-3 text-black fw-normal d-block">Detail</span>
                  <span class="fs-3 text-muted d-block">/apps/blog/detail/streaming-video-way-before-it-was-cool-go-dark-tomorrow</span>
                </a>
              </li>
              <li class="p-1 mb-1 bg-hover-light-black">
                <a href="#">
                  <span class="fs-3 text-black fw-normal d-block">Shop</span>
                  <span class="fs-3 text-muted d-block">/apps/ecommerce/shop</span>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
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
        <div class="theme-colors pb-4">
          <h6 class="fw-semibold fs-4 mb-1">Theme Colors</h6>
          <div class="d-flex align-items-center gap-3 my-3">
            <ul class="list-unstyled mb-0 d-flex gap-3 flex-wrap change-colors">
              <li class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center justify-content-center">
                <a href="javascript:void(0)" class="rounded-circle position-relative d-block customizer-bgcolor skin1-bluetheme-primary active-theme " onclick="toggleTheme('{{asset('dist/css/style.min.css')}}')" data-color="blue_theme" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="BLUE_THEME"><i class="ti ti-check text-white d-flex align-items-center justify-content-center fs-5"></i></a>
              </li>
              <li class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center justify-content-center">
                <a href="javascript:void(0)" class="rounded-circle position-relative d-block customizer-bgcolor skin2-aquatheme-primary " onclick="toggleTheme('dist/css/style-aqua.min.css')" data-color="aqua_theme" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="AQUA_THEME"><i class="ti ti-check  text-white d-flex align-items-center justify-content-center fs-5"></i></a>
              </li>
              <li class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center justify-content-center">
                <a href="javascript:void(0)" class="rounded-circle position-relative d-block customizer-bgcolor skin3-purpletheme-primary" onclick="toggleTheme('dist/css/style-purple.min.css')" data-color="purple_theme" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="PURPLE_THEME"><i class="ti ti-check  text-white d-flex align-items-center justify-content-center fs-5"></i></a>
              </li>
              <li class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center justify-content-center">
                <a href="javascript:void(0)" class="rounded-circle position-relative d-block customizer-bgcolor skin4-greentheme-primary" onclick="toggleTheme('dist/css/style-green.min.css')" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="GREEN_THEME"><i class="ti ti-check  text-white d-flex align-items-center justify-content-center fs-5"></i></a>
              </li>
              <li class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center justify-content-center">
                <a href="javascript:void(0)" class="rounded-circle position-relative d-block customizer-bgcolor skin5-cyantheme-primary" onclick="toggleTheme('dist/css/style-cyan.min.css')" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="CYAN_THEME"><i class="ti ti-check  text-white d-flex align-items-center justify-content-center fs-5"></i></a>
              </li>
              <li class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center justify-content-center">
                <a href="javascript:void(0)" class="rounded-circle position-relative d-block customizer-bgcolor skin6-orangetheme-primary" onclick="toggleTheme('dist/css/style-orange.min.css')" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="ORANGE_THEME"><i class="ti ti-check  text-white d-flex align-items-center justify-content-center fs-5"></i></a>
              </li>
            </ul>
          </div>
        </div>
        <div class="layout-type pb-4">
          <h6 class="fw-semibold fs-4 mb-1">Layout Type</h6>
          <div class="d-flex align-items-center gap-3 my-3">
            <a href="./index.html" class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center gap-2">
              <i class="ti ti-layout-sidebar fs-6 text-primary"></i>
              <span class="text-dark">Vertical</span>
            </a>
            <a href="../horizontal/index.html" class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center gap-2">
              <i class="ti ti-layout-navbar fs-6 text-dark"></i>
              <span class="text-dark">Horizontal</span>
            </a>
          </div>
        </div>
        <div class="container-option pb-4">
          <h6 class="fw-semibold fs-4 mb-1">Container Option</h6>
          <div class="d-flex align-items-center gap-3 my-3">
            <a href="javascript:void(0)" class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center gap-2 boxed-width text-dark">
              <i class="ti ti-layout-distribute-vertical fs-7 text-primary"></i>
              <span class="text-dark">Boxed</span>
            </a>
            <a href="javascript:void(0)" class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center gap-2 full-width text-dark">
              <i class="ti ti-layout-distribute-horizontal fs-7"></i>
              <span class="text-dark">Full</span>
            </a>
          </div>
        </div>
        <div class="sidebar-type pb-4">
          <h6 class="fw-semibold fs-4 mb-1">Sidebar Type</h6>
          <div class="d-flex align-items-center gap-3 my-3">
            <a href="javascript:void(0)" class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center gap-2 fullsidebar">
              <i class="ti ti-layout-sidebar-right fs-7"></i>
              <span class="text-dark">Full</span>
            </a>
            <a href="javascript:void(0)" class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center text-dark sidebartoggler gap-2">
              <i class="ti ti-layout-sidebar fs-7"></i>
              <span class="text-dark">Collapse</span>
            </a>
          </div>
        </div>
        <div class="card-with pb-4">
          <h6 class="fw-semibold fs-4 mb-1">Card With</h6>
          <div class="d-flex align-items-center gap-3 my-3">
            <a href="javascript:void(0)" class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center gap-2 text-dark cardborder">
              <i class="ti ti-border-outer fs-7"></i>
              <span class="text-dark">Border</span>
            </a>
            <a href="javascript:void(0)" class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center gap-2 cardshadow">
              <i class="ti ti-border-none fs-7"></i>
              <span class="text-dark">Shadow</span>
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
    <script src="{{asset("dist/libs/jquery/dist/jquery.min.js")}}"></script>
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
    <script src="{{asset("dist/libs/simplebar/dist/simplebar.min.js")}}"></script>
    <script src="{{asset("dist/libs/bootstrap/dist/js/bootstrap.bundle.min.js")}}"></script>
    <!-- core files -->
    <script src="{{asset('dist/js/app.min.js')}}"></script>
    <script src="{{asset('dist/js/app.init.js')}}"></script>
    <script src="{{asset('dist/js/app-style-switcher.js')}}"></script>
    <script src="{{asset('dist/js/sidebarmenu.js')}}"></script>
    <script src="{{asset('dist/js/custom.js')}}"></script>
    <!-- current page js files -->
    <script src="{{asset("dist/libs/apexcharts/dist/apexcharts.min.js")}}"></script>
    <script src="{{asset('dist/js/dashboard2.js')}}"></script>
  </body>

  </html>