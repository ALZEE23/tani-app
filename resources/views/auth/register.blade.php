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
    <title>Jendela Tani: Register</title>
    <meta content="Odis Mobile App" name="description" />
    <meta content="themepassion" name="author" />


    <!-- App Icons -->
    <link rel="apple-touch-icon" sizes="57x57" href="images/icons/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="images/icons/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="images/icons/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="images/icons/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="images/icons/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="images/icons/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="images/icons/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="images/icons/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="images/icons/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="images/icons/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="512x512" href="images/icons/android-icon-512x512.png">
    <link rel="icon" type="image/png" sizes="32x32" href="images/icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="images/icons/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="images/icons/favicon-16x16.png">
    <link rel="manifest" href="images/icons/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="images/icons/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">






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


<body class=" menu-full  isfullscreen  html" data-header="light" data-footer="light" data-header_align="app" data-menu_type="left" data-menu="light" data-menu_icons="on" data-footer_type="left" data-site_mode="light" data-footer_menu="show" data-footer_menu_style="light">
    <div class="preloader-background">
        <div class="preloader-wrapper">
            <div class="loader">
            </div>
        </div>
    </div>



    <!-- SIDEBAR - START -->

    <!-- MAIN MENU - START -->



    <!-- MAIN MENU - END -->



    <!--  SIDEBAR - END --><!-- SIDEBAR - START -->

    <!-- MAIN MENU - START -->



    <!-- MAIN MENU - END -->



    <!--  SIDEBAR - END -->

    <!-- START navigation -->

    <div class="content-area">





        <div class="login-bg access-login"></div>


        <div class="container login-area">
            <div class="section">

                <div class="row center">
                    <img src="images/logo-login.png" alt="">
                </div>

                <h3 class="bot-20 center white-text">Register</h3>


                <div class="row">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf


                        <div class="col s10 offset-s1">

                            <select name="kecamatan" id="">
                                <option value="Pilih Kecamatan">Pilih Kecamatan</option>
                                @foreach ($kecamatan as $data)
                                <option value="{{$data->kecamatan}}">{{$data->kecamatan}}</option>
                                @endforeach
                                @error('kecamatan')
                                <span class=" invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </select>
                        </div>
                        <div class="input-field col s10 offset-s1">
                            <input id="name" type="text" class="validate" name="name" value="{{old('name')}}">
                            <label for="name">Nama</label>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="input-field col s10 offset-s1">
                            <input id="email311" type="email" class="validate" name="email" value="{{old('email')}}">
                            <label for="email311">email</label>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="input-field col s10 offset-s1">
                            <input id="nik" type="text" class="validate" name="nik" value="{{old('nik')}}">
                            <label for="nik">Nik</label>
                            @error('nik')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="input-field col s10 offset-s1">
                            <input id="no_telepon" type="text" class="validate" name="no_telepon" value="{{old('no_telepon')}}">
                            <label for="no_telepon">No Telepon</label>
                            @error('no_telepon')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>



                        <div class="input-field col s10 offset-s1">
                            <input id="pass311" type="password" class="validate" name="password" value="{{old('password')}}">
                            <label for="pass311">Password</label>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                </div>


                <div class="row center">
                    <button type="submit" class="waves-effect waves-light btn-large bg-secondary">Register</button>
                    <div class="spacer"></div>
                    <div class="links">

                        <a href="{{ route('login') }}">Login</a>
                    </div>

                    <div class="spacer"></div>

                    </form>

                </div>






            </div>
        </div>







    </div><!--.content-area-->







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