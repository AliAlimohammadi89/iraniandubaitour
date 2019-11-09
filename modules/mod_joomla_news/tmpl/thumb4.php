<?php
// no direct access
$document->addStyleSheet('modules/mod_joomla_news/assets/thumb.css');
defined( '_JEXEC' ) or die( 'Restricted access' );
?>
<?php if (!empty($list)) :?>
<?php if($description >''): ?>
<h4><?php echo $description; ?></h4>
<?php endif; ?>

<div class="newsitems4">
    <div class="items_list4 row-fluid">
	<?php foreach ($list as $item) : ?>
			<div class="span<?php echo round(12/$inpage); ?> <?php echo $animation; ?> wow">
			<div class="news4">
			<div class="itemintro span12">
			<img src="<?php echo  $item->thumb; ?>" alt="<?php echo (strip_tags (mb_substr($item->text,0,$maxcontent,'UTF-8'))); ?>" title="<?php echo (strip_tags (mb_substr($item->text,0,$maxcontent,'UTF-8'))); ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" />
			</a>
			</div>
			<div class="info">
            	<div class="small"><?php echo $item->subtitle; ?></div>
				<h4><a href="<?php echo $item->link; ?>" title="<?php echo (strip_tags (mb_substr($item->text,0,$maxcontent,'UTF-8'))); ?>"><?php echo (strip_tags (mb_substr($item->text,0,$maxcontent,'UTF-8'))); ?></a></h4>
            	<?php if($newsdate=='1'): ?>
                <small class="span12 hidden-phone"><?php echo (JHTML::_('date',$item->date,'D d M Y')) ; ?></small>
                <?php endif; ?>
             	<?php if($newshits=='1'): ?>
               <div class="hits span12 hidden-phone"><?php echo $item->hits ; ?></div>
                <?php endif; ?>
             	<?php if($newscat=='1'): ?>
               <div class="span12 hidden-phone"><?php echo $item->category ; ?></div>
                <?php endif; ?>
             	<?php if($newowner=='1'): ?>
               <div class="owner span12 hidden-phone"><?php echo $item->owner ; ?></div>
                <?php endif; ?>
            	<?php if($newlead=='1'): ?>
                <div class="desc span12"><?php echo (strip_tags (mb_substr($item->desc,0,$maxcontent,'UTF-8'))); ?>...</div>
                <?php endif; ?>
            	<?php if($newsreadon=='1'): ?>
                <div class="readon hidden-phone"><a href="<?php echo $item->link; ?>" title="<?php echo (strip_tags (mb_substr($item->text,0,$maxcontent,'UTF-8'))); ?>" class="btn"><?php echo JText::_('MOD_JOOMLA_NEWS_LABEL_READ_MORE') ?></a></div>
                <?php endif; ?>
			</div>
			</div>
			</div>
	<?php endforeach; ?>
   </div>
</div>
<?php endif; ?>
