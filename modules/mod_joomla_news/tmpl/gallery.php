<?php
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
$document = JFactory::getDocument();
$document->addStyleSheet('modules/mod_joomla_news/assets/jquery.galleryview-3.0-dev.css');
$document->addScript('modules/mod_joomla_news/assets/jquery-ui.min.js');
$document->addScript('modules/mod_joomla_news/assets/jquery.timers-1.2.js');
$document->addScript('modules/mod_joomla_news/assets/jquery.easing.1.3.js');
$document->addScript('modules/mod_joomla_news/assets/jquery.galleryview-3.0-dev.js');
$document->addScriptDeclaration('
	jQuery(function(){
		jQuery(\'#myGallery\').galleryView();
	});
');
$data	='0';
?>
<?php if (!empty($list)) :?>
<?php if($description >''): ?>
<h4><?php echo $description; ?></h4>
<?php endif; ?>

			  <ul id="myGallery">
			  <?php foreach( $list as $item ): ?>
				<?php
							$data	=($data+1);
				?>
				<li>
				<img src="<?php echo $item->photo; ?>" alt="<?php echo ($item->text);?>" title="<?php echo ($item->text);?>" width="<?php echo $nwidth; ?>" height="<?php echo $nheight; ?>" />
				</li>
			  <?php endforeach; ?>
			  </ul>
			<?php
					$data	='0';
			?>
<?php endif; ?>
