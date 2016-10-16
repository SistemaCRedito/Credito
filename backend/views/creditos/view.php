<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Creditos */

$this->title = $model->idcredito;
$this->params['breadcrumbs'][] = ['label' => 'Creditos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="creditos-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idcredito], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idcredito], [
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
            'idcredito',
            'actividad',
            'credito',
            'periodo',
            'comentario:ntext',
            'responsable',
            'obligatorio',
            'limite',
            'imagen',
        ],
    ]) ?>

</div>