<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel chd7well\master\models\RonSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('master', 'Range of Numbers');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ron-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('master', 'Create {modelClass}', [
    'modelClass' => 'Ron',
]), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID',
            'ronname',
            'startvalue',
            'nextvalue',
            'incvalue',
            'pattern',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
