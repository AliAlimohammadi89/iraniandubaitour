<?php
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
$document = JFactory::getDocument();
$document->addStyleSheet('modules/mod_joomla_news/assets/themes/default/default.css');
$document->addStyleSheet('modules/mod_joomla_news/assets/nivo-slider_org.css');
$document->addScript('modules/mod_joomla_news/assets/jquery.nivo.slider.js');
$document->addScriptDeclaration('
    jQuery(window).load(function() {
        jQuery(\'#slider'.$module->id.'\').nivoSlider({
        directionNav: true,
        controlNav: true,
        controlNavThumbs: true,
        pauseOnHover: true,
        manualAdvance: false,
        prevText: \'Prev\',
        nextText: \'Next\',
        randomStart: true,
		});
    });
');
?>
<?php if (!empty($list)) :?>
<?php if($description >''): ?>
<h4><?php echo $description; ?></h4>
<?php endif; ?>

        <div class="slider-wrapper theme-default">
            <div id="slider<?php echo $module->id; ?>" class="nivoSlider" style="max-height:<?php echo $nheight; ?>px">
				<?php foreach ($list as $item) : ?>
                <a href="<?php echo $item->link; ?>" title="<?php echo (strip_tags (mb_substr($item->text,0,$maxcontent,'UTF-8'))); ?>">
				<img src="<?php echo $item->photo; ?>" data-thumb="<?php echo $item->thumb; ?>" alt="<?php echo ($item->text); ?>" title="<?php echo ($item->text); ?>"  />
				</a>
				<?php endforeach; ?>
            </div>
        </div>
<?php endif; ?>
