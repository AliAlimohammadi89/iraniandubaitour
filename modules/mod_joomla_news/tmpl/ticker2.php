<?php
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
$document = JFactory::getDocument();
$document->addStyleSheet('modules/mod_joomla_news/assets/ticker-style.css');
$document->addScript('modules/mod_joomla_news/assets/jquery.ticker.js');
$document->addScriptDeclaration('
jQuery(function () {
     // start the ticker 
	jQuery(\'#js-news\').ticker({
		speed: 0.10,			
		controls: true,
		titleText: \'تازه ها\',	
		direction: \'rtl\',	
		pauseOnItems: '.$fdoration.',
		fadeInSpeed: '.$fdoration.',
		fadeOutSpeed: '.$fdoration.'
	});
	
	// hide the release history when the page loads
	jQuery(\'#release-wrapper\').css(\'margin-top\', \'-\' + (jQuery(\'#release-wrapper\').height() + 20) + \'px\');
	// show/hide the release history on click
	jQuery(\'a[href="#release-history"]\').toggle(function () {	
		jQuery(\'#release-wrapper\').animate({
			marginTop: \'0px\'
		}, 600, \'linear\');
	}, function () {
		jQuery(\'#release-wrapper\').animate({
			marginTop: \'-\' + (jQuery(\'#release-wrapper\').height() + 20) + \'px\'
		}, 600, \'linear\');
	});	
});
');
?>
<?php if (!empty($list)) :?>
<?php if($description >''): ?>
<h4><?php echo $description; ?></h4>
<?php endif; ?>

<div>
   <ul id="js-news" class="js-hidden">
	<?php foreach ($list as $item) : ?>
		<li class="news-item">
			<a href="<?php echo $item->link; ?>" title="<?php echo (strip_tags (mb_substr($item->text,0,$maxcontent,'UTF-8'))); ?>"><?php echo (strip_tags (mb_substr($item->text,0,$maxcontent,'UTF-8'))); ?></a>
		</li>
	<?php endforeach; ?>
   </ul>
</div>
<?php endif; ?>
