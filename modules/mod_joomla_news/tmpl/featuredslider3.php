<?php
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
$document = JFactory::getDocument();
$document->addStyleSheet('modules/mod_joomla_news/assets/featuredslider3.css');
$document->addScript('modules/mod_joomla_news/assets/jquery-ui.min.js');
$document->addScriptDeclaration('
	jQuery(document).ready(function(){
		jQuery("#featured > ul").tabs({fx:{opacity: "toggle"}}).tabs("rotate", '.$fdoration.', '.$fauto.');
	});
');
$data	='0';
?>
<?php if (!empty($list)) :?>
<?php if($description >''): ?>
<h4><?php echo $description; ?></h4>
<?php endif; ?>

<div class="botslider">
	<div id="featured" >
			  <ul class="ui-tabs-nav hidden-phone">
			  <?php foreach( $list as $item ): ?>
				<?php
							$data	=($data+1);
				?>
				<li class="ui-tabs-nav-item <?php if($data==1){ ?>ui-tabs-selected<?php } ?>" id="nav-fragment-<?php echo $data; ?>" style="height:<?php echo ($height+3); ?>px">
					<a href="#fragment-<?php echo $data; ?>">
						<img src="<?php echo $item->thumb; ?>" alt="<?php echo ($item->text);?>" title="<?php echo ($item->text);?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>"  />
					</a>
				</li>
			  <?php endforeach; ?>
			  </ul>
			<?php
					$data	='0';
			?>
	
		<?php foreach( $list as $no => $item ): ?>
			<?php
						$data	=($data+1);
			?>
			<div id="fragment-<?php echo $data; ?>" class="ui-tabs-panel <?php if($data > 1){ ?>ui-tabs-hide<?php } ?>" style="">
				<?php if($item->photo > '0' and file_exists($item->photo)){ ?>
				<a href="<?php echo $item->link;?>"><img src="<?php echo $item->photo; ?>" alt="<?php echo ($item->text);?>" title="<?php echo ($item->text);?>" width="<?php echo $nwidth; ?>" height="<?php echo $nheight; ?>" /></a>
				<?php }else{ ?>
				<a href=""><img src="<?php echo JRoute::_(JUri::base() . 'modules/mod_joomla_news/assets/images/nophoto.png', false); ?>" alt="<?php echo ($item->text);?>" title="<?php echo ($item->text);?>" width="<?php echo $nwidth; ?>" height="<?php echo $nheight; ?>" /></a>
				<?php } ?>
				 <div class="info" >
					<h2><a href="<?php echo $item->link;?>" ><?php echo ($item->text);?></a></h2>
					<div><?php echo (strip_tags (mb_substr($item->desc,0,$maxcontent,'UTF-8'))); ?></div>
				 </div>
			</div>
		<?php endforeach; ?>	
	</div>
</div>
<?php endif; ?>
