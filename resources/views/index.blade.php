<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Title -->
        <title>Home-v1 | Electro - Responsive Website Template</title>

        <!-- Required Meta Tags Always Come First -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Favicon -->
        <link rel="shortcut icon" href="../../favicon.png">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&display=swap" rel="stylesheet">

        <!-- CSS Implementing Plugins -->
        <link rel="stylesheet" href="../../assets/vendor/font-awesome/css/fontawesome-all.min.css">
        <link rel="stylesheet" href="../../assets/css/font-electro.css">

        <link rel="stylesheet" href="../../assets/vendor/animate.css/animate.min.css">
        <link rel="stylesheet" href="../../assets/vendor/hs-megamenu/src/hs.megamenu.css">
        <link rel="stylesheet" href="../../assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css">
        <link rel="stylesheet" href="../../assets/vendor/fancybox/jquery.fancybox.css">
        <link rel="stylesheet" href="../../assets/vendor/slick-carousel/slick/slick.css">
        <link rel="stylesheet" href="../../assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css">

        <!-- CSS Electro Template -->
        <link rel="stylesheet" href="../../assets/css/theme.css">

    </head>
    <style>
        .current {
                      color: green;
                    }

                    #pagin li {
                      display: inline-block;
                    }

                    .prev {
                      cursor: pointer;
                    }

                    .next {
                      cursor: pointer;
                    }

                    .last{
                      cursor:pointer;
                      margin-left:5px;
                    }

                    .first{
                      cursor:pointer;
                      margin-right:5px;
                    }
    </style>
    <body>

        <!-- ========== HEADER ========== -->
        <header id="header" class="u-header u-header-left-aligned-nav">
            <div class="u-header__section">
                <!-- Topbar -->
                <div class="u-header-topbar py-2 d-none d-xl-block">
                    <div class="container">
                        <div class="d-flex align-items-center">
                            <div class="topbar-left">
                                <a href="#" class="text-gray-110 font-size-13 hover-on-dark">Welcome to Worldwide Electronics Store</a>
                            </div>
                            <div class="topbar-right ml-auto">
                                <ul class="list-inline mb-0">
                                    {{-- <li class="list-inline-item mr-0 u-header-topbar__nav-item u-header-topbar__nav-item-border">
                                        <a href="../home/contact-v2.html" class="u-header-topbar__nav-link"><i class="ec ec-map-pointer mr-1"></i> Store Locator</a>
                                    </li>
                                    <li class="list-inline-item mr-0 u-header-topbar__nav-item u-header-topbar__nav-item-border">
                                        <a href="../shop/track-your-order.html" class="u-header-topbar__nav-link"><i class="ec ec-transport mr-1"></i> Track Your Order</a>
                                    </li> --}}
                                    {{-- <li class="list-inline-item mr-0 u-header-topbar__nav-item u-header-topbar__nav-item-border u-header-topbar__nav-item-no-border u-header-topbar__nav-item-border-single">
                                        <div class="d-flex align-items-center">
                                            <!-- Language -->
                                            <div class="position-relative">
                                                <a id="languageDropdownInvoker" class="dropdown-nav-link dropdown-toggle d-flex align-items-center u-header-topbar__nav-link font-weight-normal" href="javascript:;" role="button"
                                                    aria-controls="languageDropdown"
                                                    aria-haspopup="true"
                                                    aria-expanded="false"
                                                    data-unfold-event="hover"
                                                    data-unfold-target="#languageDropdown"
                                                    data-unfold-type="css-animation"
                                                    data-unfold-duration="300"
                                                    data-unfold-delay="300"
                                                    data-unfold-hide-on-scroll="true"
                                                    data-unfold-animation-in="slideInUp"
                                                    data-unfold-animation-out="fadeOut">
                                                    <span class="d-inline-block d-sm-none">US</span>
                                                    <span class="d-none d-sm-inline-flex align-items-center"><i class="ec ec-dollar mr-1"></i> Dollar (US)</span>
                                                </a>

                                                <div id="languageDropdown" class="dropdown-menu dropdown-unfold" aria-labelledby="languageDropdownInvoker">
                                                    <a class="dropdown-item active" href="#">English</a>
                                                    <a class="dropdown-item" href="#">Deutsch</a>
                                                    <a class="dropdown-item" href="#">Español‎  </a>
                                                </div>
                                            </div>
                                            <!-- End Language -->
                                        </div>
                                    </li> --}}
                                    <li class="list-inline-item mr-0 u-header-topbar__nav-item u-header-topbar__nav-item-border">
                                        <!-- Account Sidebar Toggle Button -->

                                        <a href="{{ route('register')  }}" class="text-dark"><i class="ec ec-user mr-1"></i> Register</a> <a href="{{ route('login')  }}" class="text-dark"><span class="text-gray-50">or</span> Sign in</a>

                                        <!-- End Account Sidebar Toggle Button -->
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Topbar -->

                <!-- Logo-Search-header-icons -->
                <div class="py-2 py-xl-5 bg-primary-down-lg">
                    <div class="container my-0dot5 my-xl-0">
                        <div class="row align-items-center">
                            <!-- Logo-offcanvas-menu -->
                            <div class="col-auto">
                                <!-- Nav -->
                                <nav class="navbar navbar-expand u-header__navbar py-0 justify-content-xl-between max-width-270 min-width-270">
                                    <!-- Logo -->
                                    <a class="order-1 order-xl-0 navbar-brand u-header__navbar-brand u-header__navbar-brand-center" href="{{ route('home')  }}" aria-label="Electro">
                                      
                                        <img src="{{url('/dashboard_images/logo-removebg-preview.png')}}" alt="">
                                    </a>
                                    <!-- End Logo -->

                                    <!-- Fullscreen Toggle Button -->
                                    <button id="sidebarHeaderInvokerMenu" type="button" class="navbar-toggler d-block btn u-hamburger mr-3 mr-xl-0"
                                        aria-controls="sidebarHeader"
                                        aria-haspopup="true"
                                        aria-expanded="false"
                                        data-unfold-event="click"
                                        data-unfold-hide-on-scroll="false"
                                        data-unfold-target="#sidebarHeader1"
                                        data-unfold-type="css-animation"
                                        data-unfold-animation-in="fadeInLeft"
                                        data-unfold-animation-out="fadeOutLeft"
                                        data-unfold-duration="500">
                                        <span id="hamburgerTriggerMenu" class="u-hamburger__box">
                                            <span class="u-hamburger__inner"></span>
                                        </span>
                                    </button>
                                    <!-- End Fullscreen Toggle Button -->
                                </nav>
                                <!-- End Nav -->

                                <!-- ========== HEADER SIDEBAR ========== -->
                                <aside id="sidebarHeader1" class="u-sidebar u-sidebar--left" aria-labelledby="sidebarHeaderInvoker">
                                    <div class="u-sidebar__scroller">
                                        <div class="u-sidebar__container">
                                            <div class="u-header-sidebar__footer-offset">
                                                <!-- Toggle Button -->
                                                <div class="position-absolute top-0 right-0 z-index-2 pt-4 pr-4 bg-white">
                                                    <button type="button" class="close ml-auto"
                                                        aria-controls="sidebarHeader"
                                                        aria-haspopup="true"
                                                        aria-expanded="false"
                                                        data-unfold-event="click"
                                                        data-unfold-hide-on-scroll="false"
                                                        data-unfold-target="#sidebarHeader1"
                                                        data-unfold-type="css-animation"
                                                        data-unfold-animation-in="fadeInLeft"
                                                        data-unfold-animation-out="fadeOutLeft"
                                                        data-unfold-duration="500">
                                                        <span aria-hidden="true"><i class="ec ec-close-remove text-gray-90 font-size-20"></i></span>
                                                    </button>
                                                </div>
                                                <!-- End Toggle Button -->

                                                <!-- Content -->
                                                <div class="js-scrollbar u-sidebar__body">
                                                    <div id="headerSidebarContent" class="u-sidebar__content u-header-sidebar__content">
                                                        <!-- Logo -->
                                                        <a class="navbar-brand u-header__navbar-brand u-header__navbar-brand-center mb-3" href="{{ route('home')  }}" aria-label="Electro">
                                                            {{-- <svg version="1.1" x="0px" y="0px" width="175.748px" height="42.52px" viewBox="0 0 175.748 42.52" enable-background="new 0 0 175.748 42.52" style="margin-bottom: 0;">
                                                                <ellipse class="ellipse-bg" fill-rule="evenodd" clip-rule="evenodd" fill="#FDD700" cx="170.05" cy="36.341" rx="5.32" ry="5.367"></ellipse>
                                                                <path fill-rule="evenodd" clip-rule="evenodd" fill="#333E48" d="M30.514,0.71c-0.034,0.003-0.066,0.008-0.056,0.056
                                                                    C30.263,0.995,29.876,1.181,29.79,1.5c-0.148,0.548,0,1.568,0,2.427v36.459c0.265,0.221,0.506,0.465,0.725,0.734h6.187
                                                                    c0.2-0.25,0.423-0.477,0.669-0.678V1.387C37.124,1.185,36.9,0.959,36.701,0.71H30.514z M117.517,12.731
                                                                    c-0.232-0.189-0.439-0.64-0.781-0.734c-0.754-0.209-2.039,0-3.121,0h-3.176V4.435c-0.232-0.189-0.439-0.639-0.781-0.733
                                                                    c-0.719-0.2-1.969,0-3.01,0h-3.01c-0.238,0.273-0.625,0.431-0.725,0.847c-0.203,0.852,0,2.399,0,3.725
                                                                    c0,1.393,0.045,2.748-0.055,3.725h-6.41c-0.184,0.237-0.629,0.434-0.725,0.791c-0.178,0.654,0,1.813,0,2.765v2.766
                                                                    c0.232,0.188,0.439,0.64,0.779,0.733c0.777,0.216,2.109,0,3.234,0c1.154,0,2.291-0.045,3.176,0.057v21.277
                                                                    c0.232,0.189,0.439,0.639,0.781,0.734c0.719,0.199,1.969,0,3.01,0h3.01c1.008-0.451,0.725-1.889,0.725-3.443
                                                                    c-0.002-6.164-0.047-12.867,0.055-18.625h6.299c0.182-0.236,0.627-0.434,0.725-0.79c0.176-0.653,0-1.813,0-2.765V12.731z
                                                                    M135.851,18.262c0.201-0.746,0-2.029,0-3.104v-3.104c-0.287-0.245-0.434-0.637-0.781-0.733c-0.824-0.229-1.992-0.044-2.898,0
                                                                    c-2.158,0.104-4.506,0.675-5.74,1.411c-0.146-0.362-0.451-0.853-0.893-0.96c-0.693-0.169-1.859,0-2.842,0h-2.842
                                                                    c-0.258,0.319-0.625,0.42-0.725,0.79c-0.223,0.82,0,2.338,0,3.443c0,8.109-0.002,16.635,0,24.381
                                                                    c0.232,0.189,0.439,0.639,0.779,0.734c0.707,0.195,1.93,0,2.955,0h3.01c0.918-0.463,0.725-1.352,0.725-2.822V36.21
                                                                    c-0.002-3.902-0.242-9.117,0-12.473c0.297-4.142,3.836-4.877,8.527-4.686C135.312,18.816,135.757,18.606,135.851,18.262z
                                                                    M14.796,11.376c-5.472,0.262-9.443,3.178-11.76,7.056c-2.435,4.075-2.789,10.62-0.501,15.126c2.043,4.023,5.91,7.115,10.701,7.9
                                                                    c6.051,0.992,10.992-1.219,14.324-3.838c-0.687-1.1-1.419-2.664-2.118-3.951c-0.398-0.734-0.652-1.486-1.616-1.467
                                                                    c-1.942,0.787-4.272,2.262-7.134,2.145c-3.791-0.154-6.659-1.842-7.524-4.91h19.452c0.146-2.793,0.22-5.338-0.279-7.563
                                                                    C26.961,15.728,22.503,11.008,14.796,11.376z M9,23.284c0.921-2.508,3.033-4.514,6.298-4.627c3.083-0.107,4.994,1.976,5.685,4.627
                                                                    C17.119,23.38,12.865,23.38,9,23.284z M52.418,11.376c-5.551,0.266-9.395,3.142-11.76,7.056
                                                                    c-2.476,4.097-2.829,10.493-0.557,15.069c1.997,4.021,5.895,7.156,10.646,7.957c6.068,1.023,11-1.227,14.379-3.781
                                                                    c-0.479-0.896-0.875-1.742-1.393-2.709c-0.312-0.582-1.024-2.234-1.561-2.539c-0.912-0.52-1.428,0.135-2.23,0.508
                                                                    c-0.564,0.262-1.223,0.523-1.672,0.676c-4.768,1.621-10.372,0.268-11.537-4.176h19.451c0.668-5.443-0.419-9.953-2.73-13.037
                                                                    C61.197,13.388,57.774,11.12,52.418,11.376z M46.622,23.343c0.708-2.553,3.161-4.578,6.242-4.686
                                                                    c3.08-0.107,5.08,1.953,5.686,4.686H46.622z M160.371,15.497c-2.455-2.453-6.143-4.291-10.869-4.064
                                                                    c-2.268,0.109-4.297,0.65-6.02,1.524c-1.719,0.873-3.092,1.957-4.234,3.217c-2.287,2.519-4.164,6.004-3.902,11.007
                                                                    c0.248,4.736,1.979,7.813,4.627,10.326c2.568,2.439,6.148,4.254,10.867,4.064c4.457-0.18,7.889-2.115,10.199-4.684
                                                                    c2.469-2.746,4.012-5.971,3.959-11.063C164.949,21.134,162.732,17.854,160.371,15.497z M149.558,33.952
                                                                    c-3.246-0.221-5.701-2.615-6.41-5.418c-0.174-0.689-0.26-1.25-0.4-2.166c-0.035-0.234,0.072-0.523-0.045-0.77
                                                                    c0.682-3.698,2.912-6.257,6.799-6.547c2.543-0.189,4.258,0.735,5.52,1.863c1.322,1.182,2.303,2.715,2.451,4.967
                                                                    C157.789,30.669,154.185,34.267,149.558,33.952z M88.812,29.55c-1.232,2.363-2.9,4.307-6.13,4.402
                                                                    c-4.729,0.141-8.038-3.16-8.025-7.563c0.004-1.412,0.324-2.65,0.947-3.726c1.197-2.061,3.507-3.688,6.633-3.612
                                                                    c3.222,0.079,4.966,1.708,6.632,3.668c1.328-1.059,2.529-1.948,3.9-2.99c0.416-0.315,1.076-0.688,1.227-1.072
                                                                    c0.404-1.031-0.365-1.502-0.891-2.088c-2.543-2.835-6.66-5.377-11.704-5.137c-6.02,0.288-10.218,3.697-12.484,7.846
                                                                    c-1.293,2.365-1.951,5.158-1.729,8.408c0.209,3.053,1.191,5.496,2.619,7.508c2.842,4.004,7.385,6.973,13.656,6.377
                                                                    c5.976-0.568,9.574-3.936,11.816-8.354c-0.141-0.271-0.221-0.604-0.336-0.902C92.929,31.364,90.843,30.485,88.812,29.55z">
                                                                </path>
                                                            </svg> --}}
                                        <img src="{{url('/dashboard_images/logo-removebg-preview.png')}}" alt="">

                                                        </a>
                                                        <!-- End Logo -->
                                                    
                                                        <!-- List -->
                                                        <ul id="headerSidebarList" class="u-header-collapse__nav">
                                                           
                                                            <!-- Computers & Accessories -->
                                                            <li class="u-has-submenu u-header-collapse__submenu">


                                                                @foreach ($categories as  $category)
                                                                <a class="u-header-collapse__nav-link u-header-collapse__nav-pointer categoryclass" id='{{$category->category_id}}' href="javascript:;" data-target="#headerSidebarComputersCollapse" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="headerSidebarComputersCollapse">
                                                                   {{$category->title}}
                                                                </a>
                                                               
                                                                @endforeach
                                                               
                                                                <div id="headerSidebarComputersCollapse" class="collapse headerSidebarComputersCollapse" data-parent="#headerSidebarContent">
                                                                </div>
                                                            </li>
                                                            

                                                        </ul>
                                                         
                                                        <!-- End List -->
                                                    </div>
                                                </div>
                                                <!-- End Content -->
                                            </div>
                                            <!-- Footer -->
                                            <footer id="SVGwaveWithDots" class="svg-preloader u-header-sidebar__footer">
                                                <ul class="list-inline mb-0">
                                                    <li class="list-inline-item pr-3">
                                                        <a class="u-header-sidebar__footer-link text-gray-90" href="#">Privacy</a>
                                                    </li>
                                                    <li class="list-inline-item pr-3">
                                                        <a class="u-header-sidebar__footer-link text-gray-90" href="#">Terms</a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a class="u-header-sidebar__footer-link text-gray-90" href="#">
                                                            <i class="fas fa-info-circle"></i>
                                                        </a>
                                                    </li>
                                                </ul>

                                                <!-- SVG Background Shape -->
                                                <div class="position-absolute right-0 bottom-0 left-0 z-index-n1">
                                                    <img class="js-svg-injector" src="../../assets/svg/components/wave-bottom-with-dots.svg" alt="Image Description"
                                                    data-parent="#SVGwaveWithDots">
                                                </div>
                                                <!-- End SVG Background Shape -->
                                            </footer>
                                            <!-- End Footer -->
                                        </div>
                                    </div>
                                </aside>
                                <!-- ========== END HEADER SIDEBAR ========== -->
                            </div>
                            <!-- End Logo-offcanvas-menu -->
                            <!-- Search Bar -->
                            <div class="col d-none d-xl-block">
                                <form class="js-focus-state">
                                    <label class="sr-only" for="searchproduct">Search</label>
                                    <div class="input-group">
                                        <input type="email" class="form-control py-2 pl-5 font-size-15 border-right-0 height-40 border-width-2 rounded-left-pill border-primary" name="email" id="searchproduct-item" placeholder="Search for Products" aria-label="Search for Products" aria-describedby="searchProduct1" required>
                                        <div class="input-group-append">
                                            <!-- Select -->
                                            <select class="js-select selectpicker dropdown-select custom-search-categories-select"
                                                data-style="btn height-40 text-gray-60 font-weight-normal border-top border-bottom border-left-0 rounded-0 border-primary border-width-2 pl-0 pr-5 py-2">
                                                <option value="one" selected>All Categories</option>
                                                <option value="two">Two</option>
                                                <option value="three">Three</option>
                                                <option value="four">Four</option>
                                            </select>
                                            <!-- End Select -->
                                            <button class="btn btn-primary height-40 py-2 px-3 rounded-right-pill" type="button" id="searchProduct1">
                                                <span class="ec ec-search font-size-24"></span>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- End Search Bar -->

                            <!-- Header Icons -->
                            <div class="col col-xl-auto text-right text-xl-left pl-0 pl-xl-3 position-static">
                                <div class="d-inline-flex">
                                    <ul class="d-flex list-unstyled mb-0 align-items-center">
                                        <!-- Search -->
                                        <li class="col d-xl-none px-2 px-sm-3 position-static">
                                            <a id="searchClassicInvoker" class="font-size-22 text-gray-90 text-lh-1 btn-text-secondary" href="javascript:;" role="button"
                                                data-toggle="tooltip"
                                                data-placement="top"
                                                title="Search"
                                                aria-controls="searchClassic"
                                                aria-haspopup="true"
                                                aria-expanded="false"
                                                data-unfold-target="#searchClassic"
                                                data-unfold-type="css-animation"
                                                data-unfold-duration="300"
                                                data-unfold-delay="300"
                                                data-unfold-hide-on-scroll="true"
                                                data-unfold-animation-in="slideInUp"
                                                data-unfold-animation-out="fadeOut">
                                                <span class="ec ec-search"></span>
                                            </a>

                                            <!-- Input -->
                                            <div id="searchClassic" class="dropdown-menu dropdown-unfold dropdown-menu-right left-0 mx-2" aria-labelledby="searchClassicInvoker">
                                                <form class="js-focus-state input-group px-3">
                                                    <input class="form-control" type="search" placeholder="Search Product">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-primary px-3" type="button"><i class="font-size-18 ec ec-search"></i></button>
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- End Input -->
                                        </li>

                                        <li class="col pr-xl-0 px-2 px-sm-3 d-none d-xl-block">
                                            <div  class="text-gray-90 position-relative d-flex " data-toggle="tooltip" data-placement="top" title="Cart"
                                                aria-controls="basicDropdownHover"
                                                aria-haspopup="true"
                                                aria-expanded="false"
                                                data-unfold-event="click"
                                                data-unfold-target="#basicDropdownHover"
                                                data-unfold-type="css-animation"
                                                data-unfold-duration="300"
                                                data-unfold-delay="300"
                                                data-unfold-hide-on-scroll="true"
                                                data-unfold-animation-in="slideInUp"
                                                data-unfold-animation-out="fadeOut">
                                                <i class="font-size-22 ec ec-shopping-bag"></i>
                                                <span class="bg-lg-down-black width-22 height-22 bg-primary position-absolute d-flex align-items-center justify-content-center rounded-circle left-12 top-8 font-weight-bold font-size-12">2</span>
                                                <span class="d-none d-xl-block font-weight-bold font-size-16 text-gray-90 ml-3">$0.00</span>
                                            </div>

                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- End Header Icons -->
                        </div>
                    </div>
                </div>
                <!-- End Logo-Search-header-icons -->


            </div>
        </header>
        <!-- ========== END HEADER ========== -->

        <!-- ========== MAIN CONTENT ========== -->
        <main id="content" role="main">
            <!-- Slider Section -->

           	 <div class="mb-5">
                <div class="bg-img-hero" style="">
                    <div class="container min-height-420 overflow-hidden">
                        <div class="js-slick-carousel u-slick"
                            data-pagi-classes="text-center position-absolute right-0 bottom-0 left-0 u-slick__pagination u-slick__pagination--long justify-content-start mb-3 mb-md-4 offset-xl-3 pl-2 pb-1">
                            <div class="js-slide bg-img-hero-center">
                                <div class="row min-height-420 py-7 py-md-0">
                                    <div class="offset-xl-3 col-xl-12 col-12 mt-md-12">
                                        <h1 class="font-size-64 text-lh-57 font-weight-light"
                                            data-scs-animation-in="fadeInUp">
                                            THE NEW <span class="d-block font-size-55">STANDARD</span>
                                        </h1>
                                        <h6 class="font-size-15 font-weight-bold mb-3"
                                            data-scs-animation-in="fadeInUp"
                                            data-scs-animation-delay="200">UNDER FAVORABLE SMARTWATCHES
                                        </h6>
                                        <div class="mb-4"
                                            data-scs-animation-in="fadeInUp"
                                            data-scs-animation-delay="300">
                                            <span class="font-size-13">FROM</span>
                                            <div class="font-size-50 font-weight-bold text-lh-45">
                                                <sup class="">$</sup>749<sup class="">99</sup>
                                            </div>
                                        </div>
                                        {{-- <img src="{{url('/slider/1.JPG')}}" alt=""> --}}

                                        <a href="../shop/single-product-fullwidth.html" class="btn btn-primary transition-3d-hover rounded-lg font-weight-normal py-2 px-md-7 px-3 font-size-16"
                                            data-scs-animation-in="fadeInUp"
                                            data-scs-animation-delay="400">
                                            Start Buying
                                        </a>
                                    </div>
                                    <div class="col-xl-5 col-6  d-flex align-items-center"
                                        data-scs-animation-in="zoomIn"
                                        data-scs-animation-delay="500">
                                        <img class="img-fluid" src="" alt="Image Description">
                                    </div>
                                </div>
                            </div>
                            <div class="js-slide bg-img-hero-center" data-animation-delay="0">
                                <div class="row min-height-420 py-7 py-md-0">
                                    <div class="offset-xl-3 col-xl-4 col-6 mt-md-8">
                                        <h1 class="font-size-64 text-lh-57 font-weight-light"
                                            data-scs-animation-in="fadeInUp">
                                            THE NEW <span class="d-block font-size-55">STANDARD</span>
                                        </h1>
                                        <h6 class="font-size-15 font-weight-bold mb-3"
                                            data-scs-animation-in="fadeInUp"
                                            data-scs-animation-delay="200">UNDER FAVORABLE SMARTWATCHES
                                        </h6>
                                        <div class="mb-4"
                                            data-scs-animation-in="fadeInUp"
                                            data-scs-animation-delay="300">
                                            <span class="font-size-13">FROM</span>
                                            <div class="font-size-50 font-weight-bold text-lh-45">
                                                <sup class="">$</sup>749<sup class="">99</sup>
                                            </div>
                                        </div>
                                        {{-- <img src="{{url('/slider/2.JPG')}}" alt=""> --}}

                                        <a href="../shop/single-product-fullwidth.html" class="btn btn-primary transition-3d-hover rounded-lg font-weight-normal py-2 px-md-7 px-3 font-size-16"
                                            data-scs-animation-in="fadeInUp"
                                            data-scs-animation-delay="400">
                                            Start Buying
                                        </a>
                                    </div>
                                    <div class="col-xl-5 col-6  d-flex align-items-center"
                                        data-scs-animation-in="fadeInUp"
                                        data-scs-animation-delay="500">
                                        <img class="img-fluid" src="" alt="Image Description">
                                    </div>
                                </div>
                            </div>
                            <div class="js-slide bg-img-hero-center" data-animation-delay="0">
                                <div class="row min-height-420 py-7 py-md-0">
                                    <div class="offset-xl-3 col-xl-4 col-6 mt-md-8">
                                        <h1 class="font-size-64 text-lh-57 font-weight-light"
                                            data-scs-animation-in="fadeInUp">
                                            THE NEW <span class="d-block font-size-55">STANDARD</span>
                                        </h1>
                                        <h6 class="font-size-15 font-weight-bold mb-3"
                                            data-scs-animation-in="fadeInUp"
                                            data-scs-animation-delay="200">UNDER FAVORABLE SMARTWATCHES
                                        </h6>
                                        <div class="mb-4"
                                            data-scs-animation-in="fadeInUp"
                                            data-scs-animation-delay="300">
                                            <span class="font-size-13">FROM</span>
                                            <div class="font-size-50 font-weight-bold text-lh-45">
                                                <sup class="">$</sup>749<sup class="">99</sup>
                                            </div>
                                        </div>
                                        {{-- <img src="{{url('/slider/3.JPG')}}" alt=""> --}}

                                        <a href="../shop/single-product-fullwidth.html" class="btn btn-primary transition-3d-hover rounded-lg font-weight-normal py-2 px-md-7 px-3 font-size-15"
                                            data-scs-animation-in="fadeInUp"
                                            data-scs-animation-delay="400">
                                            Start Buying
                                        </a>
                                    </div>
                                    <div class="col-xl-5 col-6  d-flex align-items-center"
                                        data-scs-animation-in="fadeInRight"
                                        data-scs-animation-delay="500">
                                        <img class="img-fluid" src="" alt="Image Description">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="mb-6">
                <div class="row">
                    <div class="col pl-md-0">
                        <div class="tab-content pr-0dot5" id="Jpills-tabContent">
                            <div class="tab-pane fade show active" id="Jpills-one-example1" role="tabpanel" aria-labelledby="Jpills-one-example1-tab">
                                <ul class="row list-unstyled products-group no-gutters ulClass">
                                    {{-- @foreach ($products as $product)
                                    <div class='col-md-3'>
                                        <li class="col-6 col-md-4 col-xl product-item">
                                            <div class="product-item__outer h-100">
                                                <div class="product-item__inner px-xl-4 p-3">
                                                    <div class="product-item__body pb-xl-2">
                                                        <div class="mb-2"><a href="{{url('singleProducts/'.$product->product_id)}}" class="font-size-12 text-gray-5">{{$product->title}}</a></div>
                                                        <h5 class="mb-1 product-item__title"><a href="{{url('singleProducts/'.$product->product_id)}}" class="text-blue font-weight-bold">{{$product->product_name}}</a></h5>
                                                        <div class="mb-2">
                                                            <a href="" class="d-block text-center"><img class="img-fluid" src="{{url('/uploads/'.$product->product_image)}}" alt="Image Description" style='height: 150px;'></a>
                                                        </div>
                                                        <div class="flex-center-between mb-1">
                                                            <div class="prodcut-price">
                                                                <div class="text-gray-100">${{$product->product_price}}</div>
                                                            </div>
                                                            <div class="d-none d-xl-block prodcut-add-cart">
                                                                <a href="{{url('singleProducts/'.$product->product_id)}}" class="btn-add-cart btn-primary transition-3d-hover"><i class="ec ec-add-to-cart"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="product-item__footer">
                                                        <div class="border-top pt-2 flex-center-between flex-wrap">
                                                            <a href="../shop/compare.html" class="text-gray-6 font-size-13"><i class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                                            <a href="../shop/wishlist.html" class="text-gray-6 font-size-13"><i class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </div>
                                    @endforeach --}}
                                </ul> 
                                <ul id="pagin" style='font-size:20px;float: right;'>
         
                                </ul>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </main>
        <!-- ========== END MAIN CONTENT ========== -->

        <!-- ========== FOOTER ========== -->
        <footer>

            <!-- End Footer-top-widget -->

            <!-- Footer-bottom-widgets -->
            <div class="pt-8 pb-4 bg-gray-13">
                <div class="container mt-1">
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="mb-6">
                                <a href="#" class="d-inline-block">
                                    <img src="{{url('/dashboard_images/logo-removebg-preview.png')}}" alt="">
                                </a>
                            </div>
                            <div class="mb-4">
                                <div class="row no-gutters">
                                    <div class="col-auto">
                                        <i class="ec ec-support text-primary font-size-56"></i>
                                    </div>
                                    <div class="col pl-3">
                                        <div class="font-size-13 font-weight-light">Got questions? Call us 24/7!</div>
                                        <a href="#" class="font-size-20 text-gray-90">Tel: 86-13858917772 (Alissa)<br>
                                            Tel: 86-15267968557 (Chelina), </a>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <h6 class="mb-1 font-weight-bold">Contact info</h6>

                                <address class="" style='width: 233px;'>
                                    Yongkang Mengda Industry&Trading Co.,Ltd,was established on 2003.Is located in the hardware capital of CHINA-YONGKANG.And is a professional manufacturer of stainless steel tools and chrome series, including bbq grill,bbq oven and bbq needles.  <br>   Alisaa Bbq Ltd is Registered business in UK
                                    License no: 13815108
                                </address>
                                <ul class="link-small">
                                    <li>
                                        <a href="mailto:business@support.com" style='color:none'><i class="ion-ios-email fa-icons"  style='color:none'></i>AlissaBBQ@163.com</a>
                                    </li>
                                    <li>
                                        <a><i class="ion-ios-telephone fa-icons"></i>Tel: 86-13858917772(Alissa) <br> Tel: 86-15267968557(Chelina)</a>
                                    </li>
                                </ul>
                            </div>
                      
                        </div>
                        <div class="col-lg-7">
                            <div class="row">
                                <div class="col-12 col-md mb-4 mb-md-0">
                                    <h6 class="mb-3 font-weight-bold">Find it Fast</h6>
                                    <!-- List Group -->
                                    <ul class="list-group list-group-flush list-group-borderless mb-0 list-group-transparent">
                                        <li><a class="list-group-item list-group-item-action" href="../shop/product-categories-5-column-sidebar.html">Laptops & Computers</a></li>
                                        <li><a class="list-group-item list-group-item-action" href="../shop/product-categories-5-column-sidebar.html">Cameras & Photography</a></li>
                                        <li><a class="list-group-item list-group-item-action" href="../shop/product-categories-5-column-sidebar.html">Smart Phones & Tablets</a></li>
                                        <li><a class="list-group-item list-group-item-action" href="../shop/product-categories-5-column-sidebar.html">Video Games & Consoles</a></li>
                                        <li><a class="list-group-item list-group-item-action" href="../shop/product-categories-5-column-sidebar.html">TV & Audio</a></li>
                                        <li><a class="list-group-item list-group-item-action" href="../shop/product-categories-5-column-sidebar.html">Gadgets</a></li>
                                        <li><a class="list-group-item list-group-item-action" href="../shop/product-categories-5-column-sidebar.html">Car Electronic & GPS</a></li>
                                    </ul>
                                    <!-- End List Group -->
                                </div>

                                <div class="col-12 col-md mb-4 mb-md-0">
                                    <!-- List Group -->
                                    <ul class="list-group list-group-flush list-group-borderless mb-0 list-group-transparent mt-md-6">
                                        <li><a class="list-group-item list-group-item-action" href="../shop/product-categories-5-column-sidebar.html">Printers & Ink</a></li>
                                        <li><a class="list-group-item list-group-item-action" href="../shop/product-categories-5-column-sidebar.html">Software</a></li>
                                        <li><a class="list-group-item list-group-item-action" href="../shop/product-categories-5-column-sidebar.html">Office Supplies</a></li>
                                        <li><a class="list-group-item list-group-item-action" href="../shop/product-categories-5-column-sidebar.html">Computer Components</a></li>
                                        <li><a class="list-group-item list-group-item-action" href="../shop/product-categories-5-column-sidebar.html">Accesories</a></li>
                                    </ul>
                                    <!-- End List Group -->
                                </div>

                                <div class="col-12 col-md mb-4 mb-md-0">
                                    <h6 class="mb-3 font-weight-bold">Customer Care</h6>
                                    <!-- List Group -->
                                    <ul class="list-group list-group-flush list-group-borderless mb-0 list-group-transparent">
                                        <li><a class="list-group-item list-group-item-action" href="../shop/my-account.html">My Account</a></li>
                                        <li><a class="list-group-item list-group-item-action" href="../shop/track-your-order.html">Order Tracking</a></li>
                                        <li><a class="list-group-item list-group-item-action" href="../shop/wishlist.html">Wish List</a></li>
                                        <li><a class="list-group-item list-group-item-action" href="../home/terms-and-conditions.html">Customer Service</a></li>
                                        <li><a class="list-group-item list-group-item-action" href="../home/terms-and-conditions.html">Returns / Exchange</a></li>
                                        <li><a class="list-group-item list-group-item-action" href="../home/faq.html">FAQs</a></li>
                                        <li><a class="list-group-item list-group-item-action" href="../home/terms-and-conditions.html">Product Support</a></li>
                                    </ul>
                                    <!-- End List Group -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Footer-bottom-widgets -->
           
        </footer>
        <!-- ========== END FOOTER ========== -->

<?php 
 
?>
        <!-- Go to Top -->
        <a class="js-go-to u-go-to" href="#"
            data-position='{"bottom": 15, "right": 15 }'
            data-type="fixed"
            data-offset-top="400"
            data-compensation="#header"
            data-show-effect="slideInUp"
            data-hide-effect="slideOutDown">
            <span class="fas fa-arrow-up u-go-to__inner"></span>
        </a>
        <!-- End Go to Top -->

        <!-- JS Global Compulsory -->
        <script src="../../assets/vendor/jquery/dist/jquery.min.js"></script>
        <script src="../../assets/vendor/jquery-migrate/dist/jquery-migrate.min.js"></script>
        <script src="../../assets/vendor/popper.js/dist/umd/popper.min.js"></script>
        <script src="../../assets/vendor/bootstrap/bootstrap.min.js"></script>

        <!-- JS Implementing Plugins -->
        <script src="../../assets/vendor/appear.js"></script>
        <script src="../../assets/vendor/jquery.countdown.min.js"></script>
        <script src="../../assets/vendor/hs-megamenu/src/hs.megamenu.js"></script>
        <script src="../../assets/vendor/svg-injector/dist/svg-injector.min.js"></script>
        <script src="../../assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
        <script src="../../assets/vendor/jquery-validation/dist/jquery.validate.min.js"></script>
        <script src="../../assets/vendor/fancybox/jquery.fancybox.min.js"></script>
        <script src="../../assets/vendor/typed.js/lib/typed.min.js"></script>
        <script src="../../assets/vendor/slick-carousel/slick/slick.js"></script>
        <script src="../../assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>

        <!-- JS Electro -->
        <script src="../../assets/js/hs.core.js"></script>
        <script src="../../assets/js/components/hs.countdown.js"></script>
        <script src="../../assets/js/components/hs.header.js"></script>
        <script src="../../assets/js/components/hs.hamburgers.js"></script>
        <script src="../../assets/js/components/hs.unfold.js"></script>
        <script src="../../assets/js/components/hs.focus-state.js"></script>
        <script src="../../assets/js/components/hs.malihu-scrollbar.js"></script>
        <script src="../../assets/js/components/hs.validation.js"></script>
        <script src="../../assets/js/components/hs.fancybox.js"></script>
        <script src="../../assets/js/components/hs.onscroll-animation.js"></script>
        <script src="../../assets/js/components/hs.slick-carousel.js"></script>
        <script src="../../assets/js/components/hs.show-animation.js"></script>
        <script src="../../assets/js/components/hs.svg-injector.js"></script>
        <script src="../../assets/js/components/hs.go-to.js"></script>
        <script src="../../assets/js/components/hs.selectpicker.js"></script>

        <!-- JS Plugins Init. -->
        <script>
            $(window).on('load', function () {
                // initialization of HSMegaMenu component
                $('.js-mega-menu').HSMegaMenu({
                    event: 'hover',
                    direction: 'horizontal',
                    pageContainer: $('.container'),
                    breakpoint: 767.98,
                    hideTimeOut: 0
                });

                // initialization of svg injector module
                $.HSCore.components.HSSVGIngector.init('.js-svg-injector');
            });

            $(document).on('ready', function () {
            
                // initialization of header
                $.HSCore.components.HSHeader.init($('#header'));

                // initialization of animation
                $.HSCore.components.HSOnScrollAnimation.init('[data-animation]');

                // initialization of unfold component
                $.HSCore.components.HSUnfold.init($('[data-unfold-target]'), {
                    afterOpen: function () {
                        $(this).find('input[type="search"]').focus();
                    }
                });

                // initialization of popups
                $.HSCore.components.HSFancyBox.init('.js-fancybox');

                // initialization of countdowns
                var countdowns = $.HSCore.components.HSCountdown.init('.js-countdown', {
                    yearsElSelector: '.js-cd-years',
                    monthsElSelector: '.js-cd-months',
                    daysElSelector: '.js-cd-days',
                    hoursElSelector: '.js-cd-hours',
                    minutesElSelector: '.js-cd-minutes',
                    secondsElSelector: '.js-cd-seconds'
                });

                // initialization of malihu scrollbar
                $.HSCore.components.HSMalihuScrollBar.init($('.js-scrollbar'));

                // initialization of forms
                $.HSCore.components.HSFocusState.init();

                // initialization of form validation
                $.HSCore.components.HSValidation.init('.js-validate', {
                    rules: {
                        confirmPassword: {
                            equalTo: '#signupPassword'
                        }
                    }
                });

                // initialization of show animations
                $.HSCore.components.HSShowAnimation.init('.js-animation-link');

                // initialization of fancybox
                $.HSCore.components.HSFancyBox.init('.js-fancybox');

                // initialization of slick carousel
                $.HSCore.components.HSSlickCarousel.init('.js-slick-carousel');

                // initialization of go to
                $.HSCore.components.HSGoTo.init('.js-go-to');

                // initialization of hamburgers
                $.HSCore.components.HSHamburgers.init('#hamburgerTrigger');

                // initialization of unfold component
                $.HSCore.components.HSUnfold.init($('[data-unfold-target]'), {
                    beforeClose: function () {
                        $('#hamburgerTrigger').removeClass('is-active');
                    },
                    afterClose: function() {
                        $('#headerSidebarList .collapse.show').collapse('hide');
                    }
                });

                $('#headerSidebarList [data-toggle="collapse"]').on('click', function (e) {
                    e.preventDefault();

                    var target = $(this).data('target');

                    if($(this).attr('aria-expanded') === "true") {
                        $(target).collapse('hide');
                    } else {
                        $(target).collapse('show');
                    }
                });

                // initialization of unfold component
                $.HSCore.components.HSUnfold.init($('[data-unfold-target]'));

                // initialization of select picker
                $.HSCore.components.HSSelectPicker.init('.js-select');
            });
            var products = <?=json_encode($products);?>;
            $(document).ready(function(){
                getgata();
                
                //Pagination
                pageSize = 20;
                incremSlide = 5;
                startPage = 0;
                numberPage = 0;

                var pageCount =  $(".paginationClass").length / pageSize;
                var totalSlidepPage = Math.floor(pageCount / incremSlide);
                    
                for(var i = 0 ; i<pageCount;i++){
                    $("#pagin").append('<li><a href="#">'+(i+1)+'</a></li> ');
                    if(i>pageSize){
                       $("#pagin li").eq(i).hide();
                    }
                }

                var prev = $("<li/>").addClass("prev").html("Prev").click(function(){
                   startPage-=5;
                   incremSlide-=5;
                   numberPage--;
                   slide();
                });

                prev.hide();

                var next = $("<li/>").addClass("next").html("Next").click(function(){
                   startPage+=5;
                   incremSlide+=5;
                   numberPage++;
                   slide();
                });

                $("#pagin").prepend(prev).append(next);

                $("#pagin li").first().find("a").addClass("current");

                slide = function(sens){
                   $("#pagin li").hide();
                   
                   for(t=startPage;t<incremSlide;t++){
                     $("#pagin li").eq(t+1).show();
                   }
                   if(startPage == 0){
                     next.show();
                     prev.hide();
                   }else if(numberPage == totalSlidepPage ){
                     next.hide();
                     prev.show();
                   }else{
                     next.show();
                     prev.show();
                   }
                   
                    
                }

                showPage = function(page) {
                      $(".paginationClass").hide();
                      $(".paginationClass").each(function(n) {
                          if (n >= pageSize * (page - 1) && n < pageSize * page)
                              $(this).show();
                      });        
                }
                    
                showPage(1);
                $("#pagin li a").eq(0).addClass("current");

                $("#pagin li a").click(function() {
                     $("#pagin li a").removeClass("current");
                     $(this).addClass("current");
                     showPage(parseInt($(this).text()));
                });
              
            });
          
            $('.categoryclass').bind('click', function(e) {
                var id = $(this).attr('id');

                var html ='';
                var dynamicId=0;
                $.ajax({
                    url: "{{url('subcategory')}}",
                    type: "POST",
                    data: {
                         categoryId: id,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (response) {

                    
                        if (jQuery.isEmptyObject(response) == false)
                            {

                                $('.u-header-collapse__nav-list').html('');


                                $.each(response, function(i, item)
                                {
                                    html +='<ul class="u-header-collapse__nav-list">';
                                    html += '<li><a class="u-header-collapse__submenu-nav-link" href="#" id='+item.sub_category_id+'>'+item.title+'</a></li>';
                                    html +='</ul>';
                                });

                            }
                            // console.log(html);
                            $('#'+id).after(html);
                    }
                    });
                });

               
                  function getgata()
                {
                    var html = '';
                    var i ='';
                    $.each(products ,function (key, ObjSection) 
                    {     
                    if(ObjSection.product_id !=i)
                        {

                    
                    html +=  '<div class="col-md-3 paginationClass">';
                    html += '<li class="col-6 col-md-4 col-xl product-item">';
                    html += '<div class="product-item__outer h-100">';
                    html += '<div class="product-item__inner px-xl-4 p-3">';
                    html += '<div class="product-item__body pb-xl-2">'; 
                    html += '<div class="mb-2"><a href="{{url('singleProducts/')}}/'+ObjSection.product_id+'" class="font-size-12 text-gray-5">'+ObjSection.title+'</a></div>';
                    html += '<h5 class="mb-1 product-item__title"><a href="{{url('singleProducts/')}}/'+ObjSection.product_id+'" class="text-blue font-weight-bold">'+ObjSection.product_name+'</a></h5>';
                    html += '<div class="mb-2">';
                    html += '<a href="{{url('singleProducts/')}}/'+ObjSection.product_id+'"  class="d-block text-center"><img class="img-fluid" src="{{url('uploads/')}}/'+ObjSection.product_image+'" alt="Image Description" style="height: 150px;""></a>';
                    html += '</div>'
                    html += '<div class="flex-center-between mb-1">';
                    html += '<div class="prodcut-price">';
                    html += '<div class="text-gray-100">'+ObjSection.product_price+'</div>';
                    html += '</div>';
                    html += '<div class="d-none d-xl-block prodcut-add-cart">';
                    html += '<a href="{{url('singleProducts/')}}/'+ObjSection.product_id+'" class="btn-add-cart btn-primary transition-3d-hover"><i class="ec ec-add-to-cart"></i></a>';
                    html += '</div>';
                    html += '</div>';
                    html += '</div>';
                    html += '<div class="product-item__footer">';
                    html += '<div class="border-top pt-2 flex-center-between flex-wrap">';
                    // html += '<a href="../shop/compare.html" class="text-gray-6 font-size-13"><i class="ec ec-compare mr-1 font-size-15"></i> Compare</a>';
                    // html += '<a href="../shop/wishlist.html" class="text-gray-6 font-size-13"><i class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>';
                    html += '</div> </div></div></div> </li></div>'; 
                    }
                    i= ObjSection.product_id;
                }); 
                $('.ulClass').append(html);
                }
              
        </script>
    </body>
</html>
