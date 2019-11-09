<?php
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
$document = JFactory::getDocument();
$document->addStyleSheet('modules/mod_joomla_news/assets/page.css');
$document->addStyleSheet('modules/mod_joomla_news/assets/animation.css');
$document->addScript('modules/mod_joomla_news/assets/highlight.pack.js');
$document->addScript('modules/mod_joomla_news/assets/tabifier.js');
$document->addScript('modules/mod_joomla_news/assets/js.js');
$document->addScript('modules/mod_joomla_news/assets/jPages.js');
if($fauto =='true'){
	$autotext='
      pause       : '.$fdoration.',
     clickStop   : '.$fauto.',
	';
}else{
	$autotext='';
}
$document->addScriptDeclaration('
  jQuery(function(){
    /* initiate plugin */
    jQuery("div.holder'.$module->id.'").jPages({
      containerID : "itemContainer'.$module->id.'",
	  '.$autotext.'
      perPage     : '.$inpage.',
      animation   : "'.$animation.'"
    });
  });
');
$clrCounter='';
?>
<?php if (!empty($list)) :?>
<?php if($description >''): ?>
<h4><?php echo $description; ?></h4>
<?php endif; ?>

<ul id="itemContainer<?php echo $module->id ?>" class="pageajax">
	<?php foreach ($list as $item) : ?>
			<li class="page_item <?php echo ($clrCounter++ % 2 == 0 ? 'row1' : 'row0'); ?>">
			<a href="<?php echo $item->link; ?>" title="<?php echo (strip_tags (mb_substr($item->text,0,$maxcontent,'UTF-8'))); ?>">
			<img src="<?php echo  $item->thumb; ?>" alt="<?php echo ($item->text); ?>" title="<?php echo ($item->text); ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>"  />
			</a>
            <div class="pagetext">
            	<div class="small"><?php echo $item->subtitle; ?></div>
                <div class="pagetitle"><a href="<?php echo $item->link; ?>" title="<?php echo (strip_tags (mb_substr($item->text,0,$maxcontent,'UTF-8'))); ?>"><?php echo (strip_tags (mb_substr($item->text,0,$maxcontent,'UTF-8'))); ?></a></div>
                <div class="pagedesc"><?php echo (strip_tags (mb_substr($item->desc,0,$maxcontent,'UTF-8'))); ?></div>
            </div>
			</li>
	<?php endforeach; ?>
   </ul>
<div class="holder<?php echo $module->id ?> pagina">
</div>
<?php endif; ?>
