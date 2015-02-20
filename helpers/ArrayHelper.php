<?php

/*
 * This file is part of the chd7well project.
 *
 * (c) chd7well project <http://github.com/chd7well/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */


namespace chd7well\master\helpers;

use Yii;
use yii\base\Arrayable;
use yii\base\InvalidParamException;

class ArrayHelper {
	
	
	public static function parse_csv($csvfile,$fldnames=null,$sep=';',$protect='"',$filters=null) {
		mb_internal_encoding('UTF-8');
		    if(! $csv = file($csvfile) )
        return FALSE;

    # use the first line as fields names
    if( is_null($fldnames) ){
            $fldnames = array_shift($csv);
            $fldnames = explode($sep,$fldnames);
            $fldnames = array_map('trim',$fldnames);
            if($protect){
                foreach($fldnames as $k=>$v)
                    $fldnames[$k] = preg_replace(array("/(?<!\\\\)$protect/","!\\\\($protect)!"),'\\1',$v);
            }            
    }elseif( is_string($fldnames) ){
            $fldnames = explode($sep,$fldnames);
            $fldnames = array_map('trim',$fldnames);
    }
    
    $i=0;
    foreach($csv as $row){
            if($protect){
                $row = preg_replace(array("/(?<!\\\\)$protect/","!\\\\($protect)!"),'\\1',$row);
            }
            $row = explode($sep,trim($row));
            
            foreach($row as $fldnb=>$fldval)
                $res[$i][(isset($fldnames[$fldnb])?$fldnames[$fldnb]:$fldnb)] = $fldval;
            
            if( is_array($filters) ){
                foreach($filters as $k=>$exp){
                    if(! preg_match($exp,$res[$i][$k]) )
                        unset($res[$i]);
                }
            }
            $i++;
    }
    
    return $res; 
	}
                  
}

