<?php

use yii\db\Schema;
use yii\db\Migration;

class m150218_132454_init extends Migration
{
    public function up()
    {
    	$this->createTable('{{%master_unit}}', [
    			'ID'                   => Schema::TYPE_PK,
    			'unit' 	           => Schema::TYPE_STRING . '(255) NOT NULL',
    	]);
    	$this->insert('{{%master_unit}}', ['ID'=>1, 'unit'=>'Stk.']);
    	$this->insert('{{%master_unit}}',		['ID'=>2, 'unit'=>'Pkg.']);
    	$this->insert('{{%master_unit}}',		['ID'=>3, 'unit'=>'Tbl.']);
    	$this->insert('{{%master_unit}}',		['ID'=>4, 'unit'=>'Spritze']);
    	$this->insert('{{%master_unit}}',		['ID'=>5, 'unit'=>'Behandlung']);
    	$this->insert('{{%master_unit}}',		['ID'=>6, 'unit'=>'mg']);
    	$this->insert('{{%master_unit}}',		['ID'=>7, 'unit'=>'g']);
    	$this->insert('{{%master_unit}}',		['ID'=>8, 'unit'=>'ml']);
    	$this->insert('{{%master_unit}}',		['ID'=>9, 'unit'=>'l']);
    	$this->insert('{{%master_unit}}',		['ID'=>10, 'unit'=>'Einheit']);
    	$this->insert('{{%master_unit}}',		['ID'=>11, 'unit'=>'Tag']);
    	$this->insert('{{%master_unit}}',		['ID'=>12, 'unit'=>'Woche']);
    	$this->insert('{{%master_unit}}',		['ID'=>13, 'unit'=>'Monat']);
    	$this->insert('{{%master_unit}}',		['ID'=>14, 'unit'=>'Jahr']);
    	$this->insert('{{%master_unit}}',		['ID'=>15, 'unit'=>'mol']);
    	$this->insert('{{%master_unit}}',		['ID'=>16, 'unit'=>'km']);
    	$this->insert('{{%master_unit}}',		['ID'=>17, 'unit'=>'mmol']);
    	$this->insert('{{%master_unit}}',		['ID'=>18, 'unit'=>'Beutel']);
    	$this->insert('{{%master_unit}}',		['ID'=>19, 'unit'=>'Frischebeutel']);
    	$this->insert('{{%master_unit}}',		['ID'=>20, 'unit'=>'Dose']);
    	$this->insert('{{%master_unit}}',		['ID'=>21, 'unit'=>'Sack']);
    	$this->insert('{{%master_unit}}',		['ID'=>22, 'unit'=>'Snack']);
    	$this->insert('{{%master_unit}}',		['ID'=>23, 'unit'=>'Pouch']);
    	$this->insert('{{%master_unit}}',		['ID'=>24, 'unit'=>'U/l']);
    	$this->insert('{{%master_unit}}',		['ID'=>25, 'unit'=>'mg/dl']);
    	$this->insert('{{%master_unit}}',		['ID'=>26, 'unit'=>'g/dl']);
    	$this->insert('{{%master_unit}}',		['ID'=>27, 'unit'=>'Schälchen']);

    }

    public function down()
    {
 		$this->dropTable('{{%master_unit}}');
    }
}
