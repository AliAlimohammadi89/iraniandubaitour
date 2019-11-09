<?php
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
$document = JFactory::getDocument();
$document->addStyleSheet('modules/mod_joomla_news/assets/jcarousel.vertical.css');
$document->addScript('modules/mod_joomla_news/assets/jquery.jcarousel.min.js');
$document->addScript('modules/mod_joomla_news/assets/jcarousel.vertical.js');
$document->addScriptDeclaration('

');
$data	='0';
?>
<?php if (!empty($list)) :?>
<?php if($description >''): ?>
<h4><?php echo $description; ?></h4>
<?php endif; ?>

<div class="jcarousel-wrapper" style="width:<?php echo $nwidth; ?>px; height:<?php echo $nheight; ?>px;">
                <div class="jcarousel" style="width:<?php echo $nwidth; ?>px; height:<?php echo $nheight; ?>px;">
                    <ul>
                    	<?php foreach( $list as $item ): ?>
                        <li style="width:<?php echo $nwidth; ?>px; height:<?php echo $nheight; ?>px;">
                            <img src="<?php echo $item->photo; ?>" alt="<?php echo ($item->text); ?>" title="<?php echo ($item->text); ?>"  />
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <a href="#" class="jcarousel-control-prev">&lsaquo;</a>
                <a href="#" class="jcarousel-control-next">&rsaquo;</a>
                <p class="jcarousel-pagination">
                </p>
            </div>
<?php endif; ?>
