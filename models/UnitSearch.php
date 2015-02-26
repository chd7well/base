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

use chd7well\master\models\Unit;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * ParameterSearch represents the model behind the search form about Parameter.
 *
 * @author Christian Dumhart <christian.dumhart@chd.at>
 */



class UnitSearch extends Unit
{
    /** @var string */
    public $unit;


    
       /** @inheritdoc */
    public function rules()
    {
        return [
            [['unit'], 'string'],
        ];
    }

    /** @inheritdoc */
    public function attributeLabels()
    {
        return [
            'unit'        => \Yii::t('master', 'Unit'),
        ];
    }

    /**
     * @param $params
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Unit::find();
		$dataProvider = new ActiveDataProvider([
		'query' => $query,
		]);
		if (!($this->load($params) && $this->validate())) {
		return $dataProvider;
		}
		$query->andFilterWhere(
		[
		'ID' => $this->ID,
		]
		);

		$query
		->andFilterWhere(['like', 'unit', $this->unit]);
		
		return $dataProvider;
    }
}
