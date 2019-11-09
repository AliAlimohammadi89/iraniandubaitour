<?php
/**
 * @copyright	Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
		echo "<pre>";
		print_r($_POST);
		echo "</pre>";
 */
// no direct access
defined('_JEXEC') or die;
	JHtml::_('formbehavior.chosen', 'select');
	global $option,$compconfig;
	$css = JURI::root()."components/$option/css/css.css";
	JHtml::_("stylesheet",$css);
	$listOrder	= $this->escape($this->state->get('list.ordering'));
	$listDirn	= $this->escape($this->state->get('list.direction'));
	$saveOrder	= $listOrder == 'a.ordering';
	if ($saveOrder)
	{
		$saveOrderingUrl = "index.php?option=$option&task=tourfeatures.saveOrderAjax&tmpl=component";
		JHtml::_('sortablelist.sortable', 'articleList', 'adminForm', strtolower($listDirn), $saveOrderingUrl);
	}
	$views = "tourfeature";
?>
<script language="javascript">
	//==========================================
	Joomla.submitbutton = function(pressbutton){
		if(pressbutton=="tourfeatures.delete"){
				if(!confirm("<?php echo tourismtourController::LoadMessageConfirmRemove(JText::_($views)); ?>"))
				return false;
		}
		Joomla.submitform(pressbutton, document.getElementById('adminForm'));
	}
	Joomla.orderTable = function()
	{
		table = document.getElementById("sortTable");
		direction = document.getElementById("directionTable");
		order = table.options[table.selectedIndex].value;
		if (order != '<?php echo $listOrder; ?>')
		{
			dirn = 'asc';
		}
		else
		{
			dirn = direction.options[direction.selectedIndex].value;
		}
		Joomla.tableOrdering(order, dirn, '');
	}
</script>
	<form enctype="multipart/form-data" action="<?php echo JRoute::_('index.php?option=com_tourismtour&view=tourfeatures'); ?>" method="post" name="adminForm" id="adminForm">
	<div id="j-sidebar-container" class="span2 mycontainer">
		<?php echo $this->sidebar; ?>
	</div>
	<div id="j-main-container" class="span10 mycontainer">
		<?php
		// Search tools bar
		echo JLayoutHelper::render('joomla.searchtools.default', array('view' => $this));
		?>
		<div class="clearfix"> </div>
		<table class="table table-striped" id="articleList">
			<thead>
				<tr>
					<th width="1%" class="nowrap center hidden-phone"><?php echo JHtml::_('searchtools.sort', '', 'a.ordering', $listDirn, $listOrder, null, 'asc', 'JGRID_HEADING_ORDERING', 'icon-menu-2'); ?></th>
					<th width="1%"><input type="checkbox" name="checkall-toggle" value="" title="<?php echo JText::_('JGLOBAL_CHECK_ALL'); ?>" onclick="Joomla.checkAll(this)" /></th>
					<th width="60"><?php echo JHtml::_('searchtools.sort','JSTATUS', 'a.published',$listDirn, $listOrder); ?></th>
					<th width="120"><?php echo JText::_("EDIT"); ?></th>
					<th><?php echo JHtml::_('searchtools.sort','tourfeature_fld_title', 'a.fld_title', $listDirn, $listOrder); ?></th>
					<th><?php echo JHtml::_('searchtools.sort','tourfeature_fld_icon', 'a.fld_icon', $listDirn, $listOrder); ?></th>
					<th width="60" class="center"><?php echo JHtml::_('searchtools.sort','JGRID_HEADING_ID', 'a.id', $listDirn, $listOrder); ?></th>
				</tr>
			</thead>
	
			<tfoot>
				<tr>
					<td colspan="20">
						<?php echo $this->pagination->getListFooter(); ?>
					</td>
				</tr>
			</tfoot>
			<tbody>
			<?php foreach ($this->items as $i => $item) :
				?>
				<tr class="row<?php echo $i % 2; ?>">
					<td class="order nowrap center hidden-phone">
					<?php
						$disableClassName = '';
						$disabledLabel	  = '';
						if (!$saveOrder) :
							$disabledLabel    = JText::_('JORDERINGDISABLED');
							$disableClassName = 'inactive tip-top';
						endif; ?>
						<span class="sortable-handler hasToolTip <?php echo $disableClassName?>" title="<?php echo $disabledLabel?>">
							<i class="icon-menu"></i>
						</span>
						<input type="text" style="display:none;" name="order[]" size="5"
							value="<?php echo $item->ordering;?>" class="width-20 text-area-order " />
					</td>
					<td class="center"><?php echo JHtml::_('grid.id', $i, $item->id); ?></td>
					<td class="center"><?php echo JHtml::_('jgrid.published', $item->published, $i, 'tourfeatures.', 1);?></td>
					<td>
						<a href="<?php echo JRoute::_('index.php?option=com_tourismtour&task=tourfeature.edit&id='.(int) $item->id); ?>"><?php echo JText::_("EDIT"); ?></a>
						<br />
						<small><?php echo $item->alias;?></small>
					</td>
					<td><?php echo $item->fld_title;?></td>
					<td><?php if($item->fld_icon){?><img src="<?php echo JURI::root().$item->fld_icon;?>" class="tinypic" /><?php } ?></td>
					<td class="center"><?php echo $item->id; ?></td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
		<div>
			<input type="hidden" name="task" value="" />
			<input type="hidden" name="boxchecked" value="0" />
			<?php echo JHtml::_('form.token'); ?>
		</div>
	
	</div>
	</form>
