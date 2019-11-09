<?php
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
$document = JFactory::getDocument();
$document->addStyleSheet('modules/mod_joomla_news/assets/featuredslider5.css');
$document->addScript('modules/mod_joomla_news/assets/jquery-ui.min.js');
$document->addScriptDeclaration('
	jQuery(document).ready(function(){
		jQuery("#featured5 > ul").tabs({fx:{opacity: "toggle"}}).tabs("rotate", '.$fdoration.', '.$fauto.');
	});
');
$data	='0';
?>
<?php if (!empty($list)) :?>
<?php if($description >''): ?>
<h4><?php echo $description; ?></h4>
<?php endif; ?>

<div class="superslider">
	<div id="featured5">
	
		<?php foreach( $list as $no => $item ): ?>
			<?php
						$data	=($data+1);
			?>
			<div id="fragment5-<?php echo $data; ?>" class="ui-tabs-panel <?php if($data > 1){ ?>ui-tabs-hide<?php } ?> span11">
				<img src="<?php echo $item->photo; ?>" alt="<?php echo ($item->text);?>" title="<?php echo ($item->text);?>" width="100%" height="<?php echo $nheight; ?>" />
				 <div class="info" >
					<h2><a href="<?php echo $item->link;?>" ><?php echo ($item->text);?></a></h2>
					<div><?php echo (strip_tags (mb_substr($item->desc,0,$maxcontent,'UTF-8'))); ?></div>
				 </div>
			</div>
		<?php endforeach; ?>
			<?php
					$data	='0';
			?>
			  <ul class="ui-tabs-nav span1 hidden-phone">
			  <?php foreach( $list as $item ): ?>
				<?php
							$data	=($data+1);
				?>
				<li class="ui-tabs-nav-item <?php if($data==1){ ?>ui-tabs-selected<?php } ?> span12" id="nav-fragment5-<?php echo $data; ?>">
					<a href="#fragment5-<?php echo $data; ?>">
						<img src="<?php echo $item->thumb; ?>" alt="<?php echo ($item->text);?>" title="<?php echo ($item->text);?>" width="93%" height="<?php echo $height; ?>" style="height:<?php echo $height; ?>;px" />
					</a>
				</li>
			  <?php endforeach; ?>
			  </ul>
	</div>
</div>
<?php endif; ?>
