<?php
/**
 * @copyright	Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */
// no direct access
	defined('_JEXEC') or die;
	JHtml::addIncludePath(JPATH_COMPONENT.'/helpers/html');
	JHtml::_('behavior.tooltip');
	JHtml::_('formbehavior.chosen', 'select');
	JHtml::_('behavior.formvalidation');
	global $option,$view;
	$css = JURI::root()."components/$option/css/css.css";
	JHtml::_("stylesheet",$css);
?>
<script type="text/javascript">
	//==========================================
	Joomla.submitbutton = function(task){
		if (task == 'coment.cancel' || document.formvalidator.isValid(document.id('coment-form'))) {
			Joomla.submitform(task, document.getElementById('coment-form'));
		}
	}
	//==========================================
</script>
<form enctype="multipart/form-data" action="<?php echo JRoute::_('index.php?option=com_tourismtour&layout=edit&id='.(int) $this->item->id); ?>" method="post" name="adminForm" id="coment-form" class="form-validate">
	<?php echo JLayoutHelper::render('joomla.edit.title_alias', $this); ?>
	<div class="form-horizontal">
		<?php echo JHtml::_('bootstrap.startTabSet', 'myTab', array('active' => 'details')); ?>
		<?php echo JHtml::_('bootstrap.addTab', 'myTab', 'details', JText::_('JDETAILS', true)); ?>
		<div class="row-fluid">
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('published'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('published'); ?></div>
			</div>
						<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('fld_title'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('fld_title'); ?></div>
			</div>
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('fld_text'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('fld_text'); ?></div>
			</div>
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('fld_tour_id'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('fld_tour_id'); ?></div>
			</div>
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('fld_user_id'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('fld_user_id'); ?></div>
			</div>
		</div>
		<?php echo JHtml::_('bootstrap.endTab'); ?>
		<?php echo JHtml::_('bootstrap.endTabSet'); ?>
	</div>
	<input type="hidden" name="task" value="" />
	<?php echo JHtml::_('form.token'); ?>
	<?php echo $this->form->getInput('id'); ?>
	</form>
