<?php
// ensure this file is being included by a parent file
defined( '_JEXEC' ) or die( 'Restricted access' );
$params = JFactory::getApplication()->getTemplate(true)->params;

$app = JFactory::getApplication();
$doc = JFactory::getDocument();
$this->language = $doc->language;
$this->direction = $doc->direction;

// Add JavaScript Frameworks
JHtml::_('bootstrap.framework');
// Load optional RTL Bootstrap CSS
JHtml::_('bootstrap.loadCss', false, $this->direction);
$loading=$this->params->get("loading");
$doc->addScript('templates/' .$this->template. '/js/template.js');
$doc->addScript('templates/' .$this->template. '/js/wow.js');
$doc->addScript('templates/' .$this->template. '/js/parallax.js');
if($loading=='1'):
$doc->addScript('templates/' .$this->template. '/js/pace.min.js');
endif;
$doc->addScript('templates/' .$this->template. '/js/jquery.meanmenu.js');

// Add current user information
$user = JFactory::getUser();

// Add Stylesheets
$doc->addStyleSheet('templates/'.$this->template.'/css/template_css.css');
$doc->addStyleSheet('templates/'.$this->template.'/css/joomla.css');
$doc->addStyleSheet('templates/'.$this->template.'/css/typography.css');
$doc->addStyleSheet('templates/'.$this->template.'/css/form.css');
$doc->addStyleSheet('templates/'.$this->template.'/css/animation.css');
$doc->addStyleSheet('templates/'.$this->template.'/css/dima_icon.css');
$doc->addStyleSheet('templates/'.$this->template.'/css/bootstrap-responsive_rtl.css');
$sitename = $app->getCfg('sitename');
$MetaDesc = $app->getCfg('MetaDesc');
$MetaKeys = $app->getCfg('MetaKeys');
$option   = $app->input->getCmd('option', '');
$layout   = $app->input->getCmd('layout', '');
$task     = $app->input->getCmd('task', '');
$itemid   = $app->input->getCmd('Itemid', '');
$view     = $app->input->getCmd('view', '');
$logo     = $this->params->get('logo');
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head profile="http://dublincore.org/documents/2008/08/04/dc-html/">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta property="og:locale" content="<?php echo $this->language; ?>" />
<meta property="og:type" content="website" />
<meta property="og:title" content="<?php echo $doc->getTitle(); ?>" />
<meta property="og:description" content="<?php echo $MetaDesc; ?>" />
<meta property="og:site_name" content="<?php echo $sitename; ?>" />
<meta property="og:image" content="<?php echo $logo; ?>" />
<meta name="twitter:card" content="summary_large_image"/>
<meta name="twitter:description" content="<?php echo $MetaKeys; ?>"/>
<meta name="twitter:title" content="<?php echo $doc->getTitle(); ?>"/>
<meta name="twitter:domain" content="<?php echo $sitename; ?>"/>
<meta name="twitter:image" content="<?php echo $logo; ?>"/>
<link rel="schema.DC" href="http://purl.org/dc/elements/1.1/" />
<meta name="DC.Title" content="<?php echo $doc->getTitle(); ?>" />
<meta name="DC.Creator" content="<?php echo $sitename; ?>" />
<meta name="DC.Subject" content="<?php echo $doc->getTitle(); ?>" />
<meta name="DC.Description" content="<?php echo $MetaDesc; ?>" />
<meta name="DC.Publisher" content="<?php echo $sitename; ?>" />
<meta name="DC.Contributor" content="<?php echo $sitename; ?>" />
<meta name="DC.Date" content="2015" />
<meta name="DC.Language" content="<?php echo $this->language; ?>" />
<jdoc:include type="head" />
<script type="text/javascript">
jQuery(document).on("scroll",function(){
	if(jQuery(document).scrollTop()>100){ 
		jQuery("header").removeClass("large").addClass("medium");
	}
else{
		jQuery("header").removeClass("medium").addClass("large");
	}
});
jQuery(document).ready(function(){
	// hide #back-top first
	jQuery("#back-top").hide();
	
	// fade in #back-top
	jQuery(function () {
		jQuery(window).scroll(function () {
			if (jQuery(this).scrollTop() > 100) {
				jQuery('#back-top').fadeIn();
			} else {
				jQuery('#back-top').fadeOut();
			}
		});

		// scroll body to 0px on click
		jQuery('#back-top a').click(function () {
			jQuery('body,html').animate({
				scrollTop: 0
			}, 800);
			return false;
		});
	});

});

</script>
</head>
<body>
<div class="center">
<div class="dima_wrapper <?php if($view=='featured'):?><?php else: ?>inpage<?php endif; ?>">
	<div id="dima">
		<header class="row-fluid dima_1_wrapper large wow fadeIn">
			<div id="dima_1">
				<!--<div class="span1 dima_1_1_wrapper">-->
            	<div class="span1  ">
					<div id="dima_1_1">
						<div class="logo"><a href="."><img src="<?php echo $logo; ?>" alt="<?php echo $sitename; ?>" title="<?php echo $sitename; ?>" border="0" /></a></div>
					</div>
				</div>
				<div class="span11   ">
					<nav id="dima_1_2">
						<jdoc:include type="modules" name="menu" />
					</nav>
				</div>
				<!--<div class="span1 dima_1_3_wrapper">-->
				<!--	<div id="dima_1_3">-->
				<!--		<jdoc:include type="modules" name="user" />-->
				<!--	</div>-->
				<!--</div>-->
				<!--<div class="span2 dima_1_4_wrapper">-->
				<!--	<div id="dima_1_4">-->
				<!--		<jdoc:include type="modules" name="phone" />-->
				<!--	</div>-->
				<!--</div>-->
			</div>
		</header>
        <?php if($this->countModules("slider")) : ?>
		<section class="row-fluid dima_2_wrapper wow fadeIn">
			<div id="dima_2">
				<div class="span12 dima_2_1_wrapper">
					<div id="dima_2_1">
						<jdoc:include type="modules" name="slider" />
					</div>
				</div>
			</div>
		</section>
        <?php endif; ?>
        <?php if($this->countModules("reserve")) : ?>
		<section class="row-fluid dima_3_wrapper wow fadeIn">
			<div id="dima_3">
				<div class="span12 dima_3_1_wrapper">
					<div id="dima_3_1">
						<jdoc:include type="modules" name="reserve" style="xhtml" />
					</div>
				</div>
			</div>
		</section>
        <?php endif; ?>
        <?php if($view=='featured'):?>
        <?php if($this->countModules("component")) : ?>
		<section class="row-fluid dima_4_wrapper wow fadeIn">
			<div id="dima_4">
				<div class="span12 dima_4_1_wrapper">
					<div id="dima_4_1">
						<jdoc:include type="modules" name="component" style="xhtml" />
					</div>
				</div>
			</div>
		</section>
        <?php endif; ?>
        <?php else: ?>
		<section class="row-fluid dima_4_wrapper wow fadeIn">
			<div id="dima_4">
				<div class="span12 dima_4_1_wrapper">
					<div id="dima_4_1">
						<div class="breadcrumbs"><jdoc:include type="modules" name="position-2" /></div>
                        <div class="pm"><jdoc:include type="message" /></div>
                        <main class="component"><jdoc:include type="component" /></main>
					</div>
				</div>
			</div>
		</section>
        <?php endif; ?>
        <?php if($this->countModules("user1 or user2")) : ?>
		<section class="row-fluid dima_5_wrapper wow fadeIn" style="position:sticky ">
			<div id="dima_5">
				<div class="span3 dima_5_1_wrapper">
					<div id="dima_5_1">
						<jdoc:include type="modules" name="user1" />
					</div>
				</div>
				<div class="span3 dima_5_2_wrapper">
					<div id="dima_5_2">
						<jdoc:include type="modules" name="user2" />
					</div>
				</div>
				<div class="span3 dima_5_3_wrapper">
					<div id="dima_5_3">
						<jdoc:include type="modules" name="user3" />
					</div>
				</div>
				<div class="span3 dima_5_4_wrapper">
					<div id="dima_5_4">
						<jdoc:include type="modules" name="user4" />
					</div>
				</div>
			</div>
		</section>
        <?php endif; ?>
        <?php if($this->countModules("order")) : ?>
		<section class="row-fluid dima_6_wrapper wow fadeIn">
			<div id="dima_6">
				<div class="span12 dima_6_1_wrapper">
					<div id="dima_6_1">
						<jdoc:include type="modules" name="order" style="xhtml" />
					</div>
				</div>
			</div>
		</section>
        <?php endif; ?>
        <?php if($this->countModules("bottom1 or bottom2")) : ?>
		<section class="row-fluid dima_7_wrapper wow fadeIn">
			<div id="dima_7">
                <h3> دسترسی سریع هتل ها</h3>
				<div class="span3 dima_7_1_wrapper">
					<div id="dima_7_1">
						<jdoc:include type="modules" name="bottom1" style="xhtml" />
					</div>
				</div>
				<div class="span3 dima_7_2_wrapper">
					<div id="dima_7_2">
						<jdoc:include type="modules" name="bottom2" style="xhtml" />
					</div>
				</div>
				<div class="span3 dima_7_3_wrapper">
					<div id="dima_7_3">
						<jdoc:include type="modules" name="bottom3" style="xhtml" />
					</div>
				</div>
				<div class="span3 dima_7_4_wrapper">
					<div id="dima_7_4">
						<jdoc:include type="modules" name="bottom4" style="xhtml" />
					</div>
				</div>
			</div>
		</section>
        <?php endif; ?>
        <?php if($this->countModules("footer1 or footer2")) : ?>
		<section class="row-fluid dima_8_wrapper wow fadeIn">
			<div id="dima_8">
				<div class="span2 dima_8_1_wrapper">
					<div id="dima_8_1">
						<jdoc:include type="modules" name="footer1" style="xhtml" />
					</div>
				</div>
				<div class="span2 dima_8_2_wrapper">
					<div id="dima_8_2">
						<jdoc:include type="modules" name="footer2" style="xhtml" />
					</div>
				</div>
				<div class="span2 dima_8_3_wrapper">
					<div id="dima_8_3">
						<jdoc:include type="modules" name="footer3" style="xhtml" />
					</div>
				</div>
				<div class="span2 dima_8_4_wrapper">
					<div id="dima_8_4">
						<jdoc:include type="modules" name="footer4" style="xhtml" />
					</div>
				</div>
				<div class="span4 dima_8_5_wrapper" style="
    color: black !important;
">
					<div id="dima_8_5" style="  color:  black !important;">
<script src="http://www.tgju.org/webservice/global/snippet-loader.php?token=webservice&items=ons,mesghal,sekeb,bourse,price_dollar_rl,price_aed&opts=diff,low,high,time&placeholder=tgju-data"></script><div id="tgju-data"></div><style>body #tgju table.data-table thead th,body .tgju-copyright{background-color: #000000 !important;}body #tgju table.data-table thead th,body .tgju-copyright{color: #f7f7f7 !important;}body #tgju table.data-table{border-color: #000000 !important;}</style>				
			</div>
		</section>
        <?php endif; ?>
		<section class="row-fluid dima_9_wrapper">
			<div id="dima_9">
				<div class="span9 dima_9_1_wrapper">
					<div id="dima_9_1">
						<jdoc:include type="modules" name="footer" />	
					</div>
				</div>
				<div class="span3 dima_9_2_wrapper">
					<div id="dima_9_2">
						<div class="social">
							<ul>
								<li><a href="<?php echo $this->params->get("social1");?>" class="icon-facebook" title="facebook"></a></li>
								<li><a href="<?php echo $this->params->get("social2");?>" class="icon-twitter" title="twitter"></a></li>
								<li><a href="<?php echo $this->params->get("social3");?>" class="icon-google" title="google"></a></li>
								<li><a href="<?php echo $this->params->get("social4");?>" class="icon-rss" title="rss"></a></li>
								<li><a href="<?php echo $this->params->get("social5");?>" class="icon-instagram" title="instagram"></a></li>
								<li><a href="<?php echo $this->params->get("social6");?>" class="icon-paper-plane-1" title="telegram"></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
</div>
<div class="clear">Template Design:<a href="http://www.dima.ir" target="_blank">Dima Group</a></div>
<p id="back-top">
	<a href="#top" title="<?php echo $this->params->get("backtp");?>"><span class="icon-up-open-1"></span></a>
</p>
</div>
<script type="text/javascript">
jQuery(document).ready(function () {
    jQuery('header nav').meanmenu();
});
    wow = new WOW(
      {
        animateClass: 'animated',
        offset:       100
      }
    );
    wow.init();
</script>
</body>
</html>
