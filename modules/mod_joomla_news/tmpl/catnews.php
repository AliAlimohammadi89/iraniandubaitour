<?php
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
$document = JFactory::getDocument();
$document->addStyleSheet('modules/mod_joomla_news/assets/catnews.css');
	$i = 0;
	$clrCounter='';
?>
<?php if (!empty($list)) :?>
<?php if($description >''): ?>
<h4><?php echo $description; ?></h4>
<?php endif; ?>

<div class="catnews row-fluid">
    <div class="items_list span7">
        <?php foreach ($list as $item) : ?>
         <?php if(++$i > $inpage) break; ?>
                <div class="cat_item row-fluid  wow <?php echo $animation; ?>">
                		<div class="image span2">
                        <a href="<?php echo $item->link; ?>" title="<?php echo (strip_tags (mb_substr($item->text,0,$maxcontent,'UTF-8'))); ?>">
                        <img src="<?php echo  $item->thumb; ?>" alt="<?php echo (strip_tags (mb_substr($item->text,0,$maxcontent,'UTF-8'))); ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>"  title="<?php echo (strip_tags (mb_substr($item->text,0,$maxcontent,'UTF-8'))); ?>" />
                        </a>
                        </div>
                    	<div class="itemintro span10">
							<?php if($item->subtitle >'0'): ?>
                            <div class="small"><?php echo $item->subtitle; ?></div>
                            <?php endif; ?>
                            <h4><a href="<?php echo $item->link; ?>" title="<?php echo (strip_tags (mb_substr($item->text,0,$maxcontent,'UTF-8'))); ?>"><?php echo (strip_tags (mb_substr($item->text,0,$maxcontent,'UTF-8'))); ?><?php if($newscat=='1'): ?> <small>(<?php echo $item->category ; ?>)</small><?php endif; ?></a></h4>
                            <?php if($newsdate=='1'): ?>
                            <div class="date span5 hidden-phone"><?php echo (JHTML::_('date',$item->date,'D d M Y')) ; ?></div>
                            <div class="time span3 hidden-phone"><?php echo (JHTML::_('date',$item->date,'H:i')) ; ?></div>
                            <?php endif; ?>
                            <?php if($newshits=='1'): ?>
                           <div class="hits span2 hidden-phone"><?php echo $item->hits ; ?></div>
                            <?php endif; ?>
                            <?php if($newowner=='1'): ?>
                           <div class="owner span2 hidden-phone"><?php echo $item->owner ; ?></div>
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
    <ul class="othernews span5">
	<?php $dd = ''; ?>
	<?php foreach ($list as $item) : ?>
	 	<?php 
			$dd = $dd+1;
			if($dd >$inpage-1){
		 ?>
			<li class="wow <?php echo $animation; ?>" <?php echo ($clrCounter++ % 2 == 0 ? 'class="row1"' : 'class="row0"'); ?>><a href="<?php echo $item->link; ?>" title="<?php echo (strip_tags (mb_substr($item->text,0,$maxcontent,'UTF-8'))); ?>"><?php echo (strip_tags (mb_substr($item->text,0,$maxcontent,'UTF-8'))); ?></a><?php if($newsdate=='1'): ?><small class="hidden-phone"><?php echo (JHTML::_('date',$item->date)) ; ?></small><?php endif; ?></li>
	<?php }
	endforeach; ?>
    </ul>
</div>
<?php endif; ?>
