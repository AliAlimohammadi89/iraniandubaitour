<?php
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
$document = JFactory::getDocument();
$document->addStyleSheet('modules/mod_joomla_news/assets/carrouseljs.css');
$document->addScript('modules/mod_joomla_news/assets/carrouseljs.js');
$document->addScriptDeclaration('

');
?>
<?php if (!empty($list)) :?>
<?php if($description >''): ?>
<h4><?php echo $description; ?></h4>
<?php endif; ?>

	<div class="wrap" id="wrap<?php echo $module->id; ?>" data-setting='{
											"width":<?php echo $nwidth; ?>,
										 	"heihgt":<?php echo $nheight; ?>,
										 	"firstPicWidth":<?php echo $width; ?>,
									 		"firstPicHeight":<?php echo $height; ?>,
										 	"scale":0.9,
										 	"speed":500
												}'>
		<div class="gg_left gg_btn"></div>
		<div class="gg_right gg_btn"></div>
		<ul class="wrap_ul">
        	<?php foreach ($list as $item) : ?>
			<li class="li_item">
                <a href="<?php echo $item->link; ?>" title="<?php echo (strip_tags (mb_substr($item->text,0,$maxcontent,'UTF-8'))); ?>">
                    <img src="<?php echo $item->thumb; ?>" width="100%" alt="<?php echo $item->text; ?>"  title="<?php echo $item->text; ?>" />
                </a>
            </li>
			<?php endforeach; ?>  
		</ul>
	</div>
	<script>
		jQuery(function(){
			Carrousel.init(jQuery('#wrap<?php echo $module->id; ?>'));
		})
	</script>

<?php endif; ?>
