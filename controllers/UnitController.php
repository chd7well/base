<?php

/*
 * This file is part of the chd7well project.
 *
 * (c) chd7well project <http://github.com/chd7well/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */


namespace chd7well\master\controllers;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\widgets\ActiveForm;
use yii\helpers\Json;
use yii\filters\AccessControl;
use chd7well\master\models\Unit;
use chd7well\master\models\UnitSearch;
use chd7well\master\models\Modellog;


/**
 * AdminController allows you to administrate users.
 *
 * @author Christian Dumhart <christian.dumhart@chd.at>
 */


class UnitController extends Controller
{
	
	/**
	 * Lists all Parameters.
	 * @return mixed
	 */
	public function actionIndex() {		
		$searchModel = new UnitSearch();
		$dataProvider = $searchModel->search ( \Yii::$app->request->queryParams );
		if (\Yii::$app->request->post('hasEditable')) {
			// instantiate your CorecompPractice model for saving
			$model = Unit::findOne(['ID'=>$_POST['editableKey']]);
			// store a default json response as desired by editable
			$out = Json::encode(['output'=>'', 'message'=>'']);
		
			// fetch the first entry in posted data (there should
			// only be one entry anyway in this array for an
			// editable submission)
			// - $posted is the posted data for CorecompPractice without any indexes
			// - $post is the converted array for single model validation
			$post = [];
			$posted = current($_POST['Unit']);
			$post['Unit'] = $posted;
			$output = '';
			// load model like any single model validation
			if ($model->load($post)) {
				// can save model or do something before saving model
				if(isset($posted['unit']))
				{
					Modellog::logAction($model->className(), $model->ID, \Yii::$app->user->identity->ID, Modellog::ACTION_UPDATE, "Updated Unit to " . $model->unit);
					$model->update(true, ['unit']);
				}
		
		
				$output = '';
				$out = Json::encode(['output'=>$output, 'message'=>'']);
			}
			// return ajax json encoded response and exit
			echo $out;
			return;
		
		}
		
		return $this->render ( 'index', [ 
				'searchModel' => $searchModel,
				'dataProvider' => $dataProvider 
		] );
	}
	
	
	/**
	 * Updates an existing Parameter.
	 * If update is successful, the browser will be redirected to the 'index' page.
	 * 
	 * @param integer $id        	
	 * @return mixed
	 */
	public function actionUpdate($id) {
		$model = $this->findModel( $id );
		if ($model->load ( \Yii::$app->request->post () ) && $model->save ()) {
			Modellog::logAction($model->className(), $id, \Yii::$app->user->identity->ID, Modellog::ACTION_UPDATE, "Updated Unit");
			return $this->redirect ( [ 
					'index',
			] );
		} else {
			return $this->render ( 'update', [ 
					'model' => $model 
			] );
		}
	}
	
	
	/**
	 * Deletes an existing Parameter model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 * @param  integer $id
	 * @return mixed
	 */
	public function actionDelete($id)
	{
			Modellog::logAction($model->className(), $id, \Yii::$app->user->identity->ID, Modellog::ACTION_DELETE, "Deleted Unit");
			$this->findModel($id)->delete();
			return $this->redirect(['index']);
	}
	

	/**
	 * Creates a new Parameter model.
	 * If creation is successful, the browser will be redirected to the 'index' page.
	 * @return mixed
	 */
	public function actionCreate()
	{
		$unit = new Unit();
	
		$this->performAjaxValidation($unit);
	
		if ($unit->load(\Yii::$app->request->post()) && $unit->save()) {
			\Yii::$app->getSession()->setFlash('success', \Yii::t('master', 'Unit has been created'));
			Modellog::logAction($model->className(), $unit->ID, \Yii::$app->user->identity->ID, Modellog::ACTION_CREATE, "Created new Unit");
			return $this->redirect(['index']);
		}
	
		return $this->render('create', [
				'unit' => $unit
		]);
	}
	
	
	/**
	 * Finds the Parameter model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 * @param integer $id
	 * @return Config the loaded model
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	protected function findModel($id)
	{
		if (($model = Unit::findOne($id)) !== null) {
			return $model;
		} else {
			throw new NotFoundHttpException('The requested page does not exist.');
		}
	}
	
	/**
	 * Performs AJAX validation.
	 * @param array|Model $models
	 * @throws \yii\base\ExitException
	 */
	protected function performAjaxValidation($models)
	{
		if (\Yii::$app->request->isAjax) {
			if (is_array($models)) {
				$result = [];
				foreach ($models as $model) {
					if ($model->load(\Yii::$app->request->post())) {
						\Yii::$app->response->format = Response::FORMAT_JSON;
						$result = array_merge($result, ActiveForm::validate($model));
					}
				}
				echo json_encode($result);
				\Yii::$app->end();
			} else {
				if ($models->load(\Yii::$app->request->post())) {
					\Yii::$app->response->format = Response::FORMAT_JSON;
					echo json_encode(ActiveForm::validate($models));
					\Yii::$app->end();
				}
			}
		}
	}
	
    
}
