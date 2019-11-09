<?php
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
$document = JFactory::getDocument();
$document->addStyleSheet('modules/mod_joomla_news/assets/featuredslider4.css');
$document->addScript('modules/mod_joomla_news/assets/jquery-ui.min.js');
$document->addScriptDeclaration('
	jQuery(document).ready(function(){
		jQuery("#featured4 > ul").tabs({fx:{opacity: "toggle"}}).tabs("rotate", '.$fdoration.', '.$fauto.');
	});
');
$data	='0';
?>
<?php if (!empty($list)) :?>
<?php if($description >''): ?>
<h4><?php echo $description; ?></h4>
<?php endif; ?>

<div class="superslider" style="width:100%;">
	<div id="featured4" style="width:100%;">
	
		<?php foreach( $list as $no => $item ): ?>
			<?php
						$data	=($data+1);
			?>
			<div id="fragment4-<?php echo $data; ?>" class="ui-tabs-panel <?php if($data > 1){ ?>ui-tabs-hide<?php } ?>" style="width:100%; height:<?php echo $nheight; ?>px; max-height:<?php echo $nheight; ?>px; overflow:hidden;">
				<img src="<?php echo $item->photo; ?>" alt="<?php echo ($item->text);?>" title="<?php echo ($item->text);?>" width="100%" height="<?php echo $nheight; ?>" style="height:<?php echo $nheight; ?>px;" />
				 <div class="info">
					<h4><a href="<?php echo $item->link;?>" ><?php echo ($item->text);?></a></h4>
					<div><?php echo (strip_tags (mb_substr($item->desc,0,$maxcontent,'UTF-8'))); ?></div>
				 </div>
			</div>
		<?php endforeach; ?>
			<?php
					$data	='0';
			?>
			  <ul class="ui-tabs-nav">
			  <?php foreach( $list as $item ): ?>
				<?php
							$data	=($data+1);
				?>
				<li class="ui-tabs-nav-item <?php if($data==1){ ?>ui-tabs-selected<?php } ?>" id="nav-fragment4-<?php echo $data; ?>" style="width:<?php echo round(100/$count-1); ?>%; height:<?php echo $height; ?>px;">
					<a href="#fragment4-<?php echo $data; ?>">
						<img src="<?php echo $item->thumb; ?>" alt="<?php echo ($item->text);?>" title="<?php echo ($item->text);?>" width="93%" height="<?php echo $height; ?>" style="height:<?php echo $height; ?>px;" />
					</a>
				</li>
			  <?php endforeach; ?>
			  </ul>
	</div>
</div>
<?php endif; ?>
