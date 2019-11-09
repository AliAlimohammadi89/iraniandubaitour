<?php
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
$document = JFactory::getDocument();
$document->addStyleSheet('modules/mod_joomla_news/assets/elastislide.css');
$document->addStyleSheet('modules/mod_joomla_news/assets/custom.css');
$document->addScript('modules/mod_joomla_news/assets/modernizr.custom.17475.js');
$document->addScriptDeclaration('

');
?>
<?php if (!empty($list)) :?>
<?php if($description >''): ?>
<h4><?php echo $description; ?></h4>
<?php endif; ?>

<div class="sliderltr fixed-bar">
<ul id="carousel<?php echo $module->id; ?>" class="elastislide-list">
	<?php foreach ($list as $item) : ?>
    <li>
      <a href="<?php echo $item->link; ?>" title="<?php echo (strip_tags (mb_substr($item->text,0,$maxcontent,'UTF-8'))); ?>">
		<img src="<?php echo  $item->thumb; ?>" title="<?php echo (strip_tags (mb_substr($item->text,0,$maxcontent,'UTF-8'))); ?>" border="0" width="<?php echo $width; ?>" height="<?php echo $width; ?>" style="width:<?php echo $width; ?>px; height:<?php echo $height; ?>px;" />
      </a>
      </li>
    <?php endforeach; ?>  
</ul>
</div>
<script type="text/javascript" src="modules/mod_joomla_news/assets/jquerypp.custom.js"></script>
<script type="text/javascript" src="modules/mod_joomla_news/assets/jquery.elastislide.js"></script>
<script type="text/javascript">
      jQuery( '#carousel<?php echo $module->id; ?>' ).elastislide();
</script>
<?php endif; ?>
