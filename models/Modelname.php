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

/**
 * This is the model class for table "{{%master_modelname}}".
 *

 * @author Christian Dumhart <christian.dumhart@chd.at>
 */
class Modelname extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%master_modelname}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['modelname'], 'required'],
            [['modelname'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('master', 'ID'),
            'modelname' => Yii::t('master', 'Model name'),
        ];
    }

    public static function getModelnameID($modelname)
    {
    	$model = Modelname::findOne(['modelname'=>$modelname]);
    	if(!isset($model) || $model == null)
    	{
    		$model = new Modelname();
    		$model->modelname = $modelname;
    		$model->save();
    	}
    	return $model->ID;
    }
    
}