<?php

use yii\db\Schema;
use yii\db\Migration;

class m150218_153204_unit_menu extends Migration
{
    public function up()
    {
    	$this->insert('{{%sys_menu}}', [
    			'ID'=>9000,
    			'label'=>'Master Data', 
    			'url'=>'#', 
    			'weight'=>9000, 
    			'type_ID'=>1,
    			'uniquename'=>'chd7well\master',
    			'entryoptions'=>"['tag'=>'span', 'content'=>'', 'options'=>[]]",
    			'beforelabel'=>"['tag'=>'i', 'content'=>'', 'options'=>['class'=>'fa fa-tags']]",
    	]);
    	$this->insert('{{%sys_menu}}', [
    			'ID'=>9030,
    			'parent_ID'=>9000,
    			'label'=>'Units', 
    			'url'=>'master/unit/index', 
    			'weight'=>9030, 
    			'type_ID'=>1,
    			'uniquename'=>'chd7well\master\unit\index',
    			'beforelabel'=>"['tag'=>'i', 'content'=>'', 'options'=>['class'=>'fa  fa-angle-double-right']]",
    	]);
    }
 
    public function down()
    {
        echo "m150218_153204_unit_menu cannot be reverted.\n";

        return false;
    }
}
