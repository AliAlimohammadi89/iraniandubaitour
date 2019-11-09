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
			fade: true,
			arrows: true,
			buttons: false,
			fullScreen: true,
			shuffle: true,
			smallSize: 500,
			mediumSize: 1000,
			largeSize: 3000,
			thumbnailArrows: true,
			autoplay: false
		});
	});
');
$data	='0';
?>
<?php if (!empty($list)) :?>
<?php if($description >''): ?>
<h4><?php echo $description; ?></h4>
<?php endif; ?>

<div id="example<?php echo $module->id; ?>" class="slider-pro example3">
		<div class="sp-slides">
        	<?php foreach( $list as $item ): ?>
			<div class="sp-slide">
				<img class="sp-image" src="<?php echo JRoute::_(JUri::base() . 'modules/mod_joomla_news/assets/images/blank.gif', false); ?>"
					data-src="<?php if($item->photo > '0' and file_exists($item->photo)){ echo $item->photo; }else{ echo JRoute::_(JUri::base() . 'modules/mod_joomla_news/assets/images/nophoto.png', false);} ?>"
					data-retina="<?php echo $item->photo; ?>"/>
				<p class="sp-layer sp-white sp-padding" 
					data-vertical="5%" data-horizontal="5%" data-width="30%" 
					data-show-transition="down" data-show-delay="400">
                    <span><?php echo (strip_tags (mb_substr($item->text,0,$maxcontent,'UTF-8'))); ?></span>
					<?php echo (strip_tags (mb_substr($item->desc,0,$maxcontent,'UTF-8'))); ?>
				</p>
			</div>
			<?php endforeach; ?>
		</div>

		<div class="sp-thumbnails">
        	<?php foreach( $list as $item ): ?>
			<div class="sp-thumbnail">
				<div class="sp-thumbnail-image-container">
					<img class="sp-thumbnail-image" src="<?php echo $item->thumb; ?>" alt="<?php echo ($item->text);?>" title="<?php echo ($item->text);?>" />
				</div>
			</div>
			<?php endforeach; ?>
		</div>
    </div>
<?php endif; ?>
