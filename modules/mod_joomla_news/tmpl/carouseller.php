<?php
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
$document = JFactory::getDocument();
$document->addStyleSheet('modules/mod_joomla_news/assets/carouseller.css');
$document->addScript('modules/mod_joomla_news/assets/carouseller.min.js');
$document->addScript('modules/mod_joomla_news/assets/jquery.easing.1.3.js');
$document->addScriptDeclaration('
');
?>
<?php if (!empty($list)) :?>
<?php if($description >''): ?>
<h4><?php echo $description; ?></h4>
<?php endif; ?>

<div id="second<?php echo $module->id ?>" class="carouseller" style="direction:ltr"> 
			<a href="javascript:void(0)" class="carousel-button-left">‹</a> 
			<div class="carousel-wrapper"> 
				<div class="carousel-items"> 
		<?php foreach ($list as $item) : ?>
					<div class="cdiv<?php echo round(12/$inpage); ?> carousel-block">
                    <a href="<?php echo $item->link; ?>" title="<?php echo (strip_tags (mb_substr($item->text,0,$maxcontent,'UTF-8'))); ?>">
					<img src="<?php echo  $item->thumb; ?>" title="<?php echo (strip_tags (mb_substr($item->text,0,$maxcontent,'UTF-8'))); ?>" border="0" width="<?php echo $width; ?>" height="<?php echo $width; ?>" style="width:<?php echo $width; ?>px; height:<?php echo $height; ?>px;" />
                    </a>
					<?php if($item->subtitle >'0'): ?>
                    <div class="small"><?php echo $item->subtitle; ?></div>
                    <?php endif; ?>
                    <h4><a href="<?php echo $item->link; ?>" title="<?php echo (strip_tags (mb_substr($item->text,0,$maxcontent,'UTF-8'))); ?>"><?php echo (strip_tags (mb_substr($item->text,0,$maxcontent,'UTF-8'))); ?><?php if($newscat=='1'): ?> <small>(<?php echo $item->category ; ?>)</small><?php endif; ?></a></h4>
                    <?php if($newlead=='1'): ?>
                	<div class="desc"><?php echo (strip_tags (mb_substr($item->desc,0,$maxcontent,'UTF-8'))); ?>...</div>
                	<?php endif; ?>
					</div>
		<?php endforeach; ?>
				</div>
			</div>
			<a href="javascript:void(0)" class="carousel-button-right">›</a>
		</div>
		<script type="text/javascript">
			jQuery(function() {
				jQuery('#second<?php echo $module->id ?>').carouseller({
					scrollSpeed: 200,
					autoScrollDelay: <?php echo $fdoration; ?>,
					easing: 'linear'
				});
			});
		</script>
<?php endif; ?>
