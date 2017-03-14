<!DOCTYPE html>

        
<html lang="{{ config('app.locale') }}">
    @include('partials._head')
    <body>
        @include('partials._nav')     
                          
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
                       
                   
          
@include('partials._footer')
    </body>
</html>