@include('system')
@include('_column')
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en" > <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title> @yield('title') </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="{{asset('main/css/highlight.css')}}">			<!-- ===This Style sheet for Highlight === -->
        <link rel="stylesheet" href="{{asset('main/css/Pe-icon-7-stroke.css')}}">			<!-- ===This Style sheet for Stoke Icon === -->
        <link rel="stylesheet" href="{{asset('main/css/meanmenu.css')}}">				<!-- ===This Style sheet for Responsive Menu=== -->
        <link rel="stylesheet" href="{{asset('main/css/animate.css')}}">				<!-- ===This Style sheet for Animations=== -->
        <link rel="stylesheet" href="{{asset('main/css/owl.carousel.css')}}">			<!-- ===This Style sheet for Owl Carousel=== -->
        <link rel="stylesheet" href="{{asset('main/css/owl.theme.css')}}">			<!-- ===This Style sheet for Owl Carousel=== -->
        <link rel="stylesheet" href="{{asset('main/css/font-awesome.min.css')}}">		<!-- ===This Style sheet for Font Awesome fonts & icons=== -->
        <link rel="stylesheet" href="{{asset('main/css/bootstrap.min.css')}}">		<!-- ===This Style sheet for Bootstrap classes=== -->
        <link rel="stylesheet" href="{{asset('main/css/style.css')}}">				<!-- ===This Style sheet for Styling the full template=== -->
        <link rel="stylesheet" href="{{asset('main/css/responsive.css')}}">			<!-- ===This Style sheet for making the template responsive for all devices=== -->
        <script src="{{asset('main/js/vendor/modernizr-2.6.2.min.js')}}"></script>
        <script src="{{asset('js/tinymce/tinymce.min.js')}}"></script>
        

    </head>
    <body>


        <!-- ___Start Home One Page___ -->
        <div class="container-fluid home-5 " id="container-full">
            <div class="row">

                <!-- ___Start Left Menu___ -->
                <div class="col-md-2 no-padding">
                    <div id="left-sidebar">
                        <div class="sidebar-menu">
                            <div class="logo">
                                <a href="/"><img src="{{asset('images/logo.png')}}" alt="VladiCMS" /></a>
                            </div>
                            <!-- End Logo -->

                            <!-- ___Start Menu Area___ -->
                            @include('_menu')
                            <!-- End Menu Area -->







                        </div><!-- End Sidebar Menu -->
                    </div><!-- End Menu Left -->
                </div><!-- End Column -->
                <!-- End Left Menu -->

                <!-- ___Start Column___ -->
                <div class="col-md-10 no-padding">

                   @include('_top_bar')




                    <!-- ___Main Content___ -->
                    <div class="main-content">


                        <!-- ___Mani Post Body___ -->
                        <div class="main-post-body">
                            <div class="row">
                                <div class="col-md-9  w-100">
                                    @yield('content')
                                </div> <!-- End Column -->


                                <!-- ___Start Column___ -->
                                <div class="col-md-3 w-50">
                                    <div class="text-center">
                                        <div class="sidebar">
                                            @yield('up_column')
                                            @yield('column')
                                            @yield('down_column')
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- End Row -->
                        </div> <!-- End Main Body Post -->
                    </div> <!-- End Main Content -->



                    @include('_link')

                    <div class="footer text-center">
                        <p>copyrights © 2016 VLADICMS. All Rights Reserved.</p>
                    </div>

                </div><!-- End Column -->
            </div><!-- End Row -->
        </div><!-- End Container -->





        <script src="{{asset('main/js/vendor/jquery.min.js')}}"></script>
        <script src="{{asset('main/js/scripts.js')}}"></script>				<!-- ===This Script for Custom Script=== -->
        <script src="{{asset('main/js/owl.carousel.min.js')}}"></script>			<!-- ===This Script for Owl Carousel=== -->
        <script src="{{asset('main/js/bootstrap.min.js')}}"></script>			<!-- ===This Script for Bootstrap=== -->
        <script src="{{asset('main/js/wow.min.js')}}"></script>				<!-- ===This Script for Wow JS=== -->
        <script src="{{asset('main/js/jquery.meanmenu.min.js')}}"></script>		<!-- ===This Script for Main Menu=== -->
        <script src="{{asset('main/js/jquery.jscroll.js')}}"></script>
        

        <script>
jQuery(document).ready(function ($) {
    jQuery('.category-nav ').meanmenu();
});
        </script>
        <script src="{{asset('main/js/jquery.min.js')}}"></script>
        @yield('downscript')

    </body>
</html>
