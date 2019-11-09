<?php
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
$document = JFactory::getDocument();
$document->addStyleSheet('modules/mod_joomla_news/assets/jquery-responsiveGallery.css');
$document->addScript('modules/mod_joomla_news/assets/modernizr.custom6.js');
$document->addScript('modules/mod_joomla_news/assets/jquery.responsiveGallery.js');
$document->addScriptDeclaration('
jQuery(function () {
	jQuery(\'.responsiveGallery-wrapper\').responsiveGallery({
		animatDuration: 400, //动画时长 单位 ms
		$btn_prev: jQuery(\'.responsiveGallery-btn_prev\'),
		$btn_next: jQuery(\'.responsiveGallery-btn_next\')
	});
});
');
?>
<?php if (!empty($list)) :?>
<?php if($description >''): ?>
<h4><?php echo $description; ?></h4>
<?php endif; ?>

	<div class="w-gallery">
  <section id="responsiveGallery-container" class="responsiveGallery-container">
   <a class="responsiveGallery-btn responsiveGallery-btn_prev" href="javascript:void(0);"></a> 
   <a class="responsiveGallery-btn responsiveGallery-btn_next" href="javascript:void(0);"></a>
    <ul class="responsiveGallery-wrapper">
    <?php foreach ($list as $item) : ?>
      <li class="responsiveGallery-item">
      <a href="#" class="responsivGallery-link">
		<img src="<?php echo  $item->thumb; ?>" title="<?php echo (strip_tags (mb_substr($item->text,0,$maxcontent,'UTF-8'))); ?>" border="0" width="<?php echo $width; ?>" height="<?php echo $width; ?>" style="width:<?php echo $width; ?>px; height:<?php echo $height; ?>px;" class="responsivGallery-pic" />
      </a>
        <div class="w-responsivGallery-info">
          <h2 class="responsivGallery-name">
          <a href="<?php echo $item->link; ?>" title="<?php echo (strip_tags (mb_substr($item->text,0,$maxcontent,'UTF-8'))); ?>">
		  <?php echo (strip_tags (mb_substr($item->text,0,$maxcontent,'UTF-8'))); ?>
          </a>
          </h2>
          <h3 class="responsivGallery-position"><?php echo (strip_tags (mb_substr($item->desc,0,$maxcontent,'UTF-8'))); ?></h3>
        </div>
      </li>
     <?php endforeach; ?>
    </ul>
  </section>
</div>

<?php endif; ?>
