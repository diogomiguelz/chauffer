<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \common\models\LoginForm $model */

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container-fluid">
    <div class="row min-vh-100">
        <!-- Left side - Background image -->
        <div class="col-lg-8 d-none d-lg-block bg-primary">
            <div class="d-flex align-items-center justify-content-center h-100">
                <div class="text-center text-white">
                    <h1 class="display-1 fw-bold">Bem-vindo</h1>
                    <p class="lead">Sistema de Gerenciamento de Frota</p>
                </div>
            </div>
        </div>

        <!-- Right side - Login form -->
        <div class="col-lg-4">
            <div class="d-flex align-items-center py-5 h-100">
                <div class="w-100 px-4">
                    <div class="text-center mb-5">
                        <h2 class="fw-bold"><?= Html::encode($this->title) ?></h2>
                        <p class="text-muted">Faça login para acessar o sistema</p>
                    </div>

                    <?php $form = ActiveForm::begin([
                        'id' => 'login-form',
                        'options' => ['class' => 'needs-validation']
                    ]); ?>

                    <?= $form->field($model, 'username', [
                        'options' => ['class' => 'form-floating mb-3'],
                        'template' => "{input}\n{label}\n{error}"
                    ])->textInput([
                        'class' => 'form-control',
                        'placeholder' => 'Username',
                        'autofocus' => true
                    ]) ?>

                    <?= $form->field($model, 'password', [
                        'options' => ['class' => 'form-floating mb-3'],
                        'template' => "{input}\n{label}\n{error}"
                    ])->passwordInput([
                        'class' => 'form-control',
                        'placeholder' => 'Password'
                    ]) ?>

                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <?= $form->field($model, 'rememberMe', [
                            'options' => ['class' => 'form-check mb-0']
                        ])->checkbox() ?>
                        
                        <?= Html::a('Esqueceu a senha?', ['site/request-password-reset'], [
                            'class' => 'text-primary text-decoration-none'
                        ]) ?>
                    </div>

                    <?= Html::submitButton('Entrar', [
                        'class' => 'btn btn-primary w-100 py-3 mb-4',
                        'name' => 'login-button'
                    ]) ?>

                    <div class="text-center">
                        <p class="mb-0">Não tem uma conta? 
                            <?= Html::a('Registre-se', ['site/signup'], [
                                'class' => 'text-primary text-decoration-none fw-bold'
                            ]) ?>
                        </p>
                    </div>

                    <?php ActiveForm::end(); ?>

                    <?php if (Yii::$app->session->hasFlash('error')): ?>
                        <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
                            <?= Yii::$app->session->getFlash('error') ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
$this->registerCss("
    .bg-primary {
        background: linear-gradient(135deg, #0d6efd 0%, #0a58ca 100%);
    }
    .form-floating > .form-control:focus ~ label,
    .form-floating > .form-control:not(:placeholder-shown) ~ label {
        color: #0d6efd;
    }
    .form-control:focus {
        border-color: #0d6efd;
        box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
    }
");
?>
