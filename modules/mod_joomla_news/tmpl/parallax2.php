<?php
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
$document = JFactory::getDocument();
$document->addStyleSheet('modules/mod_joomla_news/assets/dragstyle.css');
$document->addScript('modules/mod_joomla_news/assets/index.js');
$document->addScriptDeclaration('
');
?>
<?php if (!empty($list)) :?>
<?php if($description >''): ?>
<h4><?php echo $description; ?></h4>
<?php endif; ?>

<div class="slider-container" style="height:<?php echo $nheight; ?>px;">
  <div class="slider-control left inactive"></div>
  <div class="slider-control right"></div>
  <ul class="slider-pagi"></ul>
  <div class="slider">
	<?php
		$data	='0';
	?>
    <?php foreach ($list as $item) : ?>
    <div class="slide slide-<?php echo $data; ?> <?php if($data==0){ ?>active<?php } ?>">
      <div class="slide__bg" style="background-image:url(<?php echo $item->photo; ?>);"></div>
      <div class="slide__content">
        <svg class="slide__overlay" viewBox="0 0 720 405" preserveAspectRatio="xMaxYMax slice">
          <path class="slide__overlay-path" d="M0,0 150,0 500,405 0,405" />
        </svg>
        <div class="slide__text">
          <h2 class="slide__text-heading"><?php echo ($item->text);?></h2>
          <p class="slide__text-desc"><?php echo (strip_tags (mb_substr($item->desc,0,$maxcontent,'UTF-8'))); ?></p>
<!--          <a class="slide__text-link" class="--><?php //echo $item->link;?><!--">--><?php //echo JText::_('MOD_JOOMLA_NEWS_LABEL_READ_MORE') ?><!--</a>-->
        </div>
      </div>
    </div>
	<?php
		$data	=($data+1);
	?>
    <?php endforeach; ?>
  </div>
</div>
<?php endif; ?>
