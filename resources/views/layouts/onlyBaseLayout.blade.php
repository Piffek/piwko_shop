<!DOCTYPE html>

        
<html lang="{{ config('app.locale') }}">
    @include('partials._head')
    <body>
        @include('partials._nav')  
        @include('partials._messages')      
                          
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
                                    <h1>Profesjonalizm</h1>
                                </div>
                            </div>
                            <div class="item">
                                <img src="/startLayout/img/banner-image.png" alt="">
                                <div class="carousel-caption">
                                  <h1>Tradycja</h1>
                                </div>
                            </div>
                            <div class="item active">
                                <img src="/startLayout/img/banner-image.png" alt="">
                                <div class="carousel-caption">
                                  <h1>Sprawdź</h1>
                                  <a href="#" class="btn">zobacz</a>
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
                                <h1>Tradycja</h1>
                                <p class="last">Cechuje nas tradycja</p>
                            </div>
                        </div>
                        <div class="span3">
                            <div class="block v-divider border">
                                <i class="fw-icon-refresh"></i>
                                <h1>Szybkosc</h1>
                                <p class="last">Szybko dostarczamy paczki</p>
                            </div>
                        </div>
                        <div class="span3">
                            <div class="block v-divider border">
                                <i class="fw-icon-time"></i>
                                <h1>Profesjonalizm</h1>
                                <p class="last">Pewnosc usług najwyższej jakosci</p>
                            </div>
                        </div>
                        <div class="span3">
                            <div class="block no-border">
                                <i class="fw-icon-comments-alt"></i>
                                <h1>Ceny</h1>
                                <p class="last">Bardzo niskie ceny</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          @yield('content')
                       
                   
          
@include('partials._footer')
    </body>
</html>