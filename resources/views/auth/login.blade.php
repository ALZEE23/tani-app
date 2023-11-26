@extends('layouts.app')

@section('content')
<nav class="fix_topscroll logo_on_fixed  topbar navigation">
  <div class="nav-wrapper container">
    <a id="logo-container" href="index.html" class=" brand-logo " ><svg xmlns="http://www.w3.org/2000/svg" width="400.000000pt" height="400.000000pt" viewBox="0 0 400.000000 400.000000" preserveAspectRatio="xMidYMid meet">
<g transform="translate(0.000000,400.000000) scale(0.100000,-0.100000)" fill="#000000" stroke="none">
<path d="M1810 3566 c0 -3 13 -24 29 -48 16 -24 34 -62 41 -84 l12 -42 101 -7 c248 -17 377 -112 444 -325 37 -121 43 -235 43 -931 l0 -676 49 -7 c27 -4 75
-15 107 -26 31 -11 59 -20 61 -20 2 0 2 343 0 763 -3 722 -5 766 -24 842 -45 182 -95 285 -182 374 -130 134 -294 191 -547 191 -74 0 -134 -2 -134 -4z"/>
<path d="M1482 3541 c-55 -14 -110 -58 -142 -114 -87 -152 22 -337 200 -337 133 0 230 99 230 234 0 138 -150 251 -288 217z"/>
<path d="M1226 3093 c-4 -9 -16 -62 -26 -118 -19 -94 -20 -148 -20 -971 0 -819 1 -876 19 -975 39 -208 90 -318 197 -425 76 -77 164 -127 279 -159 79 -22 361 -32 448 -16 79 15 167 42 167 51 0 3 -22 16 -48 28 -26 12 -71 41 -99 65 l-51 44 -64 -9 c-34 -5 -103 -6 -153 -3 -258 19 -391 134 -451 390 -18 75 -19 134 -19 995 0 503 3 931 6 950 6 33 5 36 -34 54 -22 11 -63 41 -91 68 -27 26 -51 48 -52 48 -1 0 -5 -8 -8 -17z"/>
<path d="M2356 1304 c-27 -9 -61 -23 -75 -31 -53 -33 -123 -110 -149 -163 -24 -48 -27 -67 -27 -155 0 -87 3 -107 26 -155 103 -215 370 -276 563 -129 86 66 136 170 136 284 0 98 -27 170 -90 238 -101 111 -246 153 -384 111z"/>
</g>
</svg>Odis</a>    
      
      <a href="#" data-target="" class="waves-effect waves-circle navicon back-button htmlmode show-on-large "><i class="mdi mdi-chevron-left" data-page=""></i></a>
    
    
    <a href="#" data-target="slide-nav" class="waves-effect waves-circle navicon sidenav-trigger show-on-large"><i class="app-icon-menu61"></i></a>

    <a href="#" data-target="slide-settings" class="waves-effect waves-circle navicon right sidenav-trigger show-on-large"><i class="app-icon-equalizer2"></i></a>

    <a href="#" data-target="" class="waves-effect waves-circle navicon right nav-site-mode show-on-large"><i class="app-icon-brightness-contrast"></i></a>
    <!-- <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a> -->
  </div>
</nav>

  <!-- END navigation -->


  <ul id="slide-settings" class="sidenav sidesettings ">
    <li class="menulinks">
      <ul class="collapsible">
      <!-- Menu Settings Start-->
      <li class="sh-wrap"><div class="subheader">Themes</div></li>
                    <li class="lvl1  theme">
                    <div class="waves-effect appsettings " data-type="theme" data-value="red">
                        <a href="#!">
                        <i class="mdi mdi-checkbox-intermediate red-text text-lighten-2"></i>
                        <span class="title">Red</span>  </a>
                        </div></li>
                    <li class="lvl1  theme">
                    <div class="waves-effect appsettings " data-type="theme" data-value="orange">
                        <a href="#!">
                        <i class="mdi mdi-checkbox-blank-outline deep-orange-text text-lighten-2"></i>
                        <span class="title">Orange</span>  </a>
                        </div></li>
                    <li class="lvl1  theme">
                    <div class="waves-effect appsettings " data-type="theme" data-value="blue">
                        <a href="#!">
                        <i class="mdi mdi-checkbox-blank-outline blue-text text-lighten-2"></i>
                        <span class="title">Blue</span>  </a>
                        </div></li>
                    <li class="lvl1  theme">
                    <div class="waves-effect appsettings " data-type="theme" data-value="teal">
                        <a href="#!">
                        <i class="mdi mdi-checkbox-blank-outline teal-text text-lighten-2"></i>
                        <span class="title">Teal</span>  </a>
                        </div></li>
                    <li class="lvl1  theme">
                    <div class="waves-effect appsettings " data-type="theme" data-value="pink">
                        <a href="#!">
                        <i class="mdi mdi-checkbox-blank-outline pink-text text-lighten-2"></i>
                        <span class="title">Pink</span>  </a>
                        </div></li>
                    <li class="lvl1  theme">
                    <div class="waves-effect appsettings " data-type="theme" data-value="light-green">
                        <a href="#!">
                        <i class="mdi mdi-checkbox-blank-outline light-green-text text-lighten-2"></i>
                        <span class="title">Light Green</span>  </a>
                        </div></li>
                    <li class="lvl1  theme">
                    <div class="waves-effect appsettings " data-type="theme" data-value="purple">
                        <a href="#!">
                        <i class="mdi mdi-checkbox-blank-outline purple-text text-lighten-2"></i>
                        <span class="title">Violet</span>  </a>
                        </div></li>
                    <li class="lvl1  theme">
                    <div class="waves-effect appsettings " data-type="theme" data-value="green">
                        <a href="#!">
                        <i class="mdi mdi-checkbox-blank-outline green-text text-lighten-2"></i>
                        <span class="title">Green</span>  </a>
                        </div></li>
                    <li class="lvl1  theme">
                    <div class="waves-effect appsettings active" data-type="theme" data-value="deep-purple">
                        <a href="#!">
                        <i class="mdi mdi-checkbox-blank-outline deep-purple-text text-lighten-2"></i>
                        <span class="title">Purple</span>  </a>
                        </div></li>
                    <li class="lvl1  theme">
                    <div class="waves-effect appsettings " data-type="theme" data-value="amber">
                        <a href="#!">
                        <i class="mdi mdi-checkbox-blank-outline amber-text"></i>
                        <span class="title">Yellow</span>  </a>
                        </div></li>
                    <li class="lvl1  theme">
                    <div class="waves-effect appsettings " data-type="theme" data-value="indigo">
                        <a href="#!">
                        <i class="mdi mdi-checkbox-blank-outline indigo-text text-lighten-2"></i>
                        <span class="title">Indigo</span>  </a>
                        </div></li>
                    <li class="lvl1  theme">
                    <div class="waves-effect appsettings " data-type="theme" data-value="blue-grey">
                        <a href="#!">
                        <i class="mdi mdi-checkbox-blank-outline blue-grey-text text-lighten-2"></i>
                        <span class="title">Blue Grey</span>  </a>
                        </div></li>
                    <li class="lvl1  theme">
                    <div class="waves-effect appsettings " data-type="theme" data-value="brown">
                        <a href="#!">
                        <i class="mdi mdi-checkbox-blank-outline brown-text text-lighten-2"></i>
                        <span class="title">Brown</span>  </a>
                        </div></li>
                    <li class="lvl1  theme">
                    <div class="waves-effect appsettings " data-type="theme" data-value="cyan">
                        <a href="#!">
                        <i class="mdi mdi-checkbox-blank-outline cyan-text text-lighten-2"></i>
                        <span class="title">Cyan</span>  </a>
                        </div></li>
                    <li class="lvl1  theme">
                    <div class="waves-effect appsettings " data-type="theme" data-value="grey">
                        <a href="#!">
                        <i class="mdi mdi-checkbox-blank-outline grey-text text-darken-2"></i>
                        <span class="title">Black</span>  </a>
                        </div></li><li class="sep-wrap"><div class="divider"></div></li><li class="sh-wrap"><div class="subheader">Site Mode</div></li>
                    <li class="lvl1  site_mode">
                    <div class="waves-effect appsettings active" data-type="site_mode" data-value="light">
                        <a href="#!">
                        <i class="mdi mdi-checkbox-intermediate"></i>
                        <span class="title">Light Mode</span>  </a>
                        </div></li>
                    <li class="lvl1  site_mode">
                    <div class="waves-effect appsettings " data-type="site_mode" data-value="dark">
                        <a href="#!">
                        <i class="mdi mdi-checkbox-blank-outline"></i>
                        <span class="title">Dark Mode</span>  </a>
                        </div></li><li class="sep-wrap"><div class="divider"></div></li><li class="sh-wrap"><div class="subheader">Header Style</div></li>
                    <li class="lvl1  header">
                    <div class="waves-effect appsettings active" data-type="header" data-value="light">
                        <a href="#!">
                        <i class="mdi mdi-checkbox-intermediate"></i>
                        <span class="title">Light Header</span>  </a>
                        </div></li>
                    <li class="lvl1  header">
                    <div class="waves-effect appsettings " data-type="header" data-value="dark">
                        <a href="#!">
                        <i class="mdi mdi-checkbox-blank-outline"></i>
                        <span class="title">Dark Header</span>  </a>
                        </div></li>
                    <li class="lvl1  header">
                    <div class="waves-effect appsettings " data-type="header" data-value="colored">
                        <a href="#!">
                        <i class="mdi mdi-checkbox-blank-outline"></i>
                        <span class="title">Colored Header</span>  </a>
                        </div></li><li class="sep-wrap"><div class="divider"></div></li><li class="sh-wrap"><div class="subheader">Header Alignment</div></li>
                    <li class="lvl1  header_align">
                    <div class="waves-effect appsettings " data-type="header_align" data-value="left">
                        <a href="#!">
                        <i class="mdi mdi-checkbox-intermediate"></i>
                        <span class="title">Left Align Header</span>  </a>
                        </div></li>
                    <li class="lvl1  header_align">
                    <div class="waves-effect appsettings " data-type="header_align" data-value="center">
                        <a href="#!">
                        <i class="mdi mdi-checkbox-blank-outline"></i>
                        <span class="title">Center Align Header</span>  </a>
                        </div></li>
                    <li class="lvl1  header_align">
                    <div class="waves-effect appsettings " data-type="header_align" data-value="right">
                        <a href="#!">
                        <i class="mdi mdi-checkbox-blank-outline"></i>
                        <span class="title">Right Align Header</span>  </a>
                        </div></li>
                    <li class="lvl1  header_align">
                    <div class="waves-effect appsettings active" data-type="header_align" data-value="app">
                        <a href="#!">
                        <i class="mdi mdi-checkbox-blank-outline"></i>
                        <span class="title">App Based Align Header</span>  </a>
                        </div></li><li class="sep-wrap"><div class="divider"></div></li><li class="sh-wrap"><div class="subheader">Menu Style</div></li>
                    <li class="lvl1  menu">
                    <div class="waves-effect appsettings active" data-type="menu" data-value="light">
                        <a href="#!">
                        <i class="mdi mdi-checkbox-intermediate"></i>
                        <span class="title">Light Menu</span>  </a>
                        </div></li>
                    <li class="lvl1  menu">
                    <div class="waves-effect appsettings " data-type="menu" data-value="dark">
                        <a href="#!">
                        <i class="mdi mdi-checkbox-blank-outline"></i>
                        <span class="title">Dark Menu</span>  </a>
                        </div></li>
                    <li class="lvl1  menu">
                    <div class="waves-effect appsettings " data-type="menu" data-value="colored">
                        <a href="#!">
                        <i class="mdi mdi-checkbox-blank-outline"></i>
                        <span class="title">Colored Menu</span>  </a>
                        </div></li><li class="sep-wrap"><div class="divider"></div></li><li class="sh-wrap"><div class="subheader">Menu Icons</div></li>
                    <li class="lvl1  menu_icons">
                    <div class="waves-effect appsettings active" data-type="menu_icons" data-value="on">
                        <a href="#!">
                        <i class="mdi mdi-checkbox-intermediate"></i>
                        <span class="title">Menu Icons Show</span>  </a>
                        </div></li>
                    <li class="lvl1  menu_icons">
                    <div class="waves-effect appsettings " data-type="menu_icons" data-value="off">
                        <a href="#!">
                        <i class="mdi mdi-checkbox-blank-outline"></i>
                        <span class="title">Menu Icons Hide</span>  </a>
                        </div></li><li class="sep-wrap"><div class="divider"></div></li><li class="sh-wrap"><div class="subheader">Page Footer Style</div></li>
                    <li class="lvl1  footer">
                    <div class="waves-effect appsettings active" data-type="footer" data-value="light">
                        <a href="#!">
                        <i class="mdi mdi-checkbox-intermediate"></i>
                        <span class="title">Light Footer</span>  </a>
                        </div></li>
                    <li class="lvl1  footer">
                    <div class="waves-effect appsettings " data-type="footer" data-value="dark">
                        <a href="#!">
                        <i class="mdi mdi-checkbox-blank-outline"></i>
                        <span class="title">Dark Footer</span>  </a>
                        </div></li>
                    <li class="lvl1  footer">
                    <div class="waves-effect appsettings " data-type="footer" data-value="colored">
                        <a href="#!">
                        <i class="mdi mdi-checkbox-blank-outline"></i>
                        <span class="title">Colored Footer</span>  </a>
                        </div></li><li class="sep-wrap"><div class="divider"></div></li><li class="sh-wrap"><div class="subheader">Page Footer Type</div></li>
                    <li class="lvl1  footer_type">
                    <div class="waves-effect appsettings " data-type="footer_type" data-value="minimal">
                        <a href="#!">
                        <i class="mdi mdi-checkbox-intermediate"></i>
                        <span class="title">Minimal Footer</span>  </a>
                        </div></li>
                    <li class="lvl1  footer_type">
                    <div class="waves-effect appsettings active" data-type="footer_type" data-value="left">
                        <a href="#!">
                        <i class="mdi mdi-checkbox-blank-outline"></i>
                        <span class="title">Left Aligned Footer</span>  </a>
                        </div></li>
                    <li class="lvl1  footer_type">
                    <div class="waves-effect appsettings " data-type="footer_type" data-value="center">
                        <a href="#!">
                        <i class="mdi mdi-checkbox-blank-outline"></i>
                        <span class="title">Centered Footer</span>  </a>
                        </div></li><li class="sep-wrap"><div class="divider"></div></li><li class="sh-wrap"><div class="subheader">Fixed Footer Menu</div></li>
                    <li class="lvl1  footer_menu">
                    <div class="waves-effect appsettings active" data-type="footer_menu" data-value="show">
                        <a href="#!">
                        <i class="mdi mdi-checkbox-intermediate"></i>
                        <span class="title">Show Fixed Footer Menu</span>  </a>
                        </div></li>
                    <li class="lvl1  footer_menu">
                    <div class="waves-effect appsettings " data-type="footer_menu" data-value="hide">
                        <a href="#!">
                        <i class="mdi mdi-checkbox-blank-outline"></i>
                        <span class="title">Hide Fixed Footer Menu</span>  </a>
                        </div></li><li class="sep-wrap"><div class="divider"></div></li><li class="sh-wrap"><div class="subheader">Fixed Footer Menu Style</div></li>
                    <li class="lvl1  footer_menu_style">
                    <div class="waves-effect appsettings active" data-type="footer_menu_style" data-value="light">
                        <a href="#!">
                        <i class="mdi mdi-checkbox-intermediate"></i>
                        <span class="title">Light Fixed Menu</span>  </a>
                        </div></li>
                    <li class="lvl1  footer_menu_style">
                    <div class="waves-effect appsettings " data-type="footer_menu_style" data-value="dark">
                        <a href="#!">
                        <i class="mdi mdi-checkbox-blank-outline"></i>
                        <span class="title">Dark Fixed Menu</span>  </a>
                        </div></li>
                    <li class="lvl1  footer_menu_style">
                    <div class="waves-effect appsettings " data-type="footer_menu_style" data-value="colored">
                        <a href="#!">
                        <i class="mdi mdi-checkbox-blank-outline"></i>
                        <span class="title">Colored Fixed Menu</span>  </a>
                        </div></li>      <!-- Menu Settings End-->
      </ul>
    </li>
  </ul>
<div class="menu-close"><i class="mdi mdi-close"></i></div>





  
<div class="login-bg access-login"></div>


<div class="container login-area">
  <div class="section">

      <div class="row center">
      <img src="assets/images/logo-login.png" alt="">
      </div>

    <h3 class="bot-20 center white-text">Login</h3>
    

    <div class="row">

      <div class="col s10 offset-s1">
        <select name="" id="">
          <option value="" class="validate">Pilih Kecamatan</option>
        </select>
      </div>

      <div class="input-field col s10 offset-s1">
        <input id="email311" type="email" class="validate">
        <label for="email311">NIK</label>
      </div>


      <div class="input-field col s10 offset-s1">
        <input id="pass311" type="password" class="validate">
        <label for="pass311">Password</label>
      </div>

    </div>

        
<div class="row center">
  <a href="menu.html" class="waves-effect waves-light btn-large bg-primary">Login</a>
  <div class="spacer"></div>
  <div class="links">

    <a href="ui-pages-forgotpassword.html" >Forgot Password</a><span class="sep">|</span><a href="ui-pages-register.html" >Register</a>  </div>

    <div class="spacer"></div>
  

</div>



    


  </div>
</div>














@endsection
