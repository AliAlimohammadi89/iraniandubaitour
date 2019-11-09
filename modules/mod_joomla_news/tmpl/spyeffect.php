<?php
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
$document = JFactory::getDocument();
$document->addStyleSheet('modules/mod_joomla_news/assets/spayeffect.css');
$document->addScriptDeclaration('
jQuery(function () {
    jQuery(\'ul.spy\').simpleSpy();
});
(function ($) {
    
$.fn.simpleSpy = function (limit, interval) {
    limit = limit || 5;
    interval = interval || 4000;
    
    return this.each(function () {
        // 1. setup
            // capture a cache of all the list items
            // chomp the list down to limit li elements
        var $list = jQuery(this),
            items = [], // uninitialised
            currentItem = limit,
            total = 0, // initialise later on
            height = $list.find(\'> li:first\').height();
            
        // capture the cache
        $list.find(\'> li\').each(function () {
            items.push(\'<li>\' + jQuery(this).html() + \'</li>\');
        });
        
        total = items.length;
        
        $list.wrap(\'<div class="spyWrapper" />\').parent().css({ height : height * limit });
        
        $list.find(\'> li\').filter(\':gt(\' + (limit - 1) + \')\').remove();
        // 2. effect        
        function spy() {
            // insert a new item with opacity and height of zero
            var $insert = jQuery(items[currentItem]).css({
                height : 0,
                opacity : 0,
                
            }).prependTo($list);
                        
            // fade the LAST item out
            $list.find(\'> li:last\').animate({ opacity : 0}, 1000, function () {
                // increase the height of the NEW first item
                $insert.animate({ height : height }, 1000).animate({ opacity : 1 }, 1000);
                
                // AND at the same time - decrease the height of the LAST item
                // jQuery(this).animate({ height : 0 }, 1000, function () {
                    // finally fade the first item in (and we can remove the last)
                    jQuery(this).remove();
                // });
            });
            
            currentItem++;
            if (currentItem >= total) {
                currentItem = 0;
            }
            
            setTimeout(spy, interval)
        }
        
        spy();
    });
};
    
})(jQuery);
');
?>
<?php if (!empty($list)) :?>
<?php if($description >''): ?>
<h4><?php echo $description; ?></h4>
<?php endif; ?>

<div id="sidebar">
    <ul class="spy">
	<?php foreach ($list as $item) : ?>
			<li style="height:<?php echo $height+10; ?>px">
			<div class="itemintro">
			<a href="<?php echo $item->link; ?>" title="<?php echo (strip_tags (mb_substr($item->text,0,$maxcontent,'UTF-8'))); ?>">
			<img src="<?php echo  $item->thumb; ?>" alt="<?php echo (strip_tags (mb_substr($item->text,0,$maxcontent,'UTF-8'))); ?>" title="<?php echo (strip_tags (mb_substr($item->text,0,$maxcontent,'UTF-8'))); ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>"  />
			</a>
			<div class="small"><?php echo $item->subtitle; ?></div>
			<div class="itemtitle"><a href="<?php echo $item->link; ?>" title="<?php echo (strip_tags (mb_substr($item->text,0,$maxcontent,'UTF-8'))); ?>"><h5><?php echo (strip_tags (mb_substr($item->text,0,$maxcontent,'UTF-8'))); ?></h5></a></div>
			<?php echo (strip_tags (mb_substr($item->desc,0,$maxcontent,'UTF-8'))); ?>
			</div>
			</li>
	<?php endforeach; ?>
   </ul>
</div>
<?php endif; ?>
