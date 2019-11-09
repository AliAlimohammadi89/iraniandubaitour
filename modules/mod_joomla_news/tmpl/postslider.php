<?php
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
$document = JFactory::getDocument();
$document->addStyleSheet('modules/mod_joomla_news/assets/postslider.css');
$document->addScript('modules/mod_joomla_news/assets/responsiveCarousel.min.js');
$document->addScriptDeclaration('

');
?>
<?php if (!empty($list)) :?>
<?php if($description >''): ?>
<h4><?php echo $description; ?></h4>
<?php endif; ?>

<div class="postslider">
  <div id="w<?php echo $module->id; ?>" class="wslider">    
    
    <div class="crsl-items" data-navigation="navbtns">
      <div class="crsl-wrap">
	<?php foreach ($list as $item) : ?>
        <div class="crsl-item">
          <div class="wow fadeIn" data-wow-delay="0.2s">
          <div class="thumbnail">
       <a href="<?php echo $item->link; ?>" title="<?php echo (strip_tags (mb_substr($item->text,0,$maxcontent,'UTF-8'))); ?>">
		<img src="<?php echo  $item->thumb; ?>" title="<?php echo (strip_tags (mb_substr($item->text,0,$maxcontent,'UTF-8'))); ?>" border="0" width="100%" height="100%" style="width:100%; height:<?php echo $height; ?>px;" />
        </a>
        	<?php if($newsdate=='1'): ?>
           <div class="postdate"><span><?php echo (JHTML::_('date',$item->date)) ; ?></span></div>
           <?php endif; ?>
          </div>
          <h2><a href="<?php echo $item->link; ?>" title="<?php echo (strip_tags (mb_substr($item->text,0,$maxcontent,'UTF-8'))); ?>"><?php echo (strip_tags (mb_substr($item->text,0,$maxcontent,'UTF-8'))); ?></a></h2>
          <?php if($newlead=='1'): ?>
          <p><?php echo (strip_tags (mb_substr($item->desc,0,$maxcontent,'UTF-8'))); ?>...</p>
          <?php endif; ?>
          <?php if($newsreadon=='1'): ?>
          <p class="readmores"><a href="<?php echo $item->link; ?>" title="<?php echo (strip_tags (mb_substr($item->text,0,$maxcontent,'UTF-8'))); ?>">بیشتر بدانید</a></p>
          <?php endif; ?>
          </div>
        </div>
    <?php endforeach; ?>  

      </div><!-- @end .crsl-wrap -->
    </div><!-- @end .crsl-items -->
    
  </div><!-- @end #w -->
	<nav class="slidernav">
      <div id="navbtns" class="clearfix">
        <a href="#" class="previous">قبل</a>
        <a href="#" class="next">بعد</a>
      </div>
    </nav>
</div>
<script type="text/javascript">
jQuery(function(){
  jQuery('.crsl-items').carousel({
    visible: 5,
    itemMinWidth: <?php echo $width-30; ?>,
    itemEqualHeight:<?php echo $height; ?>,
    itemMargin: 5,
  });
  
  jQuery("a[href=#]").on('click', function(e) {
    e.preventDefault();
  });
});
</script>
<?php endif; ?>
