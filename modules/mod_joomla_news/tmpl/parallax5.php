<?php
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
$document = JFactory::getDocument();
$document->addStyleSheet('modules/mod_joomla_news/assets/cslsider5.css');
$document->addScript('modules/mod_joomla_news/assets/modernizr.custom.28468.js');
$document->addScript('modules/mod_joomla_news/assets/jquery.cslider.js');
$document->addScriptDeclaration('
');
?>
<?php if (!empty($list)) :?>
<?php if($description >''): ?>
<h4><?php echo $description; ?></h4>
<?php endif; ?>

        
<div id="da-slider" class="da-slider" style="height:<?php echo $height; ?>px;">
	<?php foreach ($list as $item) : ?>
    <div class="da-slide">
        <p>
		<?php echo (strip_tags (mb_substr($item->desc,0,$maxcontent,'UTF-8'),'<img>')); ?><br/>
            	<?php if($newsreadon=='1'): ?>
                <a class="btn" href="<?php echo $item->link; ?>"><?php echo JText::_('MOD_JOOMLA_NEWS_LABEL_READ_MORE') ?></a>
                <?php endif; ?>
        </p>
        <div class="da-img">
                    <img src="<?php echo $item->photo; ?>" class="image-page" alt="<?php echo ($item->text); ?>" title="<?php echo ($item->text); ?>"  />
        </div>
    </div>
    <?php endforeach; ?>
	<nav class="da-arrows">
		<span class="da-arrows-prev icon-left-open-big hidden-phone"></span>
		<span class="da-arrows-next icon-right-open-big hidden-phone"></span>
	</nav>
</div>		
<script>
jQuery(function() {

	jQuery('#da-slider').cslider({
		autoplay	: false,
		bgincrement	: 0
	});

});
</script>
<?php endif; ?>
