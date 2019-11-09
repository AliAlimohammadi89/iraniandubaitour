<?php
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
 //$document->addStyleSheet('modules/mod_joomla_item3/assets/normalize.css');
$document->addStyleSheet('modules/mod_joomla_item3/assets/layout.css');
$document->addScript('modules/mod_joomla_item3/assets/jquery.mixitup.min.js');
$document->addScriptDeclaration('
	jQuery(function () {	
		var filterList = {	
			init: function () {	
				// MixItUp plugin
				// http://mixitup.io
				jQuery(\'#portfoliolist\').mixItUp({
  				selectors: {
    			  target: \'.portfolio\',
    			  filter: \'.filter\'	
    		  }
			  });									
			}
		};	
		// Run the show!
		filterList.init();	
	});	
');
$counts='0';
$option='com_tourismtour';
 ?>
 <?php if($description >''): ?>
<h4><?php echo $description; ?></h4>
<?php endif;
?>
<div class="container">
	<div id="portfoliolist">
	<?php foreach ($list as $item) : ?>
			<div class="portfolio cat<?php echo $item->id; ?>" data-cat="cat<?php echo $item->id; ?>"  style="height:<?php echo $height; ?>px;">
				<div class="portfolio-wrapper">	
					<a class="text-title" href="<?php echo JRoute::_("index.php?option=$option&view=tourfeatures&id=" . $item->id); ?>">
					<img src="<?php echo  $item->fld_icon; ?>" alt="" style="height:<?php echo $height; ?>px; width:<?php echo $width; ?>px;" />
					</a>
					<div class="label">
						<div class="label-text">
                            <a href="<?php echo JRoute::_("index.php?option=$option&view=tourfeatures&id=" . $item->id); ?>">
                            <?php echo $item->fld_title; ?></a>
							<span class="text-category"><?php echo ($item->id); ?></span>
						</div>
						<div class="label-bg"></div>
					</div>
				</div>
			</div>				
	<?php endforeach; ?>
	</div>
</div>

