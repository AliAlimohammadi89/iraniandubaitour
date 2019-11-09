<?php
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
$document = JFactory::getDocument();
$document->addStyleSheet('modules/mod_joomla_news/assets/jcarousel.responsive.css');
$document->addScript('modules/mod_joomla_news/assets/jquery.jcarousel.min.js');
$document->addScript('modules/mod_joomla_news/assets/jcarousel.responsive.js');
$document->addScriptDeclaration('

');
$data	='0';
?>
<?php if (!empty($list)) :?>
<?php if($description >''): ?>
<h4><?php echo $description; ?></h4>
<?php endif; ?>

<div class="jcarousel-wrapper">
                <div class="jcarousel">
                    <ul>
                    	<?php foreach( $list as $item ): ?>
                        <li style="max-width:<?php echo $width+29; ?>px" class="jcitem wow <?php echo $animation; ?>">
                        	<div>
                            <a href="<?php echo $item->link; ?>" title="<?php echo ($item->text);?>">
                                <img src="<?php echo $item->thumb; ?>" alt="<?php echo ($item->text);?>" title="<?php echo ($item->text);?>" style="width:<?php echo $width; ?>px; height:<?php echo $height; ?>px;" />
                                <span><?php echo ($item->text);?></span>
                            </a>
                            </div>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <a href="#" class="jcarousel-control-prev"></a>
                <a href="#" class="jcarousel-control-next"></a>
            </div>
<?php endif; ?>
