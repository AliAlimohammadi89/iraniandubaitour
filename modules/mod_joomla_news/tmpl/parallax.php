<?php
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
$document = JFactory::getDocument();
$document->addStyleSheet('modules/mod_joomla_news/assets/mrjared-styles.css');
$document->addScript('modules/mod_joomla_news/assets/jquery.easing.1.3.js');
$document->addScript('modules/mod_joomla_news/assets/jquery.mrjared.parallax.slide.js');
$document->addScriptDeclaration('
');
?>
<?php if (!empty($list)) :?>
<?php if($description >''): ?>
<h4><?php echo $description; ?></h4>
<?php endif; ?>

        <section id="mrjared-slider<?php echo $module->id; ?>" class="mrjared-slider">
        <div class="pages">
        <?php foreach ($list as $item) : ?>
            <div class="page">
				<img src="<?php echo $item->photo; ?>" class="image-page" alt="<?php echo ($item->text); ?>" title="<?php echo ($item->text); ?>"  />
            <div class="text-page">
                <div class="divnimate">
                    <h4><?php echo ($item->text); ?></h4>
					<div class="divtext"><?php echo (strip_tags (mb_substr($item->desc,0,$maxcontent,'UTF-8'))); ?></div>
                </div>
            </div>
            </div>
        <?php endforeach; ?>
        </div>
        <ul class="arrows">
        <li><a class="arrow-left" href="#"></a></li>
        <li><a class="arrow-right" href="#"></a></li>
        </ul>
        </section>
<script>
// Scripts
jQuery(document).on('ready',function(e){
		jQuery('#mrjared-slider<?php echo $module->id; ?>').MrJaredParallaxSlide();					
	});
</script>
<?php endif; ?>
