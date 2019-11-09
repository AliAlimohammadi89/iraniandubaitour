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
		if (task == 'tourorder.cancel' || document.formvalidator.isValid(document.id('tourorder-form'))) {
			Joomla.submitform(task, document.getElementById('tourorder-form'));
		}
	}
	//==========================================
</script>
<form enctype="multipart/form-data" action="<?php echo JRoute::_('index.php?option=com_tourismtour&layout=edit&id='.(int) $this->item->id); ?>" method="post" name="adminForm" id="tourorder-form" class="form-validate">
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
				<div class="control-label"><?php echo $this->form->getLabel('fld_id_user'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('fld_id_user'); ?></div>
			</div>
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('fld_id_tour'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('fld_id_tour'); ?></div>
			</div>
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('fld_datetor'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('fld_datetor'); ?></div>
			</div>
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('fld_countofpersons'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('fld_countofpersons'); ?></div>
			</div>
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('fld_phonenumber2'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('fld_phonenumber2'); ?></div>
			</div>
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('fld_price_aed'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('fld_price_aed'); ?></div>
			</div>
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('fld_price_irr'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('fld_price_irr'); ?></div>
			</div>
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('fld_price_date'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('fld_price_date'); ?></div>
			</div>
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('fld_payment_number'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('fld_payment_number'); ?></div>
			</div>
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('fld_payment_price'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('fld_payment_price'); ?></div>
			</div>
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('fld_payment_status'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('fld_payment_status'); ?></div>
			</div>
		</div>
		<?php echo JHtml::_('bootstrap.endTab'); ?>
		<?php echo JHtml::_('bootstrap.endTabSet'); ?>
	</div>
	<input type="hidden" name="task" value="" />
	<?php echo JHtml::_('form.token'); ?>
	<?php echo $this->form->getInput('id'); ?>
	</form>
