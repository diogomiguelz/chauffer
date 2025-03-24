<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var frontend\models\CarSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="car-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'brand') ?>

    <?= $form->field($model, 'model') ?>

    <?= $form->field($model, 'year') ?>

    <?= $form->field($model, 'plate_number') ?>

    <?php // echo $form->field($model, 'color') ?>

    <?php // echo $form->field($model, 'seats') ?>

    <?php // echo $form->field($model, 'transmission') ?>

    <?php // echo $form->field($model, 'fuel_type') ?>

    <?php // echo $form->field($model, 'price_per_day') ?>

    <?php // echo $form->field($model, 'mileage') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'photos') ?>

    <?php // echo $form->field($model, 'features') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
