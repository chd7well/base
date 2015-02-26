<?php

namespace chd7well\master\behaviors;
use yii\base\Behavior;


class ActivityloggerBehavior extends Behavior
{
	public function events()
	{
		return [
				ActiveRecord::EVENT_AFTER_INSERT => 'afterInsert',
		];
	}
	
	public function afterInsert($event)
	{
		echo "ActivityloggerBehavior ";
		print_r($event);
		echo "<br><br><br>";
	}
	
}