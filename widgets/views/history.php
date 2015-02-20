<?php

/*
 * This file is part of the 7well project.
 *
 * (c) 7well project <http://github.com/chd7well>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

use yii\widgets\ActiveForm;
use yii\helpers\Html;

/**
 * @var yii\web\View $this
 */
?>


<!-- History box -->
<div class="box box-success">
<div class="box-header">
<i class="fa fa-history"></i>
<h3 class="box-title"><?= Html::encode(Yii::t('master', 'History')) ?></h3>

                                </div>
                                <div class="box-body chat" id="chat-box">
                                <?php 
                                foreach($history as $item)
                                {
                                	?>
                                	
                                    <!-- history item -->
                                    <div class="item">
                                        <img src="img/avatar.png" alt="user image" class="online"/>
                                        <p class="message">
                                            <a href="#" class="name">
                                                <small class="text-muted pull-right"><i class="fa fa-pencil"></i><?=" " . $item->actionname?> <i class="fa fa-clock-o"></i><?=" " . $item->timestamp?></small>
                                                <?=$item->user->username?> 
                                            </a>
                                            <?=$item->comment?>
                                        </p>
                                    </div><!-- /.item -->
                                    <!-- history item -->
                                	<?php 
                                }
                                ?>
                              
                                
                            </div><!-- /.box (history box) -->
                            