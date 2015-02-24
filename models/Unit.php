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
use yii\helpers\ArrayHelper;
/**
 * This is the model class for table "{{%master_unit}}".
 *
 * @author Christian Dumhart <christian.dumhart@chd.at>
 */
class Unit extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%master_unit}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['unit'], 'required'],
            [['unit'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('master', 'ID'),
            'title' => Yii::t('master', 'Unit'),
        ];
    }

    public function getUnitList()
    {
    	$models = Unit::find()->asArray()->all();
    	return ArrayHelper::map($models, 'ID', 'unit');
    }
    
}