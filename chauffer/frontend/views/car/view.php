<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Car $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Cars', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="car-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'brand',
            'model',
            'year',
            'plate_number',
            'color',
            'seats',
            'transmission',
            'fuel_type',
            'price_per_day',
            'mileage',
            'status',
            'photos',
            'features',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
