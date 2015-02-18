<?php 

/*
 * This file is part of the 7well project.
 *
 * (c) chd7well project <http://github.com/chd7well/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace chd7well\master;

// Other namespaces from previous code

use yii\base\BootstrapInterface;
use yii\base\Event;
use yii\db\ActiveRecord;

class Bootstrap implements BootstrapInterface
{
	public $activity_table = 'master_model_activity';
	
    public function bootstrap($app)
    {
        $this->addActivityLogger();
    }
    
    
    public function activityLogger($event)
    {
    	\Yii::$app->db->createCommand('INSERT INTO ' . 
    								   $this->activity_table .
    								'(`modelname`, `event`, `modelID`, `userID`, `timestamp`) VALUES (' .
    								'\'' . addslashes ( $event->sender->className()) . '\',' .
    								'\'' . $event->name . '\',' .
    								'\'' . $event->sender->__get('ID') . '\',' .
    								'\'' . \Yii::$app->user->identity->ID . '\',' .
    								'NOW());'
    			)->query();
    }
    
    protected function addActivityLogger()
    {
    	Event::on(ActiveRecord::className(), ActiveRecord::EVENT_AFTER_FIND, [$this, 'activityLogger']);
    	Event::on(ActiveRecord::className(), ActiveRecord::EVENT_AFTER_INSERT, [$this, 'activityLogger']);
    	Event::on(ActiveRecord::className(), ActiveRecord::EVENT_AFTER_UPDATE, [$this, 'activityLogger']);
    	Event::on(ActiveRecord::className(), ActiveRecord::EVENT_AFTER_DELETE, [$this, 'activityLogger']);
    }
}
