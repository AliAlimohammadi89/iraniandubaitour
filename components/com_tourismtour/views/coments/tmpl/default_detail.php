<?php
	// no direct access
	defined('_JEXEC') or die;
	global $config,$option;
	$item = $this->items[0];
	$app = JFactory::getApplication();
	$pathway = $app->getPathway();
	$pathway->addItem ( $item->fld_title);
	$this->document->setTitle($item->fld_title);
	JHtml::_('behavior.modal','.modal');
//==========================================
	$css = "components/$option/css/detailuser.css";
	JHtml::_("stylesheet",$css);
//==========================================
?>
<div class="panel panel-default">
	<div class="panel-heading">
		<div class="row-fluid">
			<div class="span12">
				<div class="h3 panel-title"><?php echo $item->fld_title; ?></div>
			</div>
		</div>
	</div>
	<div class="panel-body">
		<div class="row-fluid">
						<div class="span3">
				
			</div>

			<div class="span9">
				<div class="margin5">
					
					<div><?php echo JText::_("coment_fld_title");?> : <?php echo $item->fld_title;?></div>
					<div><?php echo JText::_("coment_fld_text");?> : <?php echo $item->fld_text;?></div>
					<div><?php echo JText::_("coment_fld_tour_id");?> : <?php echo $item->fld_tour_id;?></div>
					<div><?php echo JText::_("coment_fld_user_id");?> : <?php echo $item->fld_user_id;?></div>
				</div>
			</div>
		</div>
	</div>
</div>