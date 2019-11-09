<?php
// No direct access.
defined('_JEXEC') or die;

/**
 * tour model.
 */
class tourismtourModeltour extends JModelAdmin
{
	protected $text_prefix = 'tour';
	//==========================================
	protected function canDelete($record){
		if (!empty($record->id))
		{
			return parent::canDelete($record);
		}
	}
	public function getTable($table = 'tour', $prefix = 'tourismtourTable', $config = array()){
		return JTable::getInstance($table, $prefix, $config);
	}
	//==========================================
	public function getForm($data = array(), $loadData = true){
		// Get the form.
		$form = $this->loadForm('com_tourismtour.tour', 'tour', array('control' => 'jform', 'load_data' => $loadData));
		if (empty($form))
		{
			return false;
		}
		return $form;



	}
	//==========================================
	protected function loadFormData(){
		// Check the session for previously entered form dat
		$data = JFactory::getApplication()->getUserState('com_tourismtour.edit.tour.data', array());
		if (empty($data))
		{
			$data = $this->getItem();
			// Prime some default values.
            $data->fld_points=explode(",", $data->fld_points);
            $data->fld_tourfeature=explode(",", $data->fld_tourfeature);
            $data->fld_weekday=explode(",", $data->fld_weekday);

            // print_r($data);
           // die;
		}

		return $data;
	}
	//==========================================
	function stick(&$pks, $value = 1){
		// Initialise variables.
		$table = $this->getTable();
		$pks = (array) $pks;
		// Access checks.
		foreach ($pks as $i => $pk)
		{
			if ($table->load($pk))
			{
				if (!$this->canEditState($table))
				{
					// Prune items that you can't change.
					unset($pks[$i]);
					JError::raiseWarning(403, JText::_('JLIB_APPLICATION_ERROR_EDITSTATE_NOT_PERMITTED'));
				}
			}
		}
		return true;
	}
	//==========================================
	protected function getReorderConditions($table){
		$condition = array();
		$condition[] = 'published >= 0';
		return $condition;
	}
	//==========================================
}
?>