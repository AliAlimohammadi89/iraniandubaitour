<?php
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
$document = JFactory::getDocument();
$document->addStyleSheet('modules/mod_joomla_news/assets/animate.css');
$document->addStyleSheet('modules/mod_joomla_news/assets/owl.carousel.css');
$document->addStyleSheet('modules/mod_joomla_news/assets/owl.theme.default.css');
$document->addScript('modules/mod_joomla_news/assets/owl.carousel.js');
$document->addScriptDeclaration('
');
?>
<?php if (!empty($list)) :?>
<?php if($description >''): ?>
<h4><?php echo $description; ?></h4>
<?php endif; ?>

<div class="owl-carousel owl-theme">
	<?php foreach ($list as $item) : ?>
    <div class="itemow">
    	<a href="<?php echo $item->link; ?>" title="<?php echo (strip_tags (mb_substr($item->text,0,$maxcontent,'UTF-8'))); ?>" />
		<img src="<?php echo  $item->thumb; ?>" title="<?php echo (strip_tags (mb_substr($item->text,0,$maxcontent,'UTF-8'))); ?>" height="<?php echo $width; ?>" style="height:<?php echo $height; ?>px;" />
        <span><?php echo (strip_tags (mb_substr($item->text,0,$maxcontent,'UTF-8'))); ?></span>
        </a>
    </div>
	<?php endforeach; ?>
</div>
    <div class="archive"><a href="<?php echo 'index.php?option=com_content&view=category&layout=blog&id='.$item->category.'&Itemid='.$item->itemid; ?>">آرشیو</a></div>
          <script>
            jQuery(document).ready(function() {
              var owl = jQuery('.owl-carousel');
              owl.owlCarousel({
                rtl: true,
				animateOut: 'slideOutDown',
				animateIn: 'flipInX',
				autoplay:true,
                margin: 0,
                nav: false,
                loop: true,
                responsive: {
                  0: {
                    items: 1
                  },
                  600: {
                    items: <?php echo round($inpage/2); ?>
                  },
                  1000: {
                    items: <?php echo $inpage; ?>
                  }
                }
              })
            })
          </script>
<?php endif; ?>
