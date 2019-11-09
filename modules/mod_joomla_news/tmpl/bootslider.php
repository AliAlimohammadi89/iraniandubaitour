<?php
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
$document = JFactory::getDocument();
$document->addStyleSheet('modules/mod_joomla_news/assets/boot_slider.css');
$document->addStyleSheet('modules/mod_joomla_news/assets/bootstrap.css');
$document->addScript('modules/mod_joomla_news/assets/boot_slider.js');
$document->addScriptDeclaration('
');
?>
<?php if (!empty($list)) :?>
<?php if($description >''): ?>
<h4><?php echo $description; ?></h4>
<?php endif; ?>

<div class="row2" id="boot_slider">
			<div class="col-xs-12 col-lg-12" id="slider_full">
				<div class="slider_nav col-xs-12 col-lg-12">
					<p id="slider_next"><i class="fa-arrow-circle-right fa"></i></p>
					<p id="slider_prev"><i class="fa-arrow-circle-left fa"></i></p>
				</div>
				<div class="col-xs-12 col-lg-12" id="slider_full_items">
				<?php foreach ($list as $item) : ?>
					<div class="col-xs-12 col-lg-12 slider_full_item">
						<div class="opacity"></div>
						<div class="img_large" style="background-image:url('<?php echo $item->photo; ?>');">
							<p class="text-center">
                            	<a href="<?php echo $item->link; ?>" title="<?php echo $item->text; ?>">
								<span><?php echo (strip_tags (mb_substr($item->text,0,$maxcontent,'UTF-8'))); ?></span>
								<span class="slider_full_desc"><?php echo (strip_tags (mb_substr($item->desc,0,$maxcontent,'UTF-8'))); ?></span>
                                </a>
							</p>
						</div>
					</div>
				<?php endforeach; ?>	
				</div>
				<div class="col-xs-12 col-lg-12" id="slider_loading"></div>
			</div>

			<div class="col-xs-12 col-lg-12" id="slider_items">
            	<?php foreach ($list as $item) : ?>
				<div class="col-xs-12 col-sm-<?php echo round(12/$inpage); ?>">
					<div class="slider_item_image" style="background-image:url('<?php echo  $item->thumb; ?>');">
						<div class="opacity"></div>
						<p><?php echo (strip_tags (mb_substr($item->text,0,$maxcontent,'UTF-8'))); ?></p>
					</div>
					
				</div>
				<?php endforeach; ?>
			</div>

		</div>
<?php endif; ?>
