<?php
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
$document = JFactory::getDocument();
$document->addStyleSheet('modules/mod_joomla_news/assets/mini.css');
?>
<?php if (!empty($list)) :?>
<?php if($description >''): ?>
<h4><?php echo $description; ?></h4>
<?php endif; ?>

<ul class="h_news_list">
	<?php foreach ($list as $item) : ?>
                        <li class=" span<?php echo round(12/$inpage); ?> <?php echo $animation; ?> wow mininews">
                                <div class="time span3">
                                	<div class="day"><?php echo (JHTML::_('date',$item->date,'d')) ; ?></div>
                                	<div class="month"><?php echo (JHTML::_('date',$item->date,'M')) ; ?></div>
                                </div>                          
                            <div class="h_news_obj span9">
                            	<div class="small"><?php echo $item->subtitle; ?></div>
                                <a href="<?php echo $item->link; ?>" class="name"><?php echo (strip_tags (mb_substr($item->text,0,$maxcontent,'UTF-8'))); ?></a>
                                <p>
									<?php echo (strip_tags (mb_substr($item->desc,0,$maxcontent,'UTF-8'))); ?>...
                                </p>
                            </div>
                        </li>
	<?php endforeach; ?>
</ul>
<?php endif; ?>
                
