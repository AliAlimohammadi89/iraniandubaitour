<?php
/**
 * @version     1.0.0
 * @package     com_mywork
 * @copyright   Copyright (C) 2013. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Alireza Balvardi <a.balvardi@gmail.com> - http://dima.ir
echo "<pre>";
print_r();
echo "</pre>";
die();
 */


// no direct access
	defined('_JEXEC') or die;
	global $app,$option;
//==========================================
	$css = "components/$option/css/user.css";
	JHtml::_("stylesheet",$css);
	$Rand = rand(11111,99999);
//==========================================
?>
	<?php if(count($this->items)) { ?>
	<?php if(($this->pagination->pagesTotal-1)>0) { ?>
    <div class="pagination">
        <span class="counter">
            <?php echo $this->pagination->getPagesCounter(); ?>
        </span>
        <?php echo $this->pagination->getPagesLinks(); ?>
    </div>
	<?php } ?>
<div id="product_view">
    <div class="grid-layout3">
	<?php foreach ($this->items as $item) {?>
			<div class="grid-col">
				<div class="grid-col_inner loadheight<?php echo $Rand;?>">
				
				
				<div class="h3"><a href="<?php echo JRoute::_("index.php?option=$option&view=turningpoints&id=" . $item->id); ?>"><?php echo $item->fld_name; ?></a></div>
				</div>
			</div>
	<?php } ?>
	</div>
</div>
	<?php if(($this->pagination->pagesTotal-1)>0) { ?>
    <div class="pagination">
        <span class="counter">
            <?php echo $this->pagination->getPagesCounter(); ?>
        </span>
        <?php echo $this->pagination->getPagesLinks(); ?>
    </div>
	<?php } ?>
	<script language="javascript">
		jQuery(document).ready(function() {
		var MaxHeight = 0;
		jQuery(".loadheight<?php echo $Rand;?>").each(function( index ) {
			var M = jQuery(this).height();
			if(M>MaxHeight)
				MaxHeight = M;
		});
		jQuery(".loadheight<?php echo $Rand;?>").css("height",MaxHeight);
		});
	</script>
	<?php } else {?>
	<h1><?php echo JText::_("NO_RECORD");?></h1>
	<?php } ?>
