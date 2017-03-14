<!DOCTYPE html>

    @include('partials._head')
        
<html>
    <body>
        @include('partials._nav')
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

        <!-- This code is taken from http://twitter.github.com/bootstrap/examples/hero.html -->
            <div class="header-wrapper">
                <div class="site-header">
                    <div class="container">
                        <div class="site-name">
                            <h1>Piwko Sklep</h1>
                        </div>
                    </div> 
                </div>
                <div class="container">
                <div class="banner">
                    <div class="carousel slide" id="myCarousel">
                                    <!-- Carousel items -->
                        <div class="carousel-inner">
                            <div class="item">
                                <img src="/startLayout/img/banner-image.png" alt="">
                                <div class="carousel-caption">
                                    <h1>Nunc dign0 lorem dol</h1>
                                    <h2>Vivamus vestibulum nulla </h2>
                                  <a href="#" class="btn">laoreet ipun</a>
                                </div>
                            </div>
                            <div class="item">
                                <img src="/startLayout/img/banner-image.png" alt="">
                                <div class="carousel-caption">
                                  <h1>Nunc dign0 lorem dol</h1>
                                    <h2>Vivamus vestibulum nulla </h2>
                                  <a href="#" class="btn">laoreet ipun</a>
                                </div>
                            </div>
                            <div class="item active">
                                <img src="/startLayout/img/banner-image.png" alt="">
                                <div class="carousel-caption">
                                  <h1>Nunc dign0 lorem dol</h1>
                                    <h2>Vivamus vestibulum nulla </h2>
                                  <a href="#" class="btn">laoreet ipun</a>
                                </div>
                            </div>
                        </div>
                        <a data-slide="prev" href="#myCarousel" class="carousel-control left"><i class="fw-icon-chevron-left"></i></a>
                        <a data-slide="next" href="#myCarousel" class="carousel-control right"><i class="fw-icon-chevron-right"></i></a>
                    </div>
                </div>
                </div>
            </div>
            <div class="container">
                <div class="featured-blocks">
                    <div class="row-fluid">
                        <div class="span3">
                            <div class="block v-divider border">
                                <i class="fw-icon-headphones"></i>
                                <h1></h1>
                                <p class="last">Morbi interdum mollis</p>
                            </div>
                        </div>
                        <div class="span3">
                            <div class="block v-divider border">
                                <i class="fw-icon-refresh"></i>
                                <h1>aliquam</h1>
                                <p class="last">Vestibulam dipbus</p>
                            </div>
                        </div>
                        <div class="span3">
                            <div class="block v-divider border">
                                <i class="fw-icon-time"></i>
                                <h1>Nunciden</h1>
                                <p class="last">Idot crasorma elinit</p>
                            </div>
                        </div>
                        <div class="span3">
                            <div class="block no-border">
                                <i class="fw-icon-comments-alt"></i>
                                <h1>egestasmod</h1>
                                <p class="last">Felis moodo tortor</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           
                   
                          

          @yield('content')
                       
                   
          
            <div class="footer-wrapper">
                <div class="container">
                    <div class="footer-links">
                        <div class="row-fluid">
                            <div class="span3">
                                <div class="copy-rights">
                                    <span>Copyright (c) 2013</span><br>All rights reserved. 
                               </div>
                            </div>
                            <div class="span3">
                                <div class="copy-rights">
                                    <span>Designed by: </span><br><a href="http://www.alltemplateneeds.com">www.alltemplateneeds.com </a>
                               </div>
                            </div>
                            <div class="span3">
                                <div class="copy-rights">
                                    <span>Images From:  </span><br>
                                    <a href="http://www.wallcoo.net">wallcoo.net </a>| <a href="http://www.wallpaperswide.com">wallpaperswide.com</a> 
                               </div>
                            </div>
                            <div class="span3">
                                <div class="copy-rights">
                                    <span>Contact  </span><br>
                                    <a href="#">info@companyname.com</a> 
                               </div>
                            </div>
                        </div>
                    </div>
                    <div class="site-footer">
                        <div class="row-fluid">
                        <div class="social span3">
                            <ul>
                                <li><a href="#"><i class="fw-icon-facebook-sign"></i></a></li>
                                <li><a href="#"><i class="fw-icon-twitter-sign"></i></a></li>
                                <li><a href="#"><i class="fw-icon-linkedin-sign"></i></a></li>
                                <li><a href="#"><i class="fw-icon-pinterest-sign"></i></a></li>
                                <li><a href="#"><i class="fw-icon-phone-sign"></i></a></li>
                            </ul>
                        </div>
                        <div class="footer-menu span9">
                            <ul>
                                <li><a href="#">Home :: </a></li>
                                <li><a href="#"> About :: </a></li>
                                <li><a href="#"> Contact</a></li>
                            </ul>
                        </div>
                    </div>
                    </div>
                </div>
            </div>

       <script src="/startLayout/js/jquery-1.9.1.js"></script> 
<script src="/startLayout/js/bootstrap.js"></script>
<script>
$('#myCarousel').carousel({
    interval: 1800
});
</script>
    </body>
</html>




