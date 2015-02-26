<?php

use yii\db\Schema;
use yii\db\Migration;

class m150218_194317_activitylogger extends Migration
{
    public function up()
    {
    	$this->createTable('{{%master_model_activity}}', [
    			'ID'                   => Schema::TYPE_PK,
    			'modelname' 	       => Schema::TYPE_STRING . '(255) NOT NULL',
    			'event' 	           => Schema::TYPE_STRING . '(255) NOT NULL',
    			'modelID'				=> Schema::TYPE_INTEGER,
    			'userID'				=> Schema::TYPE_INTEGER,
    			'timestamp'				=> Schema::TYPE_DATETIME,
    	]);
    }

    public function down()
    {
       $this->dropTable('{{%master_model_activity}}');
    }
}
