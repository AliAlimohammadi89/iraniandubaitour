<?php
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
//$document->addStyleSheet('modules/mod_joomla_news/assets/normalize.css');
$document->addStyleSheet('modules/mod_joomla_news/assets/layout.css');
$document->addScript('modules/mod_joomla_news/assets/jquery.mixitup.min.js');
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
$catid = $params->get('catid','0');
foreach ((array) $catid as $singleFile) : 
$counts=$counts+1;
endforeach;
?>
<?php if (!empty($list)) :?>
<?php if($description >''): ?>
<h4><?php echo $description; ?></h4>
<?php endif; ?>

<div class="container">
	<ul id="filters">
		<li><span class="filter active" data-filter="<?php $catid = $params->get('catid','0'); $data='0'; foreach ((array) $catid as $singleFile) : ?>.cat<?php echo $singleFile; $data=$data+1; if($data <=$counts-1){?>,<?php } endforeach;?>">All</span></li>
			<?php
			$catid = $params->get('catid','0');
			foreach ((array) $catid as $singleFile) : 
				?>
                <li><span class="filter" data-filter=".cat<?php echo $singleFile; ?>"><?php echo getJoomlaCategoryName($singleFile)->title; ?></span></li>
				<?php
			endforeach;
			?>
	</ul>
	
	<div id="portfoliolist">
	<?php foreach ($list as $item) : ?>
			<div class="portfolio cat<?php echo $item->catid; ?>" data-cat="cat<?php echo $item->catid; ?>"  style="height:<?php echo $height; ?>px;">
				<div class="portfolio-wrapper">	
					<a class="text-title" href="<?php echo $item->link; ?>">			
					<img src="<?php echo  $item->thumb; ?>" alt="" style="height:<?php echo $height; ?>px; width:<?php echo $width; ?>px;" />
					</a>
					<div class="label">
						<div class="label-text">
							<a class="text-title" href="<?php echo $item->link; ?>"><?php echo ($item->text); ?></a>
							<span class="text-category"><?php echo ($item->category); ?></span>
						</div>
						<div class="label-bg"></div>
					</div>
				</div>
			</div>				
	<?php endforeach; ?>
	</div>
</div>

<?php endif; ?>
