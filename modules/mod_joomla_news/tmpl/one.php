<?php
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
$document->addStyleSheet('modules/mod_joomla_news/assets/one.css');
?>
<?php if (!empty($list)) :?>
<div class="news_one">
    <div class="news_list">
    <?php $num=''; ?>
	<?php foreach ($list as $item) : ?>
		<div class="news_one_item span3">
				<?php
				$num=$num+1;
				?>
			<img src="<?php echo  $item->thumb; ?>" title="<?php echo (strip_tags (mb_substr($item->text,0,$maxcontent,'UTF-8'))); ?>" border="0" width="<?php echo $width; ?>" height="<?php echo $width; ?>" />
            <div class="small"><?php echo $item->subtitle; ?></div>
			<strong><?php echo (strip_tags (mb_substr($item->text,0,$maxcontent,'UTF-8'))); ?></strong>
			<p><?php echo (strip_tags (mb_substr($item->desc,0,$maxcontent,'UTF-8'))); ?>...</p>
            <a id="pin_<?php echo $num; ?>" class="more" >ادامه مطلب</a>
		</div>
        <div id="dialog_<?php echo $num; ?>">
        	<?php echo $item->full; ?>
        </div>
		<script type="text/javascript">
		jQuery.fx.speeds._default = 400;
		   jQuery(function() {
		   jQuery( "#dialog_<?php echo $num; ?>" ).dialog({
		 position: ["center","center"],  height:300, width: 600, title:'Links',  autoOpen: false, 
		       hide: "blind", show: "blind", title:"<?php echo (strip_tags (mb_substr($item->text,0,$maxcontent,'UTF-8'))); ?>"
		   });
                                            
		   jQuery( "#pin_<?php echo $num; ?>" ).click(function() {
		       jQuery( "#dialog_<?php echo $num; ?>" ).dialog( "open" );
		       return false;
		   });
         });
		 </script>
        
	<?php endforeach; ?>
   </div>
</div>
<?php endif; ?>
