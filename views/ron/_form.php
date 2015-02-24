<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model chd7well\master\models\Ron */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ron-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ronname')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'startvalue')->textInput() ?>

    <?= $form->field($model, 'nextvalue')->textInput() ?>
    
    <?= $form->field($model, 'incvalue')->textInput() ?>

    <?= $form->field($model, 'pattern')->textInput(['maxlength' => 255]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('master', 'Create') : Yii::t('master', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
