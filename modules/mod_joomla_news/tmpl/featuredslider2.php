<?php
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
$document = JFactory::getDocument();
$document->addScript('modules/mod_joomla_news/assets/desSlideshow.js');
$document->addScriptDeclaration('
    jQuery(function() {
        jQuery("#desSlideshow1").desSlideshow({
            autoplay: \'enable\',//option:enable,disable
            slideshow_width: \''.$nwidth.'\',//slideshow window width
            slideshow_height: \''.$nheight.'\',//slideshow window height
            thumbnail_width: \'200\',//thumbnail width
            time_Interval: \'4000\',//Milliseconds
            directory: \'images/\'// flash-on.gif and flashtext-bg.jpg directory
        });
    });
');
?>
<?php if (!empty($list)) :?>
<div id="desSlideshow1" class="desSlideshow">
	<div class="switchBigPic">
		<?php foreach( $list as $no => $item ): ?>
		<div>
            <a title="" href="#">
				<img src="<?php echo $item->photo; ?>" alt="<?php echo ($item->text);?>" title="<?php echo ($item->text);?>" width="100%" height="<?php echo $nheight; ?>" />
			</a>
             
        </div>
	    <?php endforeach; ?>
  </div>

</div>
<?php endif; ?>
