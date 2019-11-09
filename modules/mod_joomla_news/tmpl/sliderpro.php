<?php
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
$document = JFactory::getDocument();
$document->addStyleSheet('modules/mod_joomla_news/assets/slider-pro.css');
$document->addStyleSheet('modules/mod_joomla_news/assets/examples.css');
$document->addScript('modules/mod_joomla_news/assets/jquery.sliderPro.min.js');
$document->addScriptDeclaration('
	jQuery( document ).ready(function( $ ) {
		jQuery( \'#example'.$module->id.'\' ).sliderPro({
			width: 960,
			height: 500,
			arrows: true,
			buttons: false,
			waitForLayers: true,
			thumbnailWidth: 200,
			thumbnailHeight: 100,
			thumbnailPointer: true,
			autoplay: false,
			autoScaleLayers: false,
			breakpoints: {
				500: {
					thumbnailWidth: 120,
					thumbnailHeight: 50
				}
			}
		});
	});
');
$data	='0';
?>
<?php if (!empty($list)) :?>
<?php if($description >''): ?>
<h4><?php echo $description; ?></h4>
<?php endif; ?>

<div id="example<?php echo $module->id; ?>" class="slider-pro example1">
		<div class="sp-slides">
        	<?php foreach( $list as $item ): ?>
			<div class="sp-slide">
				<img class="sp-image" src="<?php echo JRoute::_(JUri::base() . 'modules/mod_joomla_news/assets/images/blank.gif', false); ?>"
					data-src="<?php echo $item->photo; ?>"
					data-retina="<?php echo $item->photo; ?>"/>
			</div>
			<?php endforeach; ?>
		</div>

		<div class="sp-thumbnails">
        	<?php foreach( $list as $item ): ?>
			<div class="sp-thumbnail">
				<div class="sp-thumbnail-title"><?php echo (strip_tags (mb_substr($item->text,0,$maxcontent,'UTF-8'))); ?></div>
				<div class="sp-thumbnail-description"><?php echo (strip_tags (mb_substr($item->desc,0,$maxcontent,'UTF-8'))); ?></div>
			</div>
			<?php endforeach; ?>
		</div>
    </div>
<?php endif; ?>
