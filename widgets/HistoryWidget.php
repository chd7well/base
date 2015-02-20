<?php


namespace chd7well\master\widgets;

use yii\base\Widget;
use yii\helpers\Html;
use chd7well\master\models\Modelname;
use chd7well\master\models\Modellog;

class HistoryWidget extends Widget
{
	
	public $model_ID;
	public $modelname;

	
	public function run()
	{
		//return Html::encode($this->message);
		$modelname_id = Modelname::getModelnameID($this->modelname);
		$history = Modellog::find()->where(['modelname_ID'=>$modelname_id, 'model_ID'=>$this->model_ID])->orderBy(['timestamp'=>SORT_DESC])->all();
		return $this->render('history', [
				'history'  => $history
		]);
	}
}


