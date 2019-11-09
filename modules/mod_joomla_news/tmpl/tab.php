<?php
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
$document = JFactory::getDocument();
$document->addStyleSheet('modules/mod_joomla_news/assets/tab.css');
$document->addScriptDeclaration('
	  jQuery(document).ready(function() {
	
		//Default Action
		jQuery(".tab_content'.$module->id.'").hide(); //Hide all content
		jQuery("ul.tabs'.$module->id.' li:first").addClass("active").show(); //Activate first tab
		jQuery(".tab_content'.$module->id.':first").show(); //Show first tab content
		
		//On Click Event
		jQuery("ul.tabs'.$module->id.' li").click(function() {
			jQuery("ul.tabs'.$module->id.' li").removeClass("active"); //Remove any "active" class
			jQuery(this).addClass("active"); //Add "active" class to selected tab
			jQuery(".tab_content'.$module->id.'").hide(); //Hide all tab content
			var activeTab = jQuery(this).find("a").attr("href"); //Find the rel attribute value to identify the active tab + content
			jQuery(activeTab).fadeIn(); //Fade in the active content
			return false;
		});
	
	  });
');
$data	='0';
?>
<?php if (!empty($list)) :?>
<?php if($description >''): ?>
<h4><?php echo $description; ?></h4>
<?php endif; ?>
<div class="containers">
   <ul class="tabs<?php echo $module->id; ?> span1">
      <?php
		// this is where you want to load your module position
		$mods='0';
		foreach($list as $item){
			$mods = $mods+1;
			echo '<li>
				<a href="#tab'.$mods.'" title="'.$item->text.'">
                   <div class="day">'.JHTML::_('date',$item->date,'d').'</div>
                   <div class="month">'.JHTML::_('date',$item->date,'M').'</div>
				</a>
			</li>';
		} 
	?>
  </ul>
  <div class="tab_container<?php echo $module->id; ?> span11">
      <?php
		// this is where you want to load your module position
		$mods='0';
		foreach($list as $item){
			$mods = $mods+1;
			echo '<div id="tab'.$mods.'" class="tab_content'.$module->id.'">';
			?>
            <div class="span6 photos">
            	<a href="<?php echo $item->link; ?>" title="<?php echo $item->text; ?>">
                  <img src="<?php echo  $item->thumb; ?>" alt="<?php echo $item->text; ?>" title="<?php echo $item->text; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" />
                  <h4><?php echo $item->text; ?></h4>
                </a>
            </div>
            <div class="span6 content">
            	<div>
                    <h4><?php echo $item->text; ?></h4>
                      <?php if($newlead=='1'): ?>
                      <div class="desc span12"><?php echo (strip_tags (mb_substr($item->desc,0,$maxcontent,'UTF-8'))); ?>...</div>
                      <?php endif; ?>
                      <?php if($newsdate=='1'): ?>
                      <div class="date span12 hidden-phone"><?php echo (JHTML::_('date',$item->date,'D d M Y')) ; ?></div>
                      <?php endif; ?>
                      <?php if($newsreadon=='1'): ?>
                      <div class="readon hidden-phone"><a href="<?php echo $item->link; ?>" title="<?php echo (strip_tags (mb_substr($item->text,0,$maxcontent,'UTF-8'))); ?>" class="btn"><?php echo JText::_('MOD_JOOMLA_NEWS_LABEL_READ_MORE') ?></a></div>
                      <?php endif; ?>
                </div>
            </div>
            <?php
			echo '</div>';
		} 
	?>
  </div>
</div>
<?php endif; ?>
