<?php

/*
 * This file is part of the Jultatools project.
 *
 * (c) chd7well project <http://github.com/chd7well>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use chd7well\master\widgets\HistoryWidget;
/**
 * @var yii\web\View                 $this
 * @var chd7well\configmanager\models\Parameter    $parameter
 * @var chd7well\configmanager\Module         $module
 */

$unit = $model;
$this->title = Yii::t('master', 'Update Unit');
$this->params['breadcrumbs'][] = ['label' => Yii::t('master', 'Unit'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>


<?php $form = ActiveForm::begin([
    'enableAjaxValidation'   => true,
    'enableClientValidation' => false
]); ?>

<!-- 
<div class="panel panel-default">
    <div class="panel-body">
        <?= Html::submitButton(Yii::t('master', 'Save'), ['class' => 'btn btn-primary btn-sm']) ?>
        
    </div>
</div>-->

<div class="panel panel-default">
    <div class="panel-heading">
        <?= Html::encode($this->title) ?>
    </div>
    <div class="panel-body">
        <?= $this->render('_unit', ['form' => $form, 'unit' => $unit]) ?>
        <?= Html::submitButton(Yii::t('master', 'Save'), ['class' => 'btn btn-primary btn-sm']) ?>
    </div>
</div>






<?php ActiveForm::end(); 
echo HistoryWidget::widget(['modelname' => $unit->className(),
							'model_ID' => $unit->ID]);

?>

                        
