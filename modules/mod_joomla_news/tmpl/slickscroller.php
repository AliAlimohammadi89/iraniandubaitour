<?php
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
$document = JFactory::getDocument();
$document->addStyleSheet('modules/mod_joomla_news/assets/slick.css');
$document->addStyleSheet('modules/mod_joomla_news/assets/slick-theme.css');
$document->addScript('modules/mod_joomla_news/assets/slick.min.js');
$document->addScriptDeclaration('
jQuery(document).ready(function (e) {
    jQuery(\'.slider-for9\').slick({
        slidesToShow: 5,
        slidesToScroll: 1,
        arrows: true,
        fade: true,
        asNavFor: \'.slider-nav9\',
    });
    jQuery(\'.slider-nav9\').slick({
        slidesToShow: 5,
        slidesToScroll: 1,
        asNavFor: \'.slider-for9\',
        dots: false,
        centerMode: true,
        focusOnSelect: true,
        rtl: false,
        responsive: [{
            breakpoint: 768,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 1,
            }
        }, {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
            }
        }],
        arrows: true
    });
});');
?>
<?php if (!empty($list)) :?>
<?php if($description >''): ?>
<h4><?php echo $description; ?></h4>
<?php endif; ?>

<div class="slikscroller slider4">
		<ul class="slider-nav slider-nav9" style="min-height:150px;margin-bottom:0px;">
		<?php foreach ($list as $item) : ?>
			<li>
                <div class="slider4_items">
                    <a href="<?php echo $item->link; ?>" title="<?php echo (strip_tags (mb_substr($item->text,0,$maxcontent,'UTF-8'))); ?>">
                    <div class="slider4_item">
                        <div class="slider4_item_img borderi">
                        <img src="<?php echo  $item->thumb; ?>" title="<?php echo (strip_tags (mb_substr($item->text,0,$maxcontent,'UTF-8'))); ?>" border="0" width="<?php echo $width; ?>" height="<?php echo $height; ?>"  />
                        <div class="img_hover">
                        </div>
                        <div class="img_hover_pic">
                        </div>
                        </div>
                    <div class="title1 borderi">
                    <?php echo (strip_tags (mb_substr($item->text,0,$maxcontent,'UTF-8'))); ?>
                    </div>
                    <p></p>
                    </div>
                    </a> 
                </div>
			</li>
		<?php endforeach; ?>
	   </ul>
</div>
<?php endif; ?>
