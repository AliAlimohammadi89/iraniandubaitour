<?php
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
$document = JFactory::getDocument();
$document->addStyleSheet('modules/mod_joomla_news/assets/flexisel2.css');
$document->addScript('modules/mod_joomla_news/assets/jquery.flexisel.js');
$document->addScriptDeclaration('

');
?>
<?php if (!empty($list)) :?>
<?php if($description >''): ?>
<h4><?php echo $description; ?></h4>
<?php endif; ?>
<div class="scr">
    <ul id="flexiselDemo<?php echo $module->id; ?>" class="flexiselDemo2" style="height:<?php echo $height+50; ?>px;"> 
        <?php foreach ($list as $item) : ?>
        <li style="height:<?php echo $height+50; ?>px;">
          <a href="<?php echo $item->link; ?>" title="<?php echo (strip_tags (mb_substr($item->text,0,$maxcontent,'UTF-8'))); ?>">
            <img src="<?php echo  $item->thumb; ?>" title="<?php echo (strip_tags (mb_substr($item->text,0,$maxcontent,'UTF-8'))); ?>" border="0" width="<?php echo $width; ?>" height="<?php echo $width; ?>" style="width:<?php echo $width; ?>px; height:<?php echo $height; ?>px;" />
            <div class="title"><?php echo (strip_tags (mb_substr($item->text,0,$maxcontent,'UTF-8'))); ?></div>
          </a>
        </li> 
        <?php endforeach; ?>  
    </ul>
</div>
<script type="text/javascript">

jQuery(window).load(function() {
    jQuery("#flexiselDemo<?php echo $module->id; ?>").flexisel({
        visibleItems: <?php echo $inpage; ?>,
        itemsToScroll: <?php echo $inpage; ?>,
        animationSpeed: <?php echo $fdoration; ?>,
        infinite: <?php echo $fauto; ?>,
        navigationTargetSelector: null,
        autoPlay: {
            enable: <?php echo $fauto; ?>,
            interval: <?php echo $fdoration; ?>,
            pauseOnHover: true
        },
        responsiveBreakpoints: { 
            portrait: { 
                changePoint:480,
                visibleItems: 1,
                itemsToScroll: 1
            }, 
            landscape: { 
                changePoint:640,
                visibleItems: 2,
                itemsToScroll: 2
            },
            tablet: { 
                changePoint:768,
                visibleItems: 3,
                itemsToScroll: 3
            }
        }
    });
});
</script>
<?php endif; ?>
