<?php
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
$document = JFactory::getDocument();
$document->addStyleSheet('modules/mod_joomla_news/assets/raccordion2.css');
$document->addScriptDeclaration('
');
$data	='0';
?>
<?php if (!empty($list)) :?>
<?php if($description >''): ?>
<h4><?php echo $description; ?></h4>
<?php endif; ?>


<div class="containers">
    <div class="row">
        <div class="col-md-6">
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                <?php foreach( $list as $item ): ?>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="heading<?php echo $item->id; ?>">
                        <h4 class="panel-title">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $item->id; ?>" aria-expanded="false" aria-controls="collapse<?php echo $item->id; ?>">
                                <?php echo ($item->text);?>
                            </a>
                        </h4>
                    </div>
                    <div id="collapse<?php echo $item->id; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?php echo $item->id; ?>">
                        <div class="panel-body">
                        	<a href="<?php echo $item->link;?>" title="<?php echo ($item->text);?>">
                       		<img src="<?php echo $item->thumb; ?>" alt="<?php echo ($item->text);?>" title="<?php echo ($item->text);?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" />
                            <p><?php echo (strip_tags (mb_substr($item->desc,0,$maxcontent,'UTF-8'))); ?></p>
                            </a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>
