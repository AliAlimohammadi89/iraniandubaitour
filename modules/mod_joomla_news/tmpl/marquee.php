<?php
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
?>
<?php if (!empty($list)) :?>
<?php if($description >''): ?>
<h4><?php echo $description; ?></h4>
<?php endif; ?>

<div>
<marquee direction="<?php echo $direction; ?>" width="<?php echo $mwidth; ?>" height="<?php echo $mheight; ?>" behavior="scroll" scrollamount="<?php echo $scrollamount; ?>" scrolldelay="<?php echo $scrolldelay; ?>" onmouseover="javascript:this.setAttribute('scrollamount','0');" onmouseout="javascript:this.setAttribute('scrollamount','5');">
   <ul class="latestads">
	<?php foreach ($list as $item) : ?>
		<li>
			<a href="<?php echo $item->link; ?>" title="<?php echo (strip_tags (mb_substr($item->text,0,$maxcontent,'UTF-8'))); ?>"><?php echo (strip_tags (mb_substr($item->text,0,$maxcontent,'UTF-8'))); ?></a>
		</li>
	<?php endforeach; ?>
   </ul>
</marquee>
</div>
<?php endif; ?>
