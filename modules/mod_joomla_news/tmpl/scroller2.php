<?php
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
$document = JFactory::getDocument();
$document->addStyleSheet('modules/mod_joomla_news/assets/scroll2.css');
$document->addScript('modules/mod_joomla_news/assets/jquery.carouFredSel-6.2.1-packed.js');
$document->addScriptDeclaration('
			jQuery(function() {
				//	Scrolled by user interaction
				jQuery(\'#foo'.$module->id.'\').carouFredSel({
					width: \''.$nwidth.'\',
					height: \''.$nheight.'px\',
					auto: '.$fauto.',
					prev: \'#prev'.$module->id.'\',
					next: \'#next'.$module->id.'\',
				});
			});
');
?>
<?php if (!empty($list)) :?>
<?php if($description >''): ?>
<h4><?php echo $description; ?></h4>
<?php endif; ?>

<div class="scroll2">
	<div class="list_carousel">
		<a id="next<?php echo $module->id ?>" class="next" href="#" style="height:<?php echo ($height+55); ?>px; text-align:center;">&gt;</a>
		<ul id="foo<?php echo $module->id ?>">
		<?php foreach ($list as $item) : ?>
			<li style="width:<?php echo ($width); ?>px; height:<?php echo ($height+40); ?>px; text-align:center;">
				<div class="banner">
					<img src="<?php echo  $item->thumb; ?>" title="<?php echo (strip_tags (mb_substr($item->text,0,$maxcontent,'UTF-8'))); ?>" border="0" width="<?php echo $width; ?>" height="<?php echo $width; ?>" style="width:<?php echo $width; ?>px; height:<?php echo $height; ?>px;" />
					<div class="title"><a href="<?php echo $item->link; ?>" title="<?php echo (strip_tags (mb_substr($item->text,0,$maxcontent,'UTF-8'))); ?>"><?php echo (strip_tags (mb_substr($item->text,0,$maxcontent,'UTF-8'))); ?></a></div>
				</div>
			</li>
		<?php endforeach; ?>
	   </ul>
		<a id="prev<?php echo $module->id ?>" class="prev" href="#" style="height:<?php echo ($height+55); ?>px; text-align:center;">&lt;</a>
	</div>
</div>
<?php endif; ?>
