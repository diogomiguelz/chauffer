<?php

/** @var \yii\web\View $this */
/** @var string $content */

use common\widgets\Alert;
use frontend\assets\AppAsset;
use yii\bootstrap5\Html;
use yii\helpers\Url;

AppAsset::register($this);

$this->registerCssFile('https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i');
$this->registerCssFile('https://fonts.googleapis.com/css?family=Rufina:400,700');
$this->registerCssFile('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css');

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

    <style>
        body {
            padding-top: 100px;
            display: block !important;
            min-height: 100vh;
        }

        body.site-index, body.site-contact {
            padding-top: 0;
        }

        .breadcrumb, footer.footer.mt-auto {
            display: none;
        }

        main.flex-shrink-0 {
            flex-shrink: unset !important;
            min-height: 500px;
        }

        .top-area {
            display: block !important;
            position: absolute;
            width: 100%;
            z-index: 9999;
            top: 0;
        }

        .header-area {
            background-color: transparent;
            transition: background-color 0.3s ease;
        }

        .header-area.scrolled {
            background-color: rgba(0, 0, 0, 0.9);
        }

        .navbar-brand, .navbar-nav > li > a {
            display: flex;
            align-items: center;
            color: #fff !important;
            transition: color 0.3s ease;
        }

        .navbar-fixed-top {
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 999;
            background-color: rgba(0, 0, 0, 0.9) !important;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
        }

        footer.contact {
            width: 100%;
            background-color: #1a1a1a;
            color: #fff;
            position: relative;
        }

        @media (max-width: 767px) {
            .navbar-brand {
                padding: 0 15px;
            }

            .navbar-collapse {
                max-height: 80vh;
                overflow-y: auto;
            }
        }
    </style>
</head>
<body class="<?= Yii::$app->controller->id . '-' . Yii::$app->controller->action->id ?>">
<?php $this->beginBody() ?>

<div class="top-area">
    <div class="header-area">
        <nav class="navbar navbar-default bootsnav navbar-sticky navbar-scrollspy" data-minus-value-desktop="70" data-minus-value-mobile="55" data-speed="1000">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                        <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand" href="<?= Yii::$app->homeUrl ?>">
                        <img src="<?= Url::to('@web/assets/images/welcome-hero/') ?>" alt="Logo" class="brand-logo">
                    </a>
                </div>
                <div class="collapse navbar-collapse menu-ui-design" id="navbar-menu">
                    <ul class="nav navbar-nav navbar-center">
                        <li><a href="<?= Url::to(['/site/index']) ?>">Home</a></li>
                        <li><a href="<?= Url::to(['/service/index']) ?>">Service</a></li>
                        <li><a href="<?= Url::to(['/car/featured']) ?>">Featured Cars</a></li>
                        <li><a href="<?= Url::to(['/car/new']) ?>">New Cars</a></li>
                        <li><a href="<?= Url::to(['/brand/index']) ?>">Brands</a></li>
                        <li><a href="<?= Url::to(['/site/contact']) ?>">Contact</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</div>

<main role="main" class="flex-shrink-0">
    <?= $content ?>
</main>

<footer id="contact" class="contact">
    <div class="container">
        <div class="footer-top">
            <div class="row">
                <div class="col-md-3">
                    <div class="single-footer-widget">
                        <div class="footer-logo">
                            <a href="<?= Yii::$app->homeUrl ?>">G.B.A</a>
                        </div>
                        <p>Some description about the website or company.</p>
                        <div class="footer-contact">
                            <p>info@example.com</p>
                            <p>+1 (885) 2563154554</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="scroll-Top">
        <div class="return-to-top">
            <i class="fa fa-angle-up" id="scroll-top"></i>
        </div>
    </div>
</footer>

<?php
$this->registerJsFile('https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js', ['position' => \yii\web\View::POS_HEAD]);
$this->registerJsFile('https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js', ['depends' => [\yii\web\JqueryAsset::class]]);

$this->registerJs("
    document.addEventListener('DOMContentLoaded', function() {
        var header = document.querySelector('.header-area');
        var scrollThreshold = 50;
        
        window.addEventListener('scroll', function() {
            var st = window.pageYOffset || document.documentElement.scrollTop;
            header.classList.toggle('navbar-fixed-top', st > scrollThreshold);
        });

        var scrollTop = document.getElementById('scroll-top');
        if (scrollTop) {
            scrollTop.addEventListener('click', function() {
                window.scrollTo({ top: 0, behavior: 'smooth' });
            });
        }
    });
");

$this->registerJs("
function adjustBodyPadding() {
    var headerHeight = document.querySelector('.header-area').offsetHeight;
    document.body.style.paddingTop = headerHeight + 'px';
}

window.addEventListener('resize', adjustBodyPadding);
document.addEventListener('DOMContentLoaded', adjustBodyPadding);
", \yii\web\View::POS_READY);
?>

<script>
document.addEventListener("DOMContentLoaded", function() {
    var header = document.querySelector('.header-area');
    window.addEventListener('scroll', function() {
        if (window.scrollY > 50) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }
    });
});
</script>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage(); ?>
