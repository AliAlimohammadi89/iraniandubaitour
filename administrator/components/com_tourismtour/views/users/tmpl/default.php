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
		$saveOrderingUrl = "index.php?option=$option&task=users.saveOrderAjax&tmpl=component";
		JHtml::_('sortablelist.sortable', 'articleList', 'adminForm', strtolower($listDirn), $saveOrderingUrl);
	}
	$views = "user";
?>
<script language="javascript">
	//==========================================
	Joomla.submitbutton = function(pressbutton){
		if(pressbutton=="users.delete"){
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
	<form enctype="multipart/form-data" action="<?php echo JRoute::_('index.php?option=com_tourismtour&view=users'); ?>" method="post" name="adminForm" id="adminForm">
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
 					<th width="1%"><input type="checkbox" name="checkall-toggle" value="" title="<?php echo JText::_('JGLOBAL_CHECK_ALL'); ?>" onclick="Joomla.checkAll(this)" /></th>
 					<th width="120"><?php echo JText::_("JSHOW"); ?></th>
                    <th><?php echo JHtml::_('searchtools.sort','user_name', 'a.name', $listDirn, $listOrder); ?></th>
                    <th><?php echo JText::_("TOURCOUNT"); ?></th>
					<th><?php echo JHtml::_('searchtools.sort','user_username', 'a.username', $listDirn, $listOrder); ?></th>
					<th><?php echo JHtml::_('searchtools.sort','user_email', 'a.email', $listDirn, $listOrder); ?></th>
					<th><?php echo JHtml::_('searchtools.sort','user_registerdate', 'a.registerdate', $listDirn, $listOrder); ?></th>
					<th><?php echo JHtml::_('searchtools.sort','user_lastvisitdate', 'a.lastvisitdate', $listDirn, $listOrder); ?></th>
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

					<td class="center"><?php echo JHtml::_('grid.id', $i, $item->id); ?></td>
 					<td>
						<a href="<?php echo JRoute::_('index.php?option=com_tourismtour&task=user.edit&id='.(int) $item->id); ?>"><?php echo JText::_("JSHOW"); ?></a>
						<br />
 					</td>
					<td><?php echo $item->name;?></td>
                    <td><?php echo $item->TOURCOUNT;?></td>

                    <td><?php echo $item->username;?></td>
					<td><?php echo $item->email;?></td>
					<td><?php echo $item->registerDate?JHtml::_("date",$item->registerDate,"Y/m/d"):"";?></td>
					<td><?php echo $item->lastvisitDate?JHtml::_("date",$item->lastvisitDate,"Y/m/d"):"";?></td>
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
