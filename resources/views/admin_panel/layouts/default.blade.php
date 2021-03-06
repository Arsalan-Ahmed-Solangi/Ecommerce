<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">

    <title>
        @section('title')
            | Admin
        @show
    </title>

    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link rel="shortcut icon" href="{{ asset('/assets/custom_imgs/site_logo/logo.png') }}"/>

    <!-- global css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/admin_panel_front/css/app.css') }}"/>
    <!-- end of global css -->
    <link rel="stylesheet" href="{{ asset('/assets/admin_panel_front/css/custom_css/skins/skin-coreplus.css') }}" type="text/css" id="skin"/>
    <link rel="stylesheet" href="{{ asset('/assets/admin_panel_front/css/layouts.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/admin_panel_front/font-awesome-4.7.0/css/font-awesome.min.css') }}" />

    <link href="{{ asset('/assets/admin_panel_front/vendors/toastr/css/toastr.min.css') }}" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/admin_panel_front/vendors/iCheck/css/minimal/blue.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/admin_panel_front/css/custom.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/admin_panel_front/css/custom_css/toastr_notificatons.css') }}">

    <!--Button level css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/admin_panel_front/vendors/hover/css/hover-min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/admin_panel_front/css/buttons_sass.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/admin_panel_front/css/advbuttons.css') }}">
    <!--end of Button level css-->

    <!--- Sweet Alert --->
    <link rel="stylesheet" href="{{ asset('/assets/admin_panel_front/sweetalert-master/dist/sweetalert.css') }}">
    <!---Sweet Alert Library----->

    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/admin_panel_front/vendors/animate/animate.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/admin_panel_front/css/custom_css/advanced_modals.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/admin_panel_front/css/jQueryUI/jQueryUI.css') }}">
    <Link rel="stylesheet" type="text/css" href="{{ asset('/assets/admin_panel_front/js/jQueryMultiselect/jQueryMultiselect.css')}}">

    <script src="{{ asset('/assets/admin_panel_front/sweetalert-master/dist/sweetalert-dev.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/admin_panel_front/vendors/select2/css/select2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/admin_panel_front/vendors/select2/css/select2-bootstrap.css')}}">


    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css"/>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css"/>
    <link rel="stylesheet" type="text/css"  href="https://cdn.datatables.net/buttons/2.1.0/css/buttons.bootstrap5.min.css"/>
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
        </style>

<style type="text/css">
    .text-custom{
        color: #012970;

    }
    .text-bold{
        font-weight: 700;
        font-family: "Poppins", sans-serif;
    }
    label.error {
      color: #721c24;
      font-weight: 600;
        background-color: #f8d7da;
        border-color: #f5c6cb;
        position: relative;
        width: 100%;
        margin-top: 5px;
        padding: .75rem 1rem;
        margin-bottom: 1rem;
        border: 1px solid transparent;
        border-radius: .25rem;
    }

</style>

    </head>
<body class="skin-coreplus skin-coreplus nav-fixed">
<div class="preloader">
    <div class="loader_img"><i style="color: #6495ED">Loading</i><img src="{{ asset('/assets/custom_imgs/img/loading.gif') }}" alt="loading..."></div>
</div>
<!-- header logo: style can be found in header-->
<header class="header">
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Header Navbar: style can be found in header-->
        <!-- Sidebar toggle button-->
        <!-- Sidebar toggle button-->
        <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button"> <i class="fa fa-fw fa-bars" style="color: #fff;"></i>
        </a>

        <a href="#noanchor" class="logo">
            <!-- Add the class icon to your logo image or logo icon to add the margining -->
            <img src="{{ asset('/assets/custom_imgs/site_logo/logo.png') }}" alt="logo"/ style="
            float: right;
            margin-top: 0px;
            margin-right: -6px;
            width: 90px;
            ">
        </a>

        <div class="navbar-right">
            <ul class="nav navbar-nav">

                <!-- User Account: style can be found in dropdown-->
                <li class="dropdown user user-menu visible-sm visible-md visible-lg visible-xs">
                    <a href="#" class="dropdown-toggle padding-user" data-toggle="dropdown">
                        <div class="riot">

                            @if(Session::has('SystemAdminSession'))
                                {{ Crypt::decryptString(Session::get('SystemAdminSession')) }}
                            @endif

                            <span>
                                <i class="caret"></i>
                            </span>

                        </div>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- Menu Body -->
                        <li class="p-t-3"><a href="{{ URL :: to('reset_password') }}"> <i class="fa fa-key" style="color: purple;"></i> <span style="color: purple;">Reset Password </span></a>
                        </li>
                        <li role="presentation"></li>
                        <li><a href="{{ URL :: to('adminlogout') }}"> <i class="fa fa-sign-out" style="color: purple;"></i> <span style="color: purple;">Logout</span>
                            </a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
<!-- For horizontal menu -->
@yield('horizontal_header')
<!-- horizontal menu ends -->
<div class="wrapper row-offcanvas row-offcanvas-left">
    <!-- Left side column. contains the logo and sidebar -->

    <aside class="left-side sidebar-offcanvas" id="SidebarMenu">
        <!-- sidebar: style can be found in sidebar-->
        <section class="sidebar affix" style="background-color: #313e4b;">
            <div class="slim">
                <div id="menu" role="navigation">
                    <div class="nav_profile" style="margin-top: 44px;">
                    </div>
                    <nav>
                    <ul class="navigation">
                        <li>
                            <a href="{{ URL::to('adminpanel') }} ">
                                <i class="menu-icon fa fa-fw fa-home"></i>
                                <span class="mm-text">Dashboard</span>
                            </a>
                        </li>


                        <li id="users" >
                            <a href="{{ route('users.index')  }}">
                                <i class="fa fa-users"></i>
                                <span> Manage Users </span>

                            </a>

                        </li>

                        <li id="categories" class="menu-dropdown">
                            <a href="javascript:void(0)">
                                <i class="fa fa-tasks"></i>
                                <span> Categories </span>
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="sub-menu">

                                <li>
                                    <a href="{{ route('categories.create')  }}">
                                        <i class="fa fa-plus-circle"></i>
                                        <span> Add Category </span>

                                    </a>
                                </li>

                                <li>
                                    <a href="{{ route('categories.index')  }}">
                                        <i class="fa fa-eye"></i>
                                        <span> View Categories </span>

                                    </a>
                                </li>

                                <li>
                                    <a href="{{ route('subcategories.create')  }}">
                                        <i class="fa fa-plus-circle"></i>
                                        <span> Add Sub category </span>

                                    </a>
                                </li>

                                <li>
                                    <a href="{{ route('subcategories.index')  }}">
                                        <i class="fa fa-eye"></i>
                                        <span> View Sub categories </span>

                                    </a>
                                </li>

                            </ul>
                        </li>
                        <li id="product" class="menu-dropdown">
                            <a href="{{ route('products.index')  }}">
                                <i class="fa fa-product-hunt"></i>
                                <span> Products </span>
                                <span class="fa arrow"></span>

                            </a>

                            <ul class="sub-menu">

                                <li>
                                    <a href="{{ route('products.create')  }}">
                                        <i class="fa fa-plus-circle"></i>
                                        <span>  Add Product </span>
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ route('products.index')  }}">
                                        <i class="fa fa-eye"></i>
                                        <span> View Products </span>

                                    </a>
                                </li>

                            </ul>
                        </li>
                        <li id="orders" class="menu-dropdown">
                            <a href="{{ route('orders.index');  }}">
                                <i class="fa fa-shopping-cart"></i>
                                <span> Manage Orders </span>
                            </a>

                        </li>

                        <li id="reviews" class="menu-dropdown">
                            <a href="{{ route('reviews.index');  }}">
                                <i class="fa fa-comment"></i>
                                <span> Reviews </span>
                            </a>


                        </li>

                        <li id="orders" class="menu-dropdown">
                            <a href="javascript:void(0)">
                                <i class="fa fa-cog"></i>
                                <span> Site Settings</span>

                            </a>
                            <ul class="sub-menu">

                                <li>
                                    <a href="{{ route('shipping.index')  }}">
                                        <i class="fa fa-ship"></i>
                                        <span> Shipping Charges </span>

                                    </a>
                                </li>

                            </ul>
                        </li>
                    </ul>
                    </nav>
                    <!-- / .navigation -->
                </div>
                <!-- menu -->
            </div>
        </section>
        <!-- /.sidebar -->
    </aside>

    <aside class="right-side" id="DivMainContainer">
        <!-- Content -->
        @if ($message = Session::get('success'))
            <div class="alert alert-success" id="message">
                <p>{{ $message }}</p>
            </div>
        @endif
        @yield('content')
    </aside>
    <!-- page wrapper-->

    <!-- wrapper-->
    <!-- global js -->


<script src="{{ asset('/assets/admin_panel_front/js/app.js') }}" type="text/javascript"></script>
<script type="text/javascript" src="{{ asset('/assets/admin_panel_front/vendors/select2/js/select2.js')}}"></script>
<script type="text/javascript" src="{{ asset('/assets/admin_panel_front/vendors/Buttons/js/buttons.js') }}"></script>
<script type="text/javascript" src="{{ asset('/assets/admin_panel_front/js/custom_js/advanced_modals.js') }} "></script>

<script src="{{ asset('/assets/admin_panel_front/vendors/toastr/js/toastr.min.js') }}"></script>
<script src="{{ asset('/assets/admin_panel_front/vendors/iCheck/js/icheck.js') }} "></script>
<script type="text/javascript" src="{{ asset('/assets/admin_panel_front/js/custom_js/toastr_notifications.js') }}"></script>

<script type="text/javascript" src="{{ asset('/assets/admin_panel_front/js/jQuery/jQueryUI.js') }}"></script>
<script type="text/javascript" src="{{ asset('/assets/admin_panel_front/js/jQueryMultiselect/jQueryMultiselect.js')}}"></script>
<script type="text/javascript" src="{{ asset('/assets/admin_panel_front/js/jQueryMultiselect/jQueryMultiselectFilter.js')}}"></script>
<script src="{{ asset('/assets/admin_panel_front/js/jsCustom.js') }}"></script>
    <!-- end of global js -->
@yield('footer_scripts')
<!-- end page level js -->
    <script>
        $('.slim').slimscroll({
            height: '100vh',
            size: '8px',
            opacity: 0.5,
            color: '#6495ED'
        });
    </script>

    <script>

        function menu(sModule, sComponent)
        {
            $('ul li.active').removeClass('active');

            if(sModule != sComponent)
            {
                $("#"+sComponent).addClass('active');
            }else
            {
                $("#"+sModule).addClass('active');
            }

            AjaxPage("pages/" + sModule + '/' + sComponent , "DivMainContainer");
        }

    </script>

    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>

    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.1.0/js/dataTables.buttons.min.js"></script>
    {{-- <script src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.bootstrap5.min.js"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.print.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.html5.min.js"></script>
    {{-- <script src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.colVis.min.js"></script> --}}

    <script>
        $(document).ready( function () {
            $('#table').DataTable({

                dom: 'Blfrtip',
                buttons: [
                    {
                        extend:    'copyHtml5',
                        text:      '<i class="glyphicon glyphicon-copy"></i> Copy',
                        titleAttr: 'Copy'
                    },
                    {
                        extend:    'excelHtml5',
                        text:      '<i class="glyphicon glyphicon-th-list"></i> Excel',
                        titleAttr: 'Excel',
                        exportOptions: {
                        orthogonal: 'export'
                        },
                    },
                    {
                        extend:    'pdfHtml5',
                        text:      '<i class="glyphicon glyphicon-save"></i> PDF',
                        titleAttr: 'PDF',
                        title: "Ecommerce PDF Report",
                        orientation: 'landscape',
                        pageSize: 'LEGAL',
                    },

                ]

            });


            $("#form").validate();
            $('.message').delay(4000).fadeOut('slow');
        });


    </script>

</body>

</html>
