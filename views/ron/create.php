<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model chd7well\master\models\Ron */

$this->title = Yii::t('master', 'Create {modelClass}', [
    'modelClass' => 'Ron',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('master', 'Rons'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ron-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
