<?php
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
$document = JFactory::getDocument();
$document->addStyleSheet('modules/mod_joomla_news/assets/featuredslider.css');
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

<div class="fullslider row-fluid">
	<div id="featured" >
			  <ul class="ui-tabs-nav span3 hidden-phone">
			  <?php foreach( $list as $item ): ?>
				<?php
							$data	=($data+1);
				?>
				<li class="ui-tabs-nav-item span6 <?php if($data==1){ ?>ui-tabs-selected<?php } ?>" id="nav-fragment-<?php echo $data; ?>">
					<a href="#fragment-<?php echo $data; ?>">
						<img src="<?php echo $item->thumb; ?>" alt="<?php echo ($item->text);?>" title="<?php echo ($item->text);?>" width="<?php echo $width; ?>"  style="width:<?php echo $width; ?>px;  " />
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
			<div id="fragment-<?php echo $data; ?>" class="ui-tabs-panel span9 <?php if($data > 1){ ?>ui-tabs-hide<?php } ?>" style="">
				<img src="<?php echo $item->photo; ?>" alt="<?php echo ($item->text);?>" title="<?php echo ($item->text);?>" width="<?php echo $nwidth; ?>" height="<?php echo $nheight; ?>" />
			</div>
		<?php endforeach; ?>	
	</div>
</div>
<?php endif; ?>
