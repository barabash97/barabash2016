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
                                <a href="/"><img src="{{asset('images/logo.png')}}" alt="Octagon" /></a>
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




                    <!--- start content --->
                    <div class="main-content">



                        <div class="main-post-body">
                            <div class="row">
                                @yield('content')
                            </div>
                        </div> 
                    </div> 
                    <!--- end content --->



                    <!-- ___Start Bottom___ -->
                    <div class="bottom container-fluid">
                        <div class="row">
                            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                                <div class="useful-links widget">
                                    <h3>Link</h3>
                                    <ul class="pull-left">
                                        <li><a href="/">Home</a></li>
                                        <li><a href="#">About</a></li>
                                        <li><a href="#">Blogs</a></li>
                                    </ul>
                                    <ul class="pull-right">
                                        <li><a href="#">Contatti</a></li>
                                        <li><a href="#">Licenza & Privacy</a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- End Column -->

                            <!-- ___Contact Us___ -->
                            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                                <div class="bottom-contact widget">
                                    <h3>Contatti</h3>
                                    <div class="contact-info">
                                        <p><strong>Email :</strong> barabash97@gmail.com</p>
                                        <p><strong>Tel :</strong> +39 388 423 3639</p>
                                    </div>
                                </div>
                            </div>
                            <!-- End Column -->

                            <!-- ___News Letter___ -->
                            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                                <div class="newsletter widget">
                                    <h3>Newsletter</h3>
                                    <form name="newsletter" action="" method="post">
                                        <div class="input-group">
                                            <input type="text" class="form-control no-radius" placeholder="Indirizzo E-mail">
                                            <span class="input-group-btn  no-radius">
                                                <button class="btn btn-default" type="submit">Iscriviti</button>
                                            </span>
                                        </div><!-- /input-group -->
                                    </form>
                                    <p>Iscriviti per ricevere news del giorno.</p>
                                </div>
                            </div>
                            <!-- End Column -->

                            <!-- ___Start Social Icons Column___ -->
                            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                                <!-- ___Start Social Icons___ -->
                                <div class="bottom-social widget">
                                    <h3>Segui su:</h3>
                                    <div class="social-icon">
                                        <ul>
                                            <li>
                                                <a href="#0" class="connect-with-us facebook">
                                                    <i class="fa fa-facebook"></i>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="#0" class="connect-with-us twitter">
                                                    <i class="fa fa-twitter"></i>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="#0" class="connect-with-us youtube">
                                                    <i class="fa fa-youtube-play"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#0" class="connect-with-us instagram">
                                                    <i class="fa fa-instagram"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <p>Unisciti al nostro community per ricevere gli ultimi aggiornamenti</p>
                                </div><!-- End Social Icons -->
                            </div><!-- End Column -->
                        </div><!-- End Row -->
                    </div>
                    <!-- End Bottom -->

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

    </body>
</html>
