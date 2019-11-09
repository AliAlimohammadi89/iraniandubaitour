<?php
// No direct access to this file
defined("_JEXEC") or die("Restricted Access");
// load tooltip behavior
	JHtml::_("behavior.tooltip");
	JHtml::_('behavior.modal','.modal');
	
	global $option,$compconfig;
	$css = JURI::root()."components/$option/css/css.css";
	JHtml::_("stylesheet",$css);
	$P = JURI :: root();
	?>
	<form action="<?php echo JRoute::_("index.php?option=$option"); ?>" method="post" name="adminForm" id="adminForm">
	<div id="j-sidebar-container" class="span2 mycontainer">
		<?php echo $this->sidebar; ?>
	</div>
	<div id="j-main-container" class="span10 mycontainer">
	<div id="tourismtourpanel">
	<?php
	$A = array("tour"=>"tours","tourorder"=>"tourorders","coment"=>"coments","turningpoint"=>"turningpoints","tourfeature"=>"tourfeatures","image"=>"images","help"=>"help","about"=>"about");
	foreach($A as $k=>$v){
		?>
	<div class="tourismtourIcon-wrapper">
		<div class="tourismtourIcon">
		<a href="index.php?option=<?php echo $option;?>&view=<?php echo $v;?>">
			<img src="<?php echo $P;?>components/<?php echo $option;?>/images/icon/<?php echo $k;?>.png">
			<span><?php echo JText::_($v);?></span>
		</a>
		</div>
	</div>
		<?php
	}
	?>
	</div>
	</div>
	</form>