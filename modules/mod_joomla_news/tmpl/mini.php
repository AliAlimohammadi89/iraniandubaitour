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

<div class="news_mini">
    <div class="mini_list">
	<?php foreach ($list as $item) : ?>
		<div class="mini  span<?php echo round(12/$inpage); ?> <?php echo $animation; ?> wow">
        <a href="<?php echo $item->link; ?>" class="title">
            <img src="<?php echo  $item->thumb; ?>" title="<?php echo (strip_tags (mb_substr($item->text,0,$maxcontent,'UTF-8'))); ?>" border="0" width="<?php echo $width; ?>" height="<?php echo $width; ?>" />
            <div class="rate<?php echo $item->rating; ?>"></div>
            <div class="small"><?php echo $item->subtitle; ?></div>
			<h4><?php echo (strip_tags (mb_substr($item->text,0,$maxcontent,'UTF-8'))); ?></h4>
            	<?php if($newlead=='1'): ?>
                <div class="desc span12"><?php echo (strip_tags (mb_substr($item->desc,0,$maxcontent,'UTF-8'))); ?>...</div>
                <?php endif; ?>
        </a>
		</div>
	<?php endforeach; ?>
   </div>
</div>
<?php endif; ?>
