<?php
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
$document = JFactory::getDocument();
$document->addStyleSheet('modules/mod_joomla_news/assets/scroll.css');
$document->addScript('modules/mod_joomla_news/assets/jquery.carouFredSel-6.2.1-packed.js');
$document->addScriptDeclaration('
			jQuery(function() {
				//	Scrolled by user interaction
				jQuery(\'#foo'.$module->id.'\').carouFredSel({
					width: \''.$nwidth.'px\',
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

<div class="scroll1" style="width:100%;">
	<div class="list_carousel">
		<ul id="foo<?php echo $module->id ?>">
		<?php foreach ($list as $item) : ?>
			<li style="width:<?php echo $width; ?>px; height:<?php echo $height; ?>px; text-align:center;">
				<div class="banners">
					<img src="<?php echo  $item->thumb; ?>" title="<?php echo (strip_tags (mb_substr($item->text,0,$maxcontent,'UTF-8'))); ?>" border="0" width="<?php echo $width; ?>" height="<?php echo $width; ?>" style="width:<?php echo $width; ?>px; height:<?php echo $height; ?>px;" />
                    </a>
				</div>
			</li>
		<?php endforeach; ?>
	   </ul>
	</div>
</div>
<?php endif; ?>
