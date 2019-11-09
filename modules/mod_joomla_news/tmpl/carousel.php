<?php
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
$document = JFactory::getDocument();
$document->addStyleSheet('modules/mod_joomla_news/assets/carousel.css');
$document->addScript('modules/mod_joomla_news/assets/jquery.waterwheelCarousel.js');
$document->addScriptDeclaration('

');
?>
<?php if (!empty($list)) :?>
<?php if($description >''): ?>
<h4><?php echo $description; ?></h4>
<?php endif; ?>

<div id="carousel<?php echo $module->id; ?>" class="carousel" style="height:<?php echo $height+150; ?>px">
	<?php foreach ($list as $item) : ?>
      <a href="<?php echo $item->link; ?>" title="<?php echo (strip_tags (mb_substr($item->text,0,$maxcontent,'UTF-8'))); ?>">
		<img src="<?php echo  $item->thumb; ?>" title="<?php echo (strip_tags (mb_substr($item->text,0,$maxcontent,'UTF-8'))); ?>" border="0" width="<?php echo $width; ?>" height="<?php echo $width; ?>" style="width:<?php echo $width; ?>px; height:<?php echo $height; ?>px;" />
      </a>
    <?php endforeach; ?>  
</div>
<script type="text/javascript">
      jQuery(document).ready(function () {
        var carousel = jQuery("#carousel<?php echo $module->id; ?>").waterwheelCarousel({
			autoPlay:                   <?php echo $fdoration; ?>,                 // indicate the speed in milliseconds to wait before autorotating. 0 to turn off. Can be negative
			orientation:                'horizontal',      // indicate if the carousel should be 'horizontal' or 'vertical'
			});
      });
</script>
<?php endif; ?>
