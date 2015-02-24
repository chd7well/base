<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model chd7well\master\models\RonSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ron-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID') ?>

    <?= $form->field($model, 'ronname') ?>

    <?= $form->field($model, 'startvalue') ?>

    <?= $form->field($model, 'nextvalue') ?>
    
     <?= $form->field($model, 'incvalue') ?>

    <?= $form->field($model, 'pattern') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('master', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('master', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
