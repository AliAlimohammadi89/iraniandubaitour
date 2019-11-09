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
		if (task == 'user.cancel' || document.formvalidator.isValid(document.id('user-form'))) {
			Joomla.submitform(task, document.getElementById('user-form'));
		}
	}
	//==========================================
</script>
<form enctype="multipart/form-data" action="<?php echo JRoute::_('index.php?option=com_tourismtour&layout=edit&id='.(int) $this->item->id); ?>" method="post" name="adminForm" id="user-form" class="form-validate">
	<?php echo JLayoutHelper::render('joomla.edit.title_alias', $this); ?>
<br>

        <div class="controls"> <a href="<?php echo JRoute::_('index.php?option=com_users&view=user&layout=edit&id='.(int)$this->item->id); ?>">

                <div class="btn apply btn-success ">
                    <span class="icon-save" aria-hidden="true"></span>
                <?php echo JText::_("SHOWMORUSER"); ?>
        </div>
            </a>

    </div>

    </br>




        <div class="form-horizontal">
		<?php echo JHtml::_('bootstrap.startTabSet', 'myTab', array('active' => 'details')); ?>
		<?php echo JHtml::_('bootstrap.addTab', 'myTab', 'details', JText::_('JDETAILS', true)); ?>
		<div class="row-fluid">

            <div class="control-group">
                <div class="control-label"><?php echo $this->form->getLabel('published'); ?></div>
                <div class="controls"><?php echo $this->form->getInput('published'); ?></div>
            </div>
						<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('username'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('username'); ?></div>
			</div>
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('email'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('email'); ?></div>
			</div>
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('registerdate'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('registerdate'); ?></div>
			</div>
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('lastvisitdate'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('lastvisitdate'); ?></div>
			</div>
		</div>
        <?php echo JHtml::_('bootstrap.endTab'); ?>

        <?php echo JHtml::_('bootstrap.addTab', 'myTab', 'RESERVEINFO', JText::_('RESERVEINFO', true)); ?>
        <form enctype="multipart/form-data" action="<?php echo JRoute::_('index.php?option=com_coffee&view=orders'); ?>" method="post" name="adminForm" id="adminForm">
            <div id="j-main-container" class="span12 mycontainer">
                <div class="clearfix"> </div>
                <table class="table table-striped" id="articleList">
                    <thead>
                    <tr>
                         <th class="center"><?php echo JText::_('jshow'); ?></th>
                         <th class="center"><?php echo JText::_('fld_phonenumber2'); ?></th>
                        <th class="center"><?php echo JText::_('fld_countofpersons'); ?></th>
                        <th class="center"><?php echo JText::_('fld_price_aed'); ?></th>
                        <th class="center"><?php echo JText::_('fld_price_irr'); ?></th>
                        <th class="center"> <?php echo JText::_('fld_price_date'); ?></th>
                        <th class="center"><?php echo JText::_('touristorTitle'); ?></th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <td colspan="20">
                        </td>
                    </tr>
                    </tfoot>
                    <tbody>
                    <?PHP
                    foreach ( $this->orderlist as $i=>$item):  ?>
                        <tr class="row<?php echo $i % 2; ?>">
                            <td>
                                <?php echo $item->touristorTitle; ?>  <br />
                                <a href="<?php echo JRoute::_('index.php?option=com_tourismtour&view=tour&layout=edit&id='.(int) $item->fld_id_tour); ?>"><?php echo JText::_("SHOWTOR"); ?></a>
                                </br>
                                <a href="<?php echo JRoute::_('index.php?option=com_tourismtour&view=tourorder&layout=edit&id='.(int) $item->id); ?>"><?php echo JText::_("SHOWMOR"); ?></a>
                            </td>
                            <td class="center"><?php echo $item->fld_phonenumber2?></td>
                            <td class="center"><?php echo $item->fld_countofpersons;?></td>
                            <td class="center"><?php echo $item->fld_price_aed; ?></td>
                            <td class="center"><?php echo $item->fld_price_irr; ?></td>
                            <td class="center"> <?php echo $item->fld_price_date?JHtml::_("date",$item->fld_price_date,"Y/m/d"):"";?></td>
                            <td class="center"><?php echo $item->touristorTitle; ?></td>
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




        <?php echo JHtml::_('bootstrap.endTab'); ?>
		<?php echo JHtml::_('bootstrap.endTabSet'); ?>
	</div>
	<input type="hidden" name="task" value="" />
	<?php echo JHtml::_('form.token'); ?>
	<?php echo $this->form->getInput('id'); ?>
	</form>
