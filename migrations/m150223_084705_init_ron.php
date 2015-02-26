<?php

use yii\db\Schema;
use yii\db\Migration;

class m150223_084705_init_ron extends Migration
{
    public function up()
    {
    	$this->createTable('{{%master_ron}}', [
    			'ID'                   => Schema::TYPE_PK,
    			'ronname' 	       => Schema::TYPE_STRING . '(255) NOT NULL UNIQUE',
    			'startvalue' => Schema::TYPE_INTEGER,
    			'nextvalue' => Schema::TYPE_INTEGER,
    			'incvalue' => Schema::TYPE_INTEGER,
    			'pattern' => Schema::TYPE_STRING . '(255) NOT NULL',
    	]);
    }

    public function down()
    {
		$this->dropTable('{{%master_ron}}'); 
    }
}
