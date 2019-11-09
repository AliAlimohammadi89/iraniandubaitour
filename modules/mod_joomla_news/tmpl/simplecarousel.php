<?php
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
$document = JFactory::getDocument();
$document->addStyleSheet('modules/mod_joomla_news/assets/sliding-carousel.css');
$document->addScript('modules/mod_joomla_news/assets/jquery-slidingCarousel.js');
$document->addScriptDeclaration('
		jQuery(document).ready(function() {
			var carousel = jQuery("#carousel'.$module->id.'").slidingCarousel({
				squeeze: 100
			});
		});
');
?>
<?php if (!empty($list)) :?>
<?php if($description >''): ?>
<h4><?php echo $description; ?></h4>
<?php endif; ?>

<div id="carousel<?php echo $module->id ?>" class="simplecarousel" style="height:<?php echo $height+50; ?>px;">
			<?php foreach ($list as $item) : ?>
			<div class="slide">
				<p>
					<a href="#">
					<img src="<?php echo  $item->thumb; ?>" title="<?php echo (strip_tags (mb_substr($item->text,0,$maxcontent,'UTF-8'))); ?>" border="0" width="<?php echo $width; ?>" height="<?php echo $width; ?>" style="width:<?php echo $width; ?>px; height:<?php echo $height; ?>px;" />
                    </a>
					<span><?php echo (strip_tags (mb_substr($item->text,0,$maxcontent,'UTF-8'))); ?></span>
				</p>
			</div>
			<?php endforeach; ?>	
			<div class="navigate-left"><img src="modules/mod_joomla_news/assets/images/arrow-left.png" /></div>
			<div class="navigate-right"><img src="modules/mod_joomla_news/assets/images/arrow-right.png" /></div>
		</div>
<?php endif; ?>
