<?php

/*
 * This file is part of the 7well project.
 *
 * (c) 7well project <http://github.com/chd7well/> by CHD Electronic Engineering
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */


namespace chd7well\master\helpers;

use Yii;
use yii\base\Arrayable;
use yii\base\InvalidParamException;

class ReplacePattern {
	
	public static function replaceDefaults($item, $value)
	{
		$year = date('Y');
		$month = date('m');
		$day = date('d');
		$itemstring = $item;
		$itemstring = ReplacePattern::replacePattern($itemstring, '%Value%', $value);
		$itemstring = ReplacePattern::replacePattern($itemstring, '%Year%', $year);
		$itemstring = ReplacePattern::replacePattern($itemstring, '%Month%', $month);
		$itemstring = ReplacePattern::replacePattern($itemstring, '%Day%', $day);
		return $itemstring;
	}
	
	public static function replacePattern($item, $pattern, $replacevalue)
	{
		return str_replace($pattern, $replacevalue, $item);
	}
                  
}

