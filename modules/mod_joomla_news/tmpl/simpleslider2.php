<?php
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
$document = JFactory::getDocument();
$document->addStyleSheet('modules/mod_joomla_news/assets/simpleslider2.css');
$document->addScript('modules/mod_joomla_news/assets/simpleslider2.js');
?>
<?php if (!empty($list)) :?>
<?php if($description >''): ?>
<h4><?php echo $description; ?></h4>
<?php endif; ?>

<div class="simpleslider2">
    <div class="nav-box"> <span class="nav nav-prev"></span> <span class="nav nav-next"></span> </div>
    <div class="slider">
      <?php foreach ($list as $item) : ?>
      <div class="slider-panel">
        <div class="slider-item">
			<img src="<?php echo $item->photo; ?>" title="<?php echo (strip_tags (mb_substr($item->text,0,$maxcontent,'UTF-8'))); ?>" alt="<?php echo (strip_tags (mb_substr($item->text,0,$maxcontent,'UTF-8'))); ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" />
          <h4><a href="<?php echo $item->link; ?>" title="<?php echo (strip_tags (mb_substr($item->text,0,$maxcontent,'UTF-8'))); ?>"><?php echo (strip_tags (mb_substr($item->text,0,$maxcontent,'UTF-8'))); ?></a></h4>
          <p><?php echo (strip_tags (mb_substr($item->desc,0,$maxcontent,'UTF-8'))); ?></p>
        </div>
      </div>
	  <?php endforeach; ?>
    </div>
    <div class="tab-box"> </div>
</div>
<?php endif; ?>
