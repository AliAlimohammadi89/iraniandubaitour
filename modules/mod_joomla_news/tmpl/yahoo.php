<?php
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
$document = JFactory::getDocument();
$document->addStyleSheet('modules/mod_joomla_news/assets/themes/base.css');
$document->addStyleSheet('modules/mod_joomla_news/assets/themes/default/theme.css');
$document->addScript('modules/mod_joomla_news/assets/jquery.accessible-news-slider.js');
$document->addScriptDeclaration('
// when the DOM is ready, convert the feed anchors into feed content
jQuery(document).ready(function() {
	jQuery(\'#newsslider\').accessNews({
		speed : "normal",
		slideBy : '.(int) $params->get('count').',
		title: "خبرها های ویژه:",
		// subtitle for the display
		subtitle: "برگزیده خبرها های ویژه",
		// number of slides to advance when paginating
		slideShowInterval: 5000,
		slideShowDelay: 5000	
	});
});
');
?>
<style type="text/css">
div.jqans-wrapper.default li {
	width: <?php echo (100/(int) $params->get('count')); ?>%;
}
ul#newsslider, .jqans-stories-selector{
	min-width:100%;
}
</style>
<?php if (!empty($list)) :?>
<?php if($description >''): ?>
<h4><?php echo $description; ?></h4>
<?php endif; ?>

<ul id="newsslider">
	<?php foreach ($list as $item) : ?>
	
		<li>
			<a href="<?php echo $item->link; ?>" title="<?php echo (strip_tags (mb_substr($item->text,0,$maxcontent,'UTF-8'))); ?>">
				<img src="<?php echo $item->photo; ?>" width="82" height="30" alt="<?php echo (strip_tags (mb_substr($item->text,0,$maxcontent,'UTF-8'))); ?>" />
			</a>
            <div class="small"><?php echo $item->subtitle; ?></div>
			<h4><a href="<?php echo $item->link; ?>" title="<?php echo (strip_tags (mb_substr($item->text,0,$maxcontent,'UTF-8'))); ?>"><?php echo (strip_tags (mb_substr($item->text,0,$maxcontent,'UTF-8'))); ?></a></h4>
			<p><?php echo (strip_tags (mb_substr($item->desc,0,$maxcontent,'UTF-8'))); ?> <br /><a href="<?php echo $item->link; ?>" title="<?php echo (strip_tags (mb_substr($item->text,0,$maxcontent,'UTF-8'))); ?>"> &raquo; توضیحات بیشتر</a></p>
		</li>
	<?php endforeach; ?>
</ul>
<?php endif; ?>
