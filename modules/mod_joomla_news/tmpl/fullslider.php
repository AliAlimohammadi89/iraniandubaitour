<?php
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
$document = JFactory::getDocument();
$document->addStyleSheet('modules/mod_joomla_news/assets/BJSlider.css');
//$document->addScript('modules/mod_joomla_news/assets/BJSlider.js');
$document->addScriptDeclaration('
');
?>
<?php if (!empty($list)) :?>
<?php if($description >''): ?>
<h4><?php echo $description; ?></h4>
<?php endif; ?>

<section id="splash" style="height:<?php echo $height; ?>px;">
   <?php foreach ($list as $item) : ?>
  <section>
	<img src="<?php echo  $item->thumb; ?>" title="<?php echo (strip_tags (mb_substr($item->text,0,$maxcontent,'UTF-8'))); ?>"   />
    <div>
      <h1><?php echo (strip_tags (mb_substr($item->text,0,$maxcontent,'UTF-8'))); ?></h1>
      <h2><?php echo (strip_tags (mb_substr($item->desc,0,$maxcontent,'UTF-8'))); ?></h2>
    </div>
  </section>
  <?php endforeach; ?>
</section>
<script src="modules/mod_joomla_news/assets/BJSlider.js" type="text/javascript"></script>
<?php endif; ?>
