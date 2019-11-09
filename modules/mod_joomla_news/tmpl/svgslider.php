
<?php
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
$document = JFactory::getDocument();
$document->addStyleSheet('modules/mod_joomla_news/assets/animated-svg-image-slider.css');
$document->addScript('modules/mod_joomla_news/assets/modernizr2.js');
$document->addScriptDeclaration('
');
$data	='0';
?>
<?php if (!empty($list)) :?>
<?php if($description >''): ?>
<h4><?php echo $description; ?></h4>
<?php endif; ?>

<div class="cd-slider-wrapper">
		<ul class="cd-slider" data-step1="M1402,800h-2V0h1c0.6,0,1,0.4,1,1V800z" data-step2="M1400,800H379L771.2,0H1399c0.6,0,1,0.4,1,1V800z" data-step3="M1400,800H0V0h1399c0.6,0,1,0.4,1,1V800z" data-step4="M-2,800h2V0h-1c-0.6,0-1,0.4-1,1V800z" data-step5="M0,800h1021L628.8,0L1,0C0.4,0,0,0.4,0,1L0,800z" data-step6="M0,800h1400V0L1,0C0.4,0,0,0.4,0,1L0,800z">
        <?php foreach( $list as $item ): ?>
                    <?php
							$data	=($data+1);
				?>
			<li <?php if($data=='1'): ?>class="visible"<?php endif; ?>>
				<div class="cd-svg-wrapper">
					<svg viewBox="0 0 1400 800">
						<title>Aimated SVG</title>
						<defs>
							<clipPath id="cd-image-1">
								<path id="cd-changing-path-1" d="M1400,800H0V0h1399c0.6,0,1,0.4,1,1V800z"/>
							</clipPath>
						</defs>
						
						<image height='800px' width="1400px" clip-path="url(#cd-image-1)" xlink:href="<?php echo $item->photo; ?>"></image>
					</svg>
				</div> <!-- .cd-svg-wrapper -->
			</li>
			<?php endforeach; ?>
		</ul> <!-- .cd-slider -->

		<ul class="cd-slider-navigation">
			<li><a href="#0" class="next-slide">Next</a></li>
			<li><a href="#0" class="prev-slide">Prev</a></li>
		</ul> <!-- .cd-slider-navigation -->

		<ol class="cd-slider-controls">
			  <?php foreach( $list as $item ): ?>
                    <?php
							$data	=($data+1);
				?>
			<li <?php if($data=='1'): ?>class="selected"<?php endif; ?>><a href="#0"><em><?php echo ($item->text);?></em></a></li>
			  <?php endforeach; ?>
		</ol> <!-- .cd-slider-controls -->
	</div>
<script src="modules/mod_joomla_news/assets/jquery.mobile.custom.min.js"></script>
<script src="modules/mod_joomla_news/assets/snap.svg-min.js"></script>
<script src="modules/mod_joomla_news/assets/main.js"></script>
<!-- Resource jQuery -->
<?php endif; ?>
