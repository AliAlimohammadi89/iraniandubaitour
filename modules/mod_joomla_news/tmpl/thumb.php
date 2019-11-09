<?php
// no direct access
$document->addStyleSheet('modules/mod_joomla_news/assets/thumb.css');
defined( '_JEXEC' ) or die( 'Restricted access' );
?>
<?php if (!empty($list)) :?>
<?php if($description >''): ?>
<h4><?php echo $description; ?></h4>
<?php endif; ?>

<div class="newsitems">
    <div class="items_list row-fluid">
	<?php foreach ($list as $item) : ?>
			<div class="news span<?php echo round(12/$inpage); ?> wow <?php echo $animation; ?>">
            <?php if($item->subtitle >'0'): ?>
			<div class="small"><?php echo $item->subtitle; ?></div>
            <?php endif; ?>
			<h4><a href="<?php echo $item->link; ?>" title="<?php echo (strip_tags (mb_substr($item->text,0,$maxcontent,'UTF-8'))); ?>"><?php echo (strip_tags (mb_substr($item->text,0,$maxcontent,'UTF-8'))); ?><?php if($newscat=='1'): ?> <small>(<?php echo $item->category ; ?>)</small><?php endif; ?></a></h4>
			<div class="itemintro span5">
			<a href="<?php echo $item->link; ?>" title="<?php echo (strip_tags (mb_substr($item->text,0,$maxcontent,'UTF-8'))); ?>">
			<img src="<?php echo  $item->thumb; ?>" alt="<?php echo (strip_tags (mb_substr($item->text,0,$maxcontent,'UTF-8'))); ?>" title="<?php echo (strip_tags (mb_substr($item->text,0,$maxcontent,'UTF-8'))); ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" />
			</a>
			</div>
            <div class="span7">
            	<?php if($newsdate=='1'): ?>
                <div class="date span6 hidden-phone"><?php echo (JHTML::_('date',$item->date,'D d M Y')) ; ?></div>
                <div class="time span3 hidden-phone"><?php echo (JHTML::_('date',$item->date,'H:i')) ; ?></div>
                <?php endif; ?>
             	<?php if($newshits=='1'): ?>
               <div class="hits span3 hidden-phone"><?php echo $item->hits ; ?></div>
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
	<?php endforeach; ?>
   </div>
</div>
<?php endif; ?>
