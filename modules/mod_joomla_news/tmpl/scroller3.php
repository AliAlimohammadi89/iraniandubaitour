<?php
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
$document = JFactory::getDocument();
$document->addStyleSheet('modules/mod_joomla_news/assets/scroll3.css');
$document->addScript('modules/mod_joomla_news/assets/jquery.carouFredSel-6.2.1-packed.js');
$document->addScriptDeclaration('
			jQuery(function() {
				//	Scrolled by user interaction
				jQuery(\'#foo'.$module->id.'\').carouFredSel({
					width: \''.$nwidth.'px\',
					height: \''.$nheight.'px\',
					auto: '.$fauto.',
					prev: \'#prev'.$module->id.'\',
					next: \'#next'.$module->id.'\',
					pagination: "#pager'.$module->id.'"
				});
			});
');
?>
<?php if (!empty($list)) :?>
<?php if($description >''): ?>
<h4><?php echo $description; ?></h4>
<?php endif; ?>

<div class="scroll3">
	<div class="list_carousel">
		<a id="next<?php echo $module->id ?>" class="next" href="#" style="height:<?php echo ($height+55); ?>px; text-align:center;">&gt;</a>
		<ul id="foo<?php echo $module->id ?>">
		<?php foreach ($list as $item) : ?>
			<li>
				<img src="<?php echo  $item->thumb; ?>" title="<?php echo (strip_tags (mb_substr($item->text,0,$maxcontent,'UTF-8'))); ?>" border="0" width="<?php echo $width; ?>" height="<?php echo $height; ?>"  />
			</li>
		<?php endforeach; ?>
	   </ul>
		<a id="prev<?php echo $module->id ?>" class="prev" href="#" style="height:<?php echo ($height+55); ?>px; text-align:center;">&lt;</a>
		<div class="clearfix"></div>
		<div id="pager<?php echo $module->id ?>" class="pager"></div>
	</div>
</div>
<?php endif; ?>
