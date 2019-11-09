<?php
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
$document = JFactory::getDocument();
$document->addStyleSheet('modules/mod_joomla_news/assets/featuredslider7.css');
$document->addScript('modules/mod_joomla_news/assets/jquery-ui.min.js');
$document->addScriptDeclaration('
	jQuery(document).ready(function(){
		jQuery("#featured'.$module->id.' > ul").tabs({fx:{opacity: "toggle"}}).tabs("rotate", '.$fdoration.', '.$fauto.');
	});
');
$data	='0';
?>
<?php if (!empty($list)) :?>
<?php if($description >''): ?>
<h4><?php echo $description; ?></h4>
<?php endif; ?>

<div class="superslider7" style="height:<?php echo $nheight; ?>px; overflow:hidden;">
	<div id="featured<?php echo $module->id; ?>" class="featured7 row-fluid">
	
		<?php foreach( $list as $no => $item ): ?>
			<?php
						$data	=($data+1);
			?>
			<div id="fragment5-<?php echo $data; ?>" class="ui-tabs-panel span8 <?php if($data > 1){ ?>ui-tabs-hide<?php } ?>" style="height:<?php echo $nheight; ?>px; overflow:hidden;"> 
				<img src="<?php echo $item->photo; ?>" alt="<?php echo ($item->text);?>" title="<?php echo ($item->text);?>" width="100%" height="<?php echo $nheight; ?>" style="min-height:<?php echo $nheight; ?>px;" />
				 <div class="info">
					<h2><a href="<?php echo $item->link;?>" ><?php echo ($item->text);?></a></h2>
					<div><?php echo (strip_tags (mb_substr($item->desc,0,$maxcontent,'UTF-8'))); ?></div>
				 </div>
			</div>
		<?php endforeach; ?>
			<?php
					$data	='0';
			?>
			  <ul class="ui-tabs-nav span4 hidden-phone">
			  <?php foreach( $list as $item ): ?>
				<?php
                    if($item->photo > '0' and file_exists($item->photo)){
                             $item->thumb='cache/dima/'.$module->id.'fs5_'.str_replace('/','_',$item->photo);
							if (file_exists($item->thumb)) {
							}else{
                            list($current_width, $current_height) = getimagesize(''. $item->photo);
                            $image = new SimpleImages();
                            $image->load(''. $item->photo);
                            $image->resize($width, $height);
                            $image->save($item->thumb);
							}
                    }
				?>
				<?php
							$data	=($data+1);
				?>
				<li class="ui-tabs-nav-item <?php if($data==1){ ?>ui-tabs-selected<?php } ?>" id="nav-fragment5-<?php echo $data; ?>">
					<a href="#fragment5-<?php echo $data; ?>">
						<?php if($item->photo > '0' and file_exists($item->photo)){ ?>
						<img src="<?php echo $item->thumb; ?>" alt="<?php echo ($item->text);?>" title="<?php echo ($item->text);?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" />
						<?php }else{ ?>
						<img src="<?php echo 'modules/mod_joomla_news/assets/images/nophoto.png'; ?>" alt="<?php echo ($item->text);?>" title="<?php echo ($item->text);?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" />
						<?php } ?>
                        <?php echo ($item->text);?>
					</a>
				</li>
			  <?php endforeach; ?>
			  </ul>
	</div>
</div>
<?php endif; ?>
