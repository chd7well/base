<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model chd7well\master\models\Ron */

$this->title = Yii::t('master', 'Update {modelClass}: ', [
    'modelClass' => 'Ron',
]) . ' ' . $model->ID;
$this->params['breadcrumbs'][] = ['label' => Yii::t('master', 'Rons'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID, 'url' => ['view', 'id' => $model->ID]];
$this->params['breadcrumbs'][] = Yii::t('master', 'Update');
?>
<div class="ron-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
