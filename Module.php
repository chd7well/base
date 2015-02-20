<?php

namespace chd7well\master;

class Module extends \yii\base\Module
{

	/** @var array Model map */
	public $modelMap = [];
	
	public $activity_table = 'master_model_activity';
	public $activity_logging_enable = true;
		
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
    
    public function activityLogger($event)
    {
    	$mymod = \Yii::$app->getModule('master');
    	if($mymod->activity_logging_enable){
    		$userid = 0;
    		if(isset(\Yii::$app->user->identity->ID))
    		{
    			$userid = \Yii::$app->user->identity->ID;
    		}
    	\Yii::$app->db->createCommand('INSERT INTO ' .
    			$mymod->activity_table .
    			'(`modelname`, `event`, `model_ID`, `user_ID`, `timestamp`) VALUES (' .
    			'\'' . addslashes ( $event->sender->className()) . '\',' .
    			'\'' . $event->name . '\',' .
    			'\'' . $event->sender->__get('ID') . '\',' .
    			'\'' . $userid . '\',' .
    			'NOW());'
    	)->query();
    	}
    }
    
    public function enableActivityLogging()
    {
    	$this->activity_logging_enable = true;
    }

    public function disableActivityLogging()
    {
    	$this->activity_logging_enable = false;
    }
    
    /**
     * @var string The prefix for user module URL.
     * @See [[GroupUrlRule::prefix]]
     */
    public $urlPrefix = 'master';
    

}
