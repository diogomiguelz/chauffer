<?php
/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \frontend\models\ContactForm $model */

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;
use yii\captcha\Captcha;
use yii\helpers\Url;

$this->title = 'Contact';

// Adicionar CSS para a mensagem de sucesso
$this->registerCss("
    .success-message {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: rgba(0, 0, 0, 0.9);
        color: white;
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.3);
        z-index: 9999;
        text-align: center;
        max-width: 90%;
        width: 400px;
    }
    
    .success-message .check-icon {
        background-color: white;
        color: black;
        width: 60px;
        height: 60px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 20px;
    }
    
    .success-message .check-icon i {
        font-size: 30px;
    }
    
    .success-message h3 {
        margin: 0 0 10px 0;
        font-size: 24px;
        font-weight: 600;
    }
    
    .success-message p {
        margin: 0;
        font-size: 16px;
        line-height: 1.5;
        opacity: 0.9;
    }
");

// Script para remover o parâmetro success da URL
$this->registerJs("
    // Remover o parâmetro success da URL após mostrar o popup
    if (window.location.href.indexOf('success=1') > -1) {
        var url = new URL(window.location);
        url.searchParams.delete('success');
        window.history.replaceState({}, document.title, url);
    }
");
?>

<!-- Banner Section to match the design of other pages -->
<section class="page-banner" style="background: url(<?= Url::to('@web/assets/images/welcome-hero/welcome.jpg') ?>) no-repeat center; background-size: cover;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="banner-text text-center">
                    <h1>Contact Us</h1>
                    <p>We're here to assist you with any inquiries</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="contact" class="contact-section">
    <div class="container">
        <div class="section-header text-center mb-5">
            <p>get in <span>touch</span> with us</p>
            <h2>we'd love to hear from you</h2>
        </div>

        <div class="row">
            <!-- Contact Information -->
            <div class="col-md-5">
                <div class="contact-info-box">
                    <h3>Contact Information</h3>
                    <div class="contact-info-item">
                        <i class="fa fa-envelope"></i>
                        <div>
                            <h4>Email:</h4>
                            <p>privatechauffer@gmail.com</p>
                        </div>
                    </div>
                    <div class="contact-info-item">
                        <i class="fa fa-phone"></i>
                        <div>
                            <h4>Phone:</h4>
                            <p>+376 357 087</p>
                        </div>
                    </div>
                    <div class="contact-info-item">
                        <i class="fa fa-map-marker"></i>
                        <div>
                            <h4>Location:</h4>
                            <p>Barcelona, ES</p>
                        </div>
                    </div>

                    <div class="social-links mt-4">
                        <h4>Social Media:</h4>
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-instagram"></i></a>
                        <a href="#"><i class="fa fa-linkedin"></i></a>
                        <a href="#"><i class="fa fa-whatsapp"></i></a>
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="col-md-7">
                <div class="contact-form-box">
                    <h3>Send a Message</h3>
                    <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                    <div class="row">
                        <div class="col-md-6">
                            <?= $form->field($model, 'name')->textInput(['placeholder' => 'Your Name', 'class' => 'form-control contact-input'])->label(false) ?>
                        </div>
                        <div class="col-md-6">
                            <?= $form->field($model, 'email')->textInput(['placeholder' => 'Your Email', 'class' => 'form-control contact-input'])->label(false) ?>
                        </div>
                    </div>

                    <?= $form->field($model, 'subject')->textInput(['placeholder' => 'Subject', 'class' => 'form-control contact-input'])->label(false) ?>

                    <?= $form->field($model, 'body')->textarea(['rows' => 6, 'placeholder' => 'Your Message', 'class' => 'form-control contact-input'])->label(false) ?>

                    <?= $form->field($model, 'verifyCode')->widget(Captcha::class, [
                        'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-9">{input}</div></div>',
                        'options' => ['class' => 'form-control contact-input', 'placeholder' => 'Enter verification code']
                    ]) ?>

                    <div class="form-group text-center mt-4">
                        <?= Html::submitButton('Send Message', ['class' => 'welcome-btn', 'name' => 'contact-button']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    /* Banner styling */
    .page-banner {
        padding: 170px 0 100px;
        position: relative;
        text-align: center;
        color: #fff;
        background-position: center center !important;
        background-size: cover !important;
    }

    .page-banner::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.6);
        box-shadow: inset 0 -50px 70px -20px rgba(0, 0, 0, 0.8);
    }

    .banner-text {
        position: relative;
        z-index: 1;
        padding: 0 20px;
    }

    .banner-text h1 {
        font-size: 52px;
        font-weight: 700;
        margin-bottom: 20px;
        color: #fff;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
    }

    .banner-text p {
        font-size: 20px;
        color: #fff;
        text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.5);
        max-width: 700px;
        margin: 0 auto;
    }

    /* Contact section styling */
    .contact-section {
        padding: 90px 0;
        background-color: #f8f9fb;
    }

    .section-header p {
        font-size: 24px;
        color: #555;
        text-transform: capitalize;
    }

    .section-header p span {
        color: #4e4ffa;
    }

    .section-header h2 {
        font-size: 36px;
        text-transform: capitalize;
        margin-bottom: 30px;
        font-weight: 600;
    }

    .contact-info-box, .contact-form-box {
        background: #fff;
        padding: 40px;
        border-radius: 12px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.07);
        height: 100%;
        margin-bottom: 30px;
        transition: all 0.3s ease;
    }

    .contact-info-box:hover, .contact-form-box:hover {
        box-shadow: 0 15px 40px rgba(0,0,0,0.1);
        transform: translateY(-5px);
    }

    .contact-info-box h3, .contact-form-box h3 {
        font-size: 24px;
        color: #333;
        margin-bottom: 25px;
        position: relative;
        padding-bottom: 10px;
    }

    .contact-info-box h3:after, .contact-form-box h3:after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 50px;
        height: 3px;
        background: #4e4ffa;
    }

    .contact-info-item {
        display: flex;
        align-items: flex-start;
        margin-bottom: 25px;
    }

    .contact-info-item i {
        font-size: 22px;
        color: #4e4ffa;
        margin-right: 20px;
        margin-top: 5px;
        width: 50px;
        height: 50px;
        line-height: 50px;
        text-align: center;
        background: rgba(78, 79, 250, 0.1);
        border-radius: 50%;
        transition: all 0.3s ease;
    }

    .contact-info-item:hover i {
        background: #4e4ffa;
        color: #fff;
        transform: scale(1.1);
    }

    .contact-info-item h4 {
        font-size: 18px;
        margin-bottom: 5px;
        color: #444a57;
    }

    .contact-info-item p {
        color: #818998;
        margin: 0;
    }

    .social-links a {
        display: inline-block;
        width: 40px;
        height: 40px;
        background: rgba(78, 79, 250, 0.1);
        line-height: 40px;
        text-align: center;
        border-radius: 50%;
        color: #4e4ffa;
        margin-right: 10px;
        transition: all 0.3s;
    }

    .social-links a:hover {
        background: #4e4ffa;
        color: #fff;
    }

    .contact-input {
        padding: 15px 20px;
        margin-bottom: 25px;
        border: 1px solid #e9ecef;
        border-radius: 8px;
        box-shadow: none;
        transition: all 0.3s;
        font-size: 15px;
    }

    .contact-input:focus {
        border-color: #4e4ffa;
        box-shadow: 0 0 0 0.2rem rgba(78, 79, 250, 0.15);
        outline: none;
    }

    .welcome-btn {
        display: inline-block;
        width: 250px;
        height: 60px;
        background: #4e4ffa;
        color: #fff;
        border: none;
        border-radius: 30px;
        font-weight: 600;
        letter-spacing: 1px;
        text-transform: uppercase;
        transition: all 0.3s ease;
        font-size: 16px;
        cursor: pointer;
    }

    .welcome-btn:hover {
        background: #3031e9;
        color: #fff;
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(78, 79, 250, 0.3);
    }

    .section-header h2:after {
        content: '';
        display: block;
        width: 70px;
        height: 3px;
        background: #4e4ffa;
        margin: 25px auto 0;
    }
</style>

<?php if ($showSuccessModal): ?>
    <!-- Mensagem de sucesso -->
    <div class="success-message">
        <div class="check-icon">
            <i class="fa fa-check"></i>
        </div>
        <h3>Thank You!</h3>
        <p>Your message has been sent successfully.</p>
        <p>We will contact you as soon as possible.</p>
    </div>

    <script>
        // Remover a mensagem após 4 segundos
        setTimeout(function() {
            var successMessage = document.querySelector('.success-message');
            if (successMessage) {
                successMessage.style.transition = 'opacity 0.5s ease';
                successMessage.style.opacity = '0';
                setTimeout(function() {
                    successMessage.remove();
                }, 500);
            }
        }, 4000);
    </script>
<?php endif; ?>
