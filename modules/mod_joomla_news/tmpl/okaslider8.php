<?php
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
$document = JFactory::getDocument();
$document->addStyleSheet('modules/mod_joomla_news/assets/oka_slider_model.css');
$document->addScript('modules/mod_joomla_news/assets/oka_slider_model.js');
$document->addScriptDeclaration('
			jQuery(function(i){
				jQuery(\'.demo-8\').oka_slider_model({
					\'type\': 7
				});
			});
');
$data	='0';
?>
<?php if (!empty($list)) :?>
<?php if($description >''): ?>
<h4><?php echo $description; ?></h4>
<?php endif; ?>

<div class="slider_model demo-8">
			<div class="slider_model_box">
			  <?php foreach( $list as $item ): ?>
				<?php
							$data	=($data+1);
				?>
						<img src="<?php echo $item->thumb; ?>" alt="<?php echo (strip_tags (mb_substr($item->desc,0,$maxcontent,'UTF-8'))); ?>" title="<?php echo ($item->text);?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" />
			  	<?php endforeach; ?>
			</div>
		</div>
<?php endif; ?>
