<?php
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
$document = JFactory::getDocument();
$document->addStyleSheet('modules/mod_joomla_news/assets/edslider.css');
$document->addScript('modules/mod_joomla_news/assets/jquery.edslider.js');
$document->addScriptDeclaration('
		jQuery(document).ready(function(){
			//Call plugin
			jQuery(\'.mySlideshow\').edslider({
				width : \'100%\',
				height: 500
			});
		});
');
$data	='0';
?>
<style>
<?php foreach( $list as $no => $item ): ?>
<?php $data	=($data+1); ?>
.slide<?php echo $data; ?>{
	background:url(<?php echo $item->photo; ?>);
	-webkit-background-size: cover;
	-moz-background-size: cover;
	-o-background-size: cover;
	background-size: cover;
 }
<?php endforeach; ?>
</style>
<?php if (!empty($list)) :?>
<?php if($description >''): ?>
<h4><?php echo $description; ?></h4>
<?php endif; ?>

 <ul class="mySlideshow">
 			<?php $slide	='0'; ?>
 			<?php foreach( $list as $no => $item ): ?>
			<?php $slide	=($slide+1); ?>
			<li class="slide<?php echo $slide; ?>">
				<a href="<?php echo $item->link;?>" target="_blank" class="animated fadeInLeft hidden-phone links">
					<?php echo ($item->text);?>
				</a>
                <?php if(strip_tags (mb_substr($item->desc,0,$maxcontent,'UTF-8')) >'0'): ?>
					<?php if($newlead=='1'): ?>
                    <div class="animated fadeInRight hidden-phone"><?php echo (strip_tags (mb_substr($item->desc,0,$maxcontent,'UTF-8'))); ?></div>
                    <?php endif; ?>
                <?php endif; ?>
            	<?php if($newsreadon=='1'): ?>
                <a href="<?php echo $item->link; ?>" class="readons animated fadeInUp hidden-phone"><?php echo JText::_('MOD_JOOMLA_NEWS_LABEL_READ_MORE') ?></a>
                <?php endif; ?>
			</li>
            <?php endforeach; ?>
		</ul>       
<?php endif; ?>
