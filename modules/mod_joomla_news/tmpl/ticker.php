<?php
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
$document = JFactory::getDocument();
$document->addStyleSheet('modules/mod_joomla_news/assets/resources/css/global.css');
?>
<?php if (!empty($list)) :?>
<?php if($description >''): ?>
<h4><?php echo $description; ?></h4>
<?php endif; ?>

<div>
   <ul id="ticker_<?php echo $module->id ?>" class="ticker">
	<?php foreach ($list as $item) : ?>
		<li>
			<a href="<?php echo $item->link; ?>" title="<?php echo (strip_tags (mb_substr($item->text,0,$maxcontent,'UTF-8'))); ?>"><?php echo (strip_tags (mb_substr($item->text,0,$maxcontent,'UTF-8'))); ?></a>
		</li>
	<?php endforeach; ?>
   </ul>
</div>
<?php endif; ?>
<script>
	function tick(){
		jQuery('#ticker_<?php echo $module->id ?> li:first').slideUp( function () { jQuery(this).appendTo(jQuery('#ticker_<?php echo $module->id ?>')).slideDown(); });
	}
	setInterval(function(){ tick () }, <?php echo $fdoration; ?>);
</script>
