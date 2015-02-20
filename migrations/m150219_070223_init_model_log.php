<?php

use yii\db\Schema;
use yii\db\Migration;

class m150219_070223_init_model_log extends Migration
{
    public function up()
    {
    	$this->createTable('{{%master_modelname}}', [
    			'ID'                   => Schema::TYPE_PK,
    			'modelname' 	       => Schema::TYPE_STRING . '(255) NOT NULL',
    	]);
    	$this->createTable('{{%master_model_log}}', [
    			'ID'                   => Schema::TYPE_PK,
    			'modelname_ID' 	       => Schema::TYPE_INTEGER . ' NOT NULL',
    			'model_ID'				=> Schema::TYPE_INTEGER,
    			'user_ID'				=> Schema::TYPE_INTEGER,
    			'action'				=> Schema::TYPE_INTEGER,
    			'timestamp'				=> Schema::TYPE_DATETIME,
    			'comment' 	           => Schema::TYPE_STRING . '(255) NOT NULL',
    	]);
    	$this->addForeignKey('fk_master_model_log_modelname', '{{%master_model_log}}', 'modelname_ID', '{{%master_modelname}}', 'ID', 'CASCADE');
    	$this->addForeignKey('fk_master_model_log_sys_user', '{{%master_model_log}}', 'user_ID', '{{%sys_user}}', 'ID', 'CASCADE');
    	$this->renameColumn('{{%master_model_activity}}', 'userID', 'user_ID');
    	$this->renameColumn('{{%master_model_activity}}', 'modelID', 'model_ID');
    }

    public function down()
    {
       $this->dropTable('{{%master_model_log}}');
       $this->dropTable('{{%master_model}}'); 
    }
}
