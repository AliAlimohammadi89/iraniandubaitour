<?php
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
$document = JFactory::getDocument();
$document->addStyleSheet('modules/mod_joomla_news/assets/contentslider2.css');
$document->addScript('modules/mod_joomla_news/assets/contentslider.js');
?>
<?php if (!empty($list)) :?>
<?php if($description >''): ?>
<h4><?php echo $description; ?></h4>
<?php endif; ?>

<div class="slider2">
	<div id="slider<?php echo $module->id ?>" class="sliderwrapper" style="height:<?php echo $nheight; ?>px;">
		<?php foreach ($list as $item) : ?>
		   <div class="contentdiv" style="height:<?php echo $nheight; ?>px;">
			<div class="text2" style="height:<?php echo $nheight; ?>px;">
			<img src="<?php echo $item->photo; ?>" title="<?php echo (strip_tags (mb_substr($item->text,0,$maxcontent,'UTF-8'))); ?>" alt="<?php echo (strip_tags (mb_substr($item->text,0,$maxcontent,'UTF-8'))); ?>" width="<?php echo $nwidth; ?>" height="<?php echo $nheight; ?>" style="min-height:<?php echo $nheight; ?>px; width:auto;" />
            <div class="small"><?php echo $item->subtitle; ?></div>
            <h2><a href="<?php echo $item->link; ?>" title="<?php echo (strip_tags (mb_substr($item->text,0,$maxcontent,'UTF-8'))); ?>"><?php echo (strip_tags (mb_substr($item->text,0,$maxcontent,'UTF-8'))); ?></a></h2>
			<?php echo (strip_tags (mb_substr($item->desc,0,$maxcontent,'UTF-8'))); ?></div>
			</div>
		<?php endforeach; ?>
	</div>
	<div id="paginate-slider<?php echo $module->id ?>" class="paginations"></div>
	<script type="text/javascript">
	
	featuredcontentslider.init({
		id: "slider<?php echo $module->id ?>",  //id of main slider DIV
		contentsource: ["inline", ""],  //Valid values: ["inline", ""] or ["ajax", "path_to_file"]
		toc: "#increment",  //Valid values: "#increment", "markup", ["label1", "label2", etc]
		nextprev: ["قبل", "بعد"],  //labels for "prev" and "next" links. Set to "" to hide.
		revealtype: "click", //Behavior of pagination links to reveal the slides: "click" or "mouseover"
		enablefade: [true, 0.05],  //[true/false, fadedegree]
		autorotate: [true, <?php echo $fdoration; ?>],  //[true/false, pausetime]
		onChange: function(previndex, curindex){  //event handler fired whenever script changes slide
			//previndex holds index of last slide viewed b4 current (1=1st slide, 2nd=2nd etc)
			//curindex holds index of currently shown slide (1=1st slide, 2nd=2nd etc)
		}
	})
	
	</script>
</div>
<?php endif; ?>
