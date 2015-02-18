<?php

/*
 * This file is part of the chd7well project.
 *
 * (c) chd7well project <http://github.com/chd7well>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use chd7well\base\models\Unit;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 */

$this->title = Yii::t('master', 'Manage Units');
$this->params['breadcrumbs'][] = $this->title;
?>
<h1><?= Html::encode($this->title) ?> <?= Html::a(Yii::t('master', 'Create an Unit'), ['create'], ['class' => 'btn btn-success']) ?></h1>


<?php Pjax::begin() ?>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel'  => $searchModel,
    'layout'  => "{items}\n{pager}",
    'columns' => [
         [
		    'class' => 'kartik\grid\SerialColumn',
		    'contentOptions' => ['class' => 'kartik-sheet-style'],
		    'width' => '40px',
		    'header' => '',
		    'headerOptions' => ['class' => 'kartik-sheet-style']
		    ],
    
    [
    'class' => 'kartik\grid\EditableColumn',
    'attribute' => 'unit',
    
    'vAlign' => 'middle',
    'width' => '220px',
    'editableOptions' =>  function ($model, $key, $index) {
    	return [
    			'header' => 'Unit',
    			'size' => 'md',
    	];
    }
    ],
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{delete}',
        ],
    ],
]); ?>

<?php Pjax::end() ?>
