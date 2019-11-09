<?php
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
$document = JFactory::getDocument();
$document->addStyleSheet('modules/mod_joomla_news/assets/raccordion.css');
$document->addScript('modules/mod_joomla_news/assets/jquery.raccordion.js');
$document->addScript('modules/mod_joomla_news/assets/jquery.animation.easing.js');
$document->addScriptDeclaration('
        jQuery(window).load(function () {
            jQuery(\'#accordion-wrapper\').raccordion({
                speed: '.$fdoration.',
                sliderWidth: '.$nwidth.',
                sliderHeight: '.$nheight.',
                autoCollapse: '.$fauto.'
            });

        }); 
');
$data	='0';
?>
<?php if (!empty($list)) :?>
<?php if($description >''): ?>
<h4><?php echo $description; ?></h4>
<?php endif; ?>
<div class="accordion">
    <div id="accordion-wrapper">
                <?php foreach( $list as $item ): ?>
                <div class="slide">
						<img src="<?php echo  $item->photo; ?>" alt="<?php echo ($item->text);?>" title="<?php echo ($item->text);?>" width="<?php echo $nwidth; ?>" height="<?php echo $nheight; ?>" style="min-height:<?php echo $nheight; ?>px;" />                    <div class="caption">
                        <a href="#">
                            <h1><?php echo ($item->text);?></h1>
                        </a>                        <p><?php echo (strip_tags (mb_substr($item->desc,0,$maxcontent,'UTF-8'))); ?></p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
</div>
<?php endif; ?>
