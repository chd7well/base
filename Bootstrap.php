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

	public $enable_logging = true;
	
    public function bootstrap($app)
    {
        $this->addActivityLogger();
    }
    
    

    
    protected function addActivityLogger()
    {
    	if($this->enable_logging)
    	{
    		Event::on(ActiveRecord::className(), ActiveRecord::EVENT_AFTER_FIND, ['chd7well\master\Module', 'activityLogger']);
    		Event::on(ActiveRecord::className(), ActiveRecord::EVENT_AFTER_INSERT, ['chd7well\master\Module', 'activityLogger']);
    		Event::on(ActiveRecord::className(), ActiveRecord::EVENT_AFTER_UPDATE, ['chd7well\master\Module', 'activityLogger']);
    		Event::on(ActiveRecord::className(), ActiveRecord::EVENT_AFTER_DELETE, ['chd7well\master\Module', 'activityLogger']);
    	}
    }
}
