<?php

namespace chd7well\master\models;

use Yii;
use chd7well\master\helpers\ReplacePattern;

/**
 * This is the model class for table "{{%master_ron}}".
 *
 * @property integer $ID
 * @property string $ronname
 * @property integer $startvalue
 * @property integer $nextvalue
 * @property integer $incvalue
 * @property string $pattern
 */
class Ron extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%master_ron}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ronname', 'pattern'], 'required'],
            [['startvalue', 'nextvalue', 'incvalue'], 'integer'],
            [['ronname', 'pattern'], 'string', 'max' => 255],
            [['ronname'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('master', 'ID'),
            'ronname' => Yii::t('master', 'Range of number name'),
            'startvalue' => Yii::t('master', 'Start value'),
            'nextvalue' => Yii::t('master', 'Next value'),
        	'incvalue' => Yii::t('master', 'Incrementation interval'),
            'pattern' => Yii::t('master', 'Pattern'),
        ];
    }
    
    public static function getNextValue($ronname)
    {
    	$model = Ron::findOne(['ronname'=>$ronname]);
    	$value = ReplacePattern::replaceDefaults($model->pattern, $model->nextvalue);
    	return $value;
    }
    
    public static function getAndIncValue($ronname)
    {
    	$model = Ron::findOne(['ronname'=>$ronname]);
    	$value = ReplacePattern::replaceDefaults($model->pattern, $model->nextvalue);
    	$model->nextvalue += $model->incvalue;
    	$model->update(['nextvalue']);
    	return $value;
    }
}
