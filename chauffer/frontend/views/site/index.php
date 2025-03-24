<?php
use yii\helpers\Html;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var common\models\Car[] $featuredCars */

$this->title = 'G.B.A';

// Add this script to customize navbar background for home page
$this->registerJs("
    // Make navbar transparent on homepage only
    $(document).ready(function() {
        $('.header-area').addClass('home-navbar');
        
        $(window).scroll(function() {
            if ($(window).scrollTop() > 100) {
                $('.header-area').removeClass('home-navbar').addClass('navbar-fixed-top');
            } else {
                $('.header-area').addClass('home-navbar').removeClass('navbar-fixed-top');
            }
        });
    });
");

// Add custom styles for homepage navbar
$this->registerCss("
    .home-navbar {
        background-color: transparent !important;
        box-shadow: none;
        transition: all 0.3s ease;
        height: 80px; /* Definir altura fixa para a navbar */
    }
    
    .navbar-fixed-top {
        height: 80px; /* Manter a mesma altura quando fixada */
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }
    
    .home-navbar .navbar-brand,
    .home-navbar .navbar-nav > li > a {
        color: #fff !important;
        text-shadow: 0 1px 3px rgba(0, 0, 0, 0.5);
    }
    
    .home-navbar .navbar-nav > li.active > a,
    .home-navbar .navbar-nav > li > a:hover {
        color: #4e4ffa !important;
    }
");

// Adicionar JavaScript para inicializar o carrossel de imagens do carro
$this->registerJs("
    $(document).ready(function(){
        $('.car-image-carousel').owlCarousel({
            items: 1,
            loop: true,
            margin: 0,
            nav: true,
            dots: true,
            autoplay: true,
            autoplayTimeout: 3000,
            autoplayHoverPause: true,
            navText: ['', '']
        });
    });
");

// Adicionar estilos CSS para o carrossel de imagens do carro
$this->registerCss("
    .car-image-carousel-container {
        position: relative;
        border-radius: 10px;
        overflow: hidden;
    }
    
    .car-image-carousel {
        border-radius: 10px;
        overflow: hidden;
    }
    
    /* Estilo para os indicadores de pontos */
    .car-image-carousel .owl-dots {
        position: absolute;
        bottom: 15px;
        width: 100%;
        text-align: center;
    }
    
    .car-image-carousel .owl-dots .owl-dot {
        display: inline-block;
        margin: 0 4px;
    }
    
    .car-image-carousel .owl-dots .owl-dot span {
        width: 8px;
        height: 8px;
        background: rgba(255,255,255,0.5);
        border-radius: 50%;
        display: block;
        transition: all 0.3s ease;
    }
    
    .car-image-carousel .owl-dots .owl-dot.active span {
        background: #fff;
        transform: scale(1.3);
    }
    
    /* Estilo para as setas de navegação */
    .car-image-carousel .owl-nav {
        margin: 0;
        opacity: 0;
        transition: opacity 0.2s ease;
    }
    
    .car-image-carousel:hover .owl-nav {
        opacity: 1;
    }
    
    .car-image-carousel .owl-nav button.owl-prev,
    .car-image-carousel .owl-nav button.owl-next {
        position: absolute;
        top: 0;
        height: 100%;
        width: 45px;
        background: transparent !important;
        margin: 0;
        padding: 0 !important;
        border: none !important;
        outline: none !important;
    }
    
    .car-image-carousel .owl-nav button.owl-prev {
        left: 0;
        cursor: w-resize;
    }
    
    .car-image-carousel .owl-nav button.owl-next {
        right: 0;
        cursor: e-resize;
    }
    
    .car-image-carousel .owl-nav button span {
        display: none;
    }
    
    .car-image-carousel .owl-nav button::before {
        content: '';
        position: absolute;
        top: 50%;
        width: 15px;
        height: 15px;
        border: solid #fff;
        border-width: 1px 1px 0 0;
        transform-origin: center;
    }
    
    .car-image-carousel .owl-nav button.owl-prev::before {
        left: 20px;
        transform: translateY(-50%) rotate(-135deg);
    }
    
    .car-image-carousel .owl-nav button.owl-next::before {
        right: 20px;
        transform: translateY(-50%) rotate(45deg);
    }
    
    .car-image-carousel img {
        width: 100%;
        height: auto;
        object-fit: cover;
    }
");
?>

<!--welcome-hero start -->
    <section id="home" class="welcome-hero" style="background: url(<?= Url::to('@web/assets/images/welcome-hero/welcome.jpg') ?>) no-repeat center; background-size: cover;">
    <div class="container">
        <div class="welcome-hero-txt">
            <h2>Your Safety and Comfort, Our Priority</h2>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
            </p>
            <button class="welcome-btn" onclick="window.location.href='#contact'">contact us</button>
        </div>
    </div>
</section>

<!--service start -->
<section id="service" class="service">
    <div class="container">
        <div class="service-content">
            <div class="row">
                <div class="col-md-4 col-sm-6">
                    <div class="single-service-item">
                        <div class="single-service-icon">
                            <i class="flaticon-car"></i>
                        </div>
                        <h2><a href="#">Priority Safety</a></h2>
                        <p>
                            Travel with peace of mind. Our chauffeurs are highly trained and experienced, ensuring your safety on every journey.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="single-service-item">
                        <div class="single-service-icon">
                            <i class="flaticon-car-repair"></i>
                        </div>
                        <h2><a href="#">Luxury & Comfort</a></h2>
                        <p>
                            Enjoy luxurious vehicles equipped with all amenities to make your trip pleasant and relaxing.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="single-service-item">
                        <div class="single-service-icon">
                            <i class="flaticon-car-1"></i>
                        </div>
                        <h2><a href="#">Privacy & Discretion</a></h2>
                        <p>
                            Count on total discretion and privacy. Our services are perfect for clients who value their confidentiality.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--new-cars start -->
<section id="new-cars" class="new-cars">
    <div class="container">
        <div class="section-header">
            <p>checkout <span>the</span> latest cars</p>
            <h2>newest cars</h2>
        </div>
        <div class="new-cars-content">
            <div class="owl-carousel owl-theme" id="new-cars-carousel">
                <!-- Example cars -->
                <div class="new-cars-item">
                    <div class="single-new-cars-item">
                        <div class="row">
                            <div class="col-md-7 col-sm-12">
                                <div class="new-cars-img">
                                    <div class="car-image-carousel-container">
                                        <div class="car-image-carousel owl-carousel owl-theme">
                                            <div class="item">
                                                <img src="<?= Url::to('@web/assets/images/new-cars-model/m5.jpg') ?>" alt="BMW Série 5 (E60) - Vista Frontal"/>
                                            </div>
                                            <div class="item">
                                                <img src="<?= Url::to('@web/assets/images/new-cars-model/m5-side.jpg') ?>" alt="BMW Série 5 (E60) - Vista Lateral"/>
                                            </div>
                                            <div class="item">
                                                <img src="<?= Url::to('@web/assets/images/new-cars-model/m5-interior.jpg') ?>" alt="BMW Série 5 (E60) - Interior"/>
                                            </div>
                                            <div class="item">
                                                <img src="<?= Url::to('@web/assets/images/new-cars-model/m5-back.jpg') ?>" alt="BMW Série 5 (E60) - Vista Traseira"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5 col-sm-12">
                                <div class="new-cars-txt">
                                    <h2><a href="#">BMW Série 5 (E60)</a></h2>
                                    <p>
                                        Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                    </p>
                                    <p class="new-cars-para2">
                                        Sed ut pers unde omnis iste natus error sit voluptatem accusantium doloremque laudantium.
                                    </p>
                                    <!-- Button to view cars -->
                                    <button class="welcome-btn new-cars-btn" onclick="window.location.href='<?= Url::to(['/car/index']) ?>'">
                                        view details
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Other cars here -->
            </div>
        </div>
    </div>
</section>

<!--featured-cars start -->
<section id="featured-cars" class="featured-cars">
    <div class="container">
        <div class="section-header">
            <p>checkout <span>the</span> featured cars</p>
            <h2>featured cars</h2>
        </div>
        <div class="featured-cars-content">
            <div class="row">
                <!-- Featured cars content -->
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="single-featured-cars">
                        <div class="featured-img-box">
                            <div class="featured-cars-img">
                                <img src="<?= Url::to('@web/assets/images/featured-cars/fc1.png') ?>" alt="cars">
                            </div>
                            <div class="featured-model-info">
                                <p>
                                    model: 2017
                                    <span class="featured-mi-span"> 3100 mi</span>
                                    <span class="featured-hp-span"> 240HP</span>
                                    automatic
                                </p>
                            </div>
                        </div>
                        <div class="featured-cars-txt">
                            <h2><a href="<?= Url::to(['/car/index']) ?>">BMW 6-series gran coupe</a></h2>
                            <h3>USD 89,395</h3>
                            <p>
                                Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non.
                            </p>
                        </div>
                    </div>
                </div>
                <!-- Other featured cars here -->
            </div>
        </div>
    </div>
</section>

<!--brand start -->
<section id="brand" class="brand">
    <div class="container">
        <div class="brand-area">
            <div class="owl-carousel owl-theme brand-item">
                <div class="item">
                    <a href="<?= Url::to(['/car/index', 'brand' => 'bmw']) ?>">
                        <img src="<?= Url::to('@web/assets/images/brand/br1.png') ?>" alt="brand-image" />
                    </a>
                </div>
                <!-- Other brands here -->
            </div>
        </div>
    </div>
</section>
