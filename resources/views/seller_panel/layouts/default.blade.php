<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">

        <title>
            @section('title')
            | Basera
            @show
        </title>

        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link rel="shortcut icon" href="{{ asset('public/assets/img/barabr/favicon.png') }}"/>
        
        <!-- global css -->
        <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/app.css') }}"/>
        <!-- end of global css -->
        <link rel="stylesheet" href="{{ asset('public/assets/css/custom_css/skins/skin-coreplus.css') }}" type="text/css" id="skin"/>
        <link rel="stylesheet" href="{{ asset('public/assets/css/layouts.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/font-awesome-4.7.0/css/font-awesome.min.css') }}" />

        <link href="{{ asset('public/assets/vendors/toastr/css/toastr.min.css') }}" rel="stylesheet"/>
        <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/vendors/iCheck/css/minimal/blue.css') }}">

        <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/custom.css') }}">

        <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/custom_css/toastr_notificatons.css') }}">

        <!--Button level css -->
        <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/vendors/hover/css/hover-min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/buttons_sass.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/advbuttons.css') }}">
        <!--end of Button level css-->
        
          <!--- Sweet Alert --->  
        <link rel="stylesheet" href="{{ asset('public/assets/sweetalert-master/dist/sweetalert.css') }}">
          <!---Sweet Alert Library----->

        <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/vendors/animate/animate.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/custom_css/advanced_modals.css') }}">

         <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/jQueryUI/jQueryUI.css') }}">
         <Link rel="stylesheet" type="text/css" href="{{ asset('public/assets/js/jQueryMultiselect/jQueryMultiselect.css')}}">

         <script src="{{ asset('public/assets/sweetalert-master/dist/sweetalert-dev.js') }}"></script>

        <!---page Level Css --->
        @yield('header_styles')
        <!--- end Page Level Css--->

        <style>
          .required:after {
            content:" * ";
            color: red;
            font-weight: bold;
            font-size: 14px;
          }
           .goog-te-banner-frame.skiptranslate{
                display: none !important;
            } 
            body {
            top: 0px !important; 
            }
            .goog-te-gadget-icon{
            background:none !important;
            }
            .goog-te-gadget-icon {
            margin-left: 0px !important;
            margin-right: 0px !important;
            width: 4px !important;
            height: 0px !important;
            border: none;
            vertical-align: middle;
            }

            .goog-te-gadget-simple {
            border-left: 1px solid #87ceeb !important;
            border-top: 1px solid #87ceeb !important;
            border-bottom: 1px solid #87ceeb !important;
            border-right: 1px solid #87ceeb !important;
            border-radius: 4px !important;
            }
            .direction-rtl{
            direction: rtl;
            }

            .right-side2 {
                margin-right: 240px;
                background-color: #eee;
            }
        </style>

    </head>
    <body class="skin-coreplus skin-coreplus nav-fixed">
        <div class="preloader">
            <div class="loader_img"><i style="color: #6495ED">Loading</i><img src="{{ asset('public/assets/img/loading.gif') }}" alt="loading..."></div>
        </div>
        <!-- header logo: style can be found in header-->
        <header class="header">
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <!-- Header Navbar: style can be found in header-->
                <!-- Sidebar toggle button-->
                <!-- Sidebar toggle button-->
            	<a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button"> <i class="fa fa-fw fa-bars" style="color: purple;"></i>
                </a>
                
            	<a href="#barabr" class="logo">
                    <!-- Add the class icon to your logo image or logo icon to add the margining -->
                     <img src="{{ asset('public/assets/img/basera/basera-logo.png') }}" alt="logo"/ style="width: 120px; height: 70px;">
                </a>
            	
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        <!-- Notifications: style can be found in dropdown-->
                        <li class="dropdown notifications-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-fw fa-bell-o black" style="color: black;"></i>
                                <span class="label label-warning" style="color: black;">0</span>
                            </a>
                            <ul class="dropdown-menu dropdown-messages">
                                <li class="dropdown-title">You have 0 notifications</li>

                                <li>
                                    <a href="" class="message icon-not striped-col">

                                        <div class="message-body" style="color: black; text-align: center;">
                                            <!-- <strong>John Doe</strong> -->
                                            <br>
                                            No Notification
                                            <br>
                                            <!-- <span class="noti-date">Just now</span> -->
                                        </div>

                                    </a>
                                </li>
                                
                            </ul>
                        </li>
                        <!-- User Account: style can be found in dropdown-->
                        <li class="dropdown user user-menu visible-sm visible-md visible-lg visible-xs">
                            <a href="#" class="dropdown-toggle padding-user" data-toggle="dropdown">
                                <div class="riot">
                                    
                                        @if(Session::has('ufn'))
                                        {{ Crypt::decryptString(Session::get('ufn')) }}
                                        @endif
                                        <span>
                                            <i class="caret"></i>
                                        </span>
                                    
                                </div>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="p-t-3"><a href="{{ URL :: to('ResetUserPassword') }}"> <i class="fa fa-key" style="color: purple;"></i> <span style="color: purple;">Reset Password </span></a>
                                </li>
                                <li role="presentation"></li>
                                <li><a href="{{ URL :: to('logout') }}"> <i class="fa fa-sign-out" style="color: purple;"></i> <span style="color: purple;">Logout</span>
                                    </a></li>
                            </ul>
                        </li>
                        <li style="margin-top: 10px;">
                            <div id="google_translate_element"></div>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- For horizontal menu -->
        @yield('horizontal_header')
        <!-- horizontal menu ends -->
        <div class="wrapper row-offcanvas row-offcanvas-left" id="mainDiv">
            <!-- Left side column. contains the logo and sidebar -->
            
            <aside class="left-side sidebar-offcanvas" id="SidebarMenu">
                <!-- sidebar: style can be found in sidebar-->
                <section class="sidebar affix">
                    <div class="slim">
                        <div id="menu" role="navigation">
                            <div class="nav_profile">
                                <div class="media profile-left">
                                    <a class="pull-left profile-thumb" href="#">
                                        <img src="{{asset('public/assets/img/barabr/favicon.png')}}" class="img-circle" alt="User Image" style="width: 20px;">
                                    </a>
                                    <div class="content-profile">
                                        <h6 class="media-heading">
                                           &nbsp; 
                                           @if(Session::has('ufn'))
                                           {{ Crypt::decryptString(Session::get('ufn')) }}
                                           @endif
                                           
                                        </h6>
                                       
                                    </div>
                                </div>
                            </div>
                            <ul class="navigation">
                                <li {!! (Request::is('index')|| Request::is('/')? 'class="active"':"") !!}>
                                    <a href="{{ URL::to('/up/dashboard') }}">
                                        <i class="menu-icon fa fa-fw fa-home" style="color:Purple;"></i>
                                        <span class="mm-text" style="color: black;">Dashboard</span>
                                    </a>
                                </li>

                                <li id="SellerProfile">

                                <a href="#basera" onclick="Menu('SellerProfile','SellerProfile', 'fa-user','fa-user');">
                                    <i class="fa fa-user" style="color:Purple;"></i>
                                    <span style="color:black;">Profile</span>
                                </a>

                                </li>

                                <li id="Products">

                                <a href="#basera" onclick="Menu('Products','Products', 'fa-product-hunt','fa-product-hunt');">
                                    <i class="fa fa-product-hunt" style="color:Purple;"></i>
                                    <span style="color:black;">Products</span>
                                </a>

                                </li>

                                <li id="Orders">

                                <a href="#basera" onclick="Menu('Orders','Orders', 'fa-product-hunt','fa-product-hunt');">
                                    <i class="fa fa-product-hunt" style="color:Purple;"></i>
                                    <span style="color:black;">Orders</span>
                                </a>

                                </li>

                            </ul>
                            <!-- / .navigation -->
                        </div>
                        <!-- menu -->
                    </div>
                </section>
                <!-- /.sidebar -->
            </aside>

            <aside class="right-side" id="DivMainContainer">
                <!-- Content -->
                @yield('content')
            </aside>
            <!-- page wrapper-->
            
        </div>
        <!-- wrapper-->
        <!-- global js -->


        <script src="{{ asset('public/assets/js/app.js') }}" type="text/javascript"></script>

        <script type="text/javascript" src="{{ asset('public/assets/vendors/Buttons/js/buttons.js') }}"></script>
        <script type="text/javascript" src="{{ asset('public/assets/js/custom_js/advanced_modals.js') }} "></script>

        <script src="{{ asset('public/assets/vendors/toastr/js/toastr.min.js') }}"></script>
        <script src="{{ asset('public/assets/vendors/iCheck/js/icheck.js') }} "></script>
        <script type="text/javascript" src="{{ asset('public/assets/js/custom_js/toastr_notifications.js') }}"></script>

        <script type="text/javascript" src="{{ asset('public/assets/js/jQuery/jQueryUI.js') }}"></script>
        <script type="text/javascript" src="{{ asset('public/assets/js/jQueryMultiselect/jQueryMultiselect.js')}}"></script>
        <script type="text/javascript" src="{{ asset('public/assets/js/jQueryMultiselect/jQueryMultiselectFilter.js')}}"></script>
        <script src="{{ asset('public/assets/js/jsBarabr/jsBarabr.js') }}"></script>
        <!-- end of global js -->
        @yield('footer_scripts')
        <!-- end page level js -->

        <script type="text/javascript">
         function googleTranslateElementInit() {
          new google.translate.TranslateElement({pageLanguage: 'en',includedLanguages : 'ar,en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
        }
        </script>

        <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit">
        </script>

        <script>
            $('.slim').slimscroll({
                height: '100vh',
                size: '8px',
                opacity: 0.5,
                color: '#6495ED'
            });
        </script>

        <script>

            function Menu(sModule, sComponent, sModuleIcon, sComponentIcon)
            {
                $('ul li.active').removeClass('active');

            	if(sModule != sComponent)
                {
                	$("#"+sComponent).addClass('active');
                }else
                {
                	$("#"+sModule).addClass('active');
                }

                AjaxPage("Pages/" + sModule + '/' + sComponent + '/' + sModuleIcon + '/' + sComponentIcon, "DivMainContainer");
            }

        </script>
        
    <script>
    $(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
    });
    </script>

   <!--  <script type="text/javascript">
        
    $(document).ready(function(){
        $("#DivMainContainer").click(function()
        {  
            if ( ! $('.collapse-left')[0]) //hide side menu if click on main div, this class always hide the menu
            {
                $("#SidebarMenu:first").addClass("collapse-left");
                $("#DivMainContainer:first").addClass("strech");
            }
            $("#MyTable").load();
        });
    });

    </script> -->

    <script type="text/javascript">

    window.setInterval(function(){

        var lang = $(".goog-te-menu-value span:first").text();
        if(lang == "Arabic")
        {
            
            $("#menu").addClass('direction-rtl');
            $("#mainDiv").addClass('direction-rtl');
            $("#menu .navigation a").css( "text-align", "right" );
            $("#DivMainContainer").removeClass('right-side');
            $("#DivMainContainer").addClass('right-side2');
            $("body > .header .navbar .sidebar-toggle").css("float", "right");

         }else
         {
            $("#menu").removeClass('direction-rtl');
            $("#mainDiv").removeClass('direction-rtl');
            $("#menu .navigation a").css( "text-align", "left" );
            $("#DivMainContainer").addClass('right-side');
            $("#DivMainContainer").removeClass('right-side2');
            $("body > .header .navbar .sidebar-toggle").css("float", "left");
         }

        },100);

    </script>


    </body>

</html>
