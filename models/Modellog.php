<?php
/*
 * This file is part of the chd7well project.
 *
 * (c) chd7well project <http://github.com/chd7well/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */


namespace chd7well\master\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use chd7well\user\models\User;

/**
 * This is the model class for table "{{%master_modelname}}".
 *

 * @author Christian Dumhart <christian.dumhart@chd.at>
 */
class Modellog extends \yii\db\ActiveRecord
{
	
	const ACTION_CREATE = 1;
	const ACTION_UPDATE = 2;
	const ACTION_DELETE = 3;
	const ACTION_VIEW = 4;
	const ACTION_STORNO = 5;
	const ACTION_DISABLED = 6;
	const ACTION_SEND_EMAIL = 20;
	
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%master_model_log}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['modelname_ID', 'model_ID', 'user_ID', 'action'], 'required'],
        	[['modelname_ID', 'model_ID', 'user_ID', 'action'], 'integer'],
            [['comment'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('master', 'ID'),
        	'modelname_ID' => Yii::t ( 'master', 'Model name ID' ),
        	//'modelname' => Yii::t ( 'master', 'Model Name' ),
			'model_ID' => Yii::t ( 'master', 'Model Unique ID' ),
			'user_ID' => Yii::t ( 'master', 'User ID' ),
        	//'user' => Yii::t ( 'master', 'User' ),
			'action' => Yii::t ( 'master', 'Action' ),
            'comment' => Yii::t('master', 'Comment'),
        ];
    }

    public function actionNames()
    {
    	return[
    		Modellog::ACTION_CREATE => 	Yii::t('master', 'create'),
    			Modellog::ACTION_UPDATE => 	Yii::t('master', 'update'),
    			Modellog::ACTION_DELETE => 	Yii::t('master', 'delete'),
    			Modellog::ACTION_VIEW => 	Yii::t('master', 'view'),
    			Modellog::ACTION_STORNO => 	Yii::t('master', 'storno'),
    			Modellog::ACTION_DISABLED => Yii::t('master', 'disabled'),
    			Modellog::ACTION_SEND_EMAIL => 	Yii::t('master', 'sent email'),
    	];
    }
    public function behaviors()
    {
    	return [
    			[
    					'class' => TimestampBehavior::className(),
    					'createdAtAttribute' => 'timestamp',
    					'updatedAtAttribute' => null,
    					'value' => new Expression('NOW()'),
    			],
    	];
    }
    
    public static function logAction($modelname, $model_ID, $user_ID, $action, $comment)
    {
    	$model = new Modellog();
    	$model->modelname_ID = Modelname::getModelnameID($modelname);
    	$model->model_ID = $model_ID;
    	$model->user_ID = $user_ID;
    	$model->action = $action;
    	$model->comment = $comment;
    	$model->save();
    }
    

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
    	return $this->hasOne(User::className(), ['id' => 'user_ID']);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getModelname()
    {
    	return $this->hasOne(Modelname::className(), ['ID' => 'modelname_ID']);
    }
    
    public function getActionname()
    {
    	return $this->actionNames()[$this->action];
    }
}