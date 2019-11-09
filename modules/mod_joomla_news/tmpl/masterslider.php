<?php
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
$document = JFactory::getDocument();
$document->addStyleSheet('modules/mod_joomla_news/assets/dgstyle.css');
$document->addScript('modules/mod_joomla_news/assets/modernizr.custom.53451.js');
$document->addScriptDeclaration('

');
$data	='0';
?>
<?php if (!empty($list)) :?>
<?php if($description >''): ?>
<h4><?php echo $description; ?></h4>
<?php endif; ?>

<section id="dg-container<?php echo $module->id; ?>" class="dg-container" style="height:<?php echo $height+150; ?>px">
<div class="dg-wrapper" style="height:<?php echo $height; ?>px">
	<?php foreach ($list as $item) : ?>
	<a href="<?php echo $item->link; ?>" style="height:<?php echo $height+100; ?>px">
    <img src="<?php echo $item->thumb; ?>" style="height:<?php echo $height; ?>px" alt="<?php echo $item->text; ?>" title="<?php echo $item->text; ?>">
    <div class="dginfo">
	<h4><?php echo $item->text; ?></h4>
    <div class="small"><?php echo (strip_tags (mb_substr($item->desc,0,$maxcontent,'UTF-8'))); ?></div>
    </div>
    </a>
    <?php endforeach; ?>
</div>
<nav>	
	<span class="dg-prev">&lt;</span>
	<span class="dg-next">&gt;</span>
</nav>
</section>
<script type="text/javascript" src="modules/mod_joomla_news/assets/jquery.gallery.js"></script>
<script type="text/javascript">
	jQuery(function() {
		jQuery('#dg-container<?php echo $module->id; ?>').gallery({
		current		: 0,	// index of current item
		autoplay	: <?php echo $fauto; ?>,// slideshow on / off
		interval	: <?php echo $fdoration; ?>  // time between transitions
		}
		);
	});
</script>
<?php endif; ?>
