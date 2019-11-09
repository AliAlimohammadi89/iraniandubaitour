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
		if (task == 'tour.cancel' || document.formvalidator.isValid(document.id('tour-form'))) {
			Joomla.submitform(task, document.getElementById('tour-form'));
		}
	}
	//==========================================
</script>
<form enctype="multipart/form-data" action="<?php echo JRoute::_('index.php?option=com_tourismtour&layout=edit&id='.(int) $this->item->id); ?>" method="post" name="adminForm" id="tour-form" class="form-validate">
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
                <div class="control-label"><?php echo $this->form->getLabel('fld_star'); ?></div>
                <div class="controls"><?php echo $this->form->getInput('fld_star'); ?></div>
            </div>
            <div class="control-group">
                <div class="control-label"><?php echo $this->form->getLabel('fld_count_person'); ?></div>
                <div class="controls"><?php echo $this->form->getInput('fld_count_person'); ?></div>
            </div>
            <div class="control-group">
                <div class="control-label"><?php echo $this->form->getLabel('fld_pic'); ?></div>
                <div class="controls"><?php echo $this->form->getInput('fld_pic'); ?></div>
            </div>
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('fld_price_total'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('fld_price_total'); ?></div>
			</div>	<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('fld_price'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('fld_price'); ?></div>
			</div>
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('fld_metadata'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('fld_metadata'); ?></div>
			</div>
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('fld_start_time'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('fld_start_time'); ?></div>
			</div>
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('fld_start_address'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('fld_start_address'); ?></div>
			</div>
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('fld_locationstart'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('fld_locationstart'); ?></div>
			</div>
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('fld_startdate'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('fld_startdate'); ?></div>
			</div>
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('fld_enddate'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('fld_enddate'); ?></div>
			</div>
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('fld_weekday'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('fld_weekday'); ?></div>
			</div>
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('fld_info'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('fld_info'); ?></div>
			</div>
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('fld_points'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('fld_points'); ?></div>
			</div>
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('fld_tourfeature'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('fld_tourfeature'); ?></div>
			</div>


		</div>




		<?php echo JHtml::_('bootstrap.endTab'); ?>
		<?php echo JHtml::_('bootstrap.endTabSet'); ?>
	</div>
	<input type="hidden" name="task" value="" />
	<?php echo JHtml::_('form.token'); ?>
	<?php echo $this->form->getInput('id'); ?>
	</form>
