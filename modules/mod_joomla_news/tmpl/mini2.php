<?php
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
?>
<?php if (!empty($list)) :?>
<?php if($description >''): ?>
<h4><?php echo $description; ?></h4>
<?php endif; ?>

<ul class="h_news_list">
	<?php foreach ($list as $item) : ?>
                        <li class=" span<?php echo round(12/$inpage); ?> <?php echo $animation; ?> wow">
                            <div class="h_news_obj">
                            	<div class="small"><?php echo $item->subtitle; ?></div>
                                <a href="<?php echo $item->link; ?>" class="name"><?php echo (strip_tags (mb_substr($item->text,0,$maxcontent,'UTF-8'))); ?></a>
                                <p>
									<?php echo (strip_tags (mb_substr($item->desc,0,$maxcontent,'UTF-8'))); ?>
                                </p>
                                <span class="time"><?php echo (JHTML::_('date',$item->date)) ; ?></span>
                            </div>
                        </li>
	<?php endforeach; ?>
</ul>
<?php endif; ?>
                
