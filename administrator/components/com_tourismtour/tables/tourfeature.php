<?php
// No direct access.
defined('_JEXEC') or die;
/**
 * tourfeature table
 *
 * @since		1.5
 */
class tourismtourTabletourfeature extends JTable
{
	//==========================================
	function __construct(&$_db){
		global $option;
		parent::__construct("#__tourismtour_tourfeature",'id', $_db);
		$date = JFactory::getDate();
	}
	//==========================================
	function check(){
		if (empty($this->alias))
		{
			$this->alias = date("Y-m-d H:i:s");
		}
		$this->alias = JApplication::stringURLSafe($this->alias);
		// Set ordering
		if ($this->published < 0) {
			// Set ordering to 0 if published is archived or trashed
			$this->ordering = 0;
		} elseif (empty($this->ordering)) {
			// Set ordering to last if ordering was 0
			$this->ordering = self::getNextOrder('published>=0');
		}
		return true;
	}
	//==========================================
	public function bind($array, $ignore = array()){
		return parent::bind($array, $ignore);
	}
	//==========================================
	function store($updateNulls = false){
		if (empty($this->id))
		{
			// Store the row
			parent::store($updateNulls);
		}
		else
		{
			// Get the old row
			$oldrow = JTable::getInstance('tourfeature', 'tourismtourTable');
			if (!$oldrow->load($this->id) && $oldrow->getError())
			{
				$this->setError($oldrow->getError());
			}
			$table = JTable::getInstance('tourfeature', 'tourismtourTable');
			// Store the new row
			parent::store($updateNulls);
		}
		return count($this->getErrors())==0;
	}
	/**
	 *
	 * @param	mixed	An optional array of primary tourfeature values to update.  If not
	 */
	public function publish($pks = null, $published = 1, $userId = 0){
		// Initialise variables.
		$k = $this->_tbl_key;
		// Sanitize input.
		JArrayHelper::toInteger($pks);
		$published  = (int) $published;
		// If there are no primary tourfeatures set check to see if the instance tourfeature is set.
		if (empty($pks))
		{
			if ($this->$k) {
				$pks = array($this->$k);
			}
			// Nothing to set publishing published on, return false.
			else {
				$this->setError(JText::_('JLIB_DATABASE_ERROR_NO_ROWS_SELECTED'));
				return false;
			}
		}
		// Get an instance of the table
		$table = JTable::getInstance('tourfeature', 'tourismtourTable');
		// For all tourfeatures
		foreach ($pks as $pk)
		{
			// Load the banner
			if(!$table->load($pk))
			{
				$this->setError($table->getError());
			}
			// Change the state
			$table->published = $published;
			// Check the row
			$table->check();
			// Store the row
			if (!$table->store())
			{
				$this->setError($table->getError());
			}
		}
		return count($this->getErrors())==0;
	}
	/**
	 *
	 * @param	mixed	An optional array of primary tourfeature values to update.  If not
	 */
	//==========================================
	public function stick($pks = null, $published = 1, $userId = 0){
		// Initialise variables.
		$k = $this->_tbl_key;
		// Sanitize input.
		JArrayHelper::toInteger($pks);
		$published  = (int) $published;
		// If there are no primary tourfeatures set check to see if the instance tourfeature is set.
		if (empty($pks))
		{
			if ($this->$k) {
				$pks = array($this->$k);
			}
			// Nothing to set publishing published on, return false.
			else {
				$this->setError(JText::_('JLIB_DATABASE_ERROR_NO_ROWS_SELECTED'));
				return false;
			}
		}
		// Get an instance of the table
		$table = JTable::getInstance('tourfeature', 'tourismtourTable');
		// For all tourfeatures
		foreach ($pks as $pk)
		{
			// Load the tourfeature
			if(!$table->load($pk))
			{
				$this->setError($table->getError());
			}
			// Verify checkout
			if($table->checked_out==0 || $table->checked_out==$userId)
			{
				// Change the published
				$table->sticky = $published;
				// Check the row
				$table->check();
				// Store the row
				if (!$table->store())
				{
					$this->setError($table->getError());
				}
			}
		}
		return count($this->getErrors())==0;
	}
	//==========================================
	public function delete($pk = null){
		global $option;
		// Initialise variables.
		$k = $this->_tbl_key;
		$pk = (is_null($pk)) ? $this->$k : $pk;
		// If no primary key is given, return false.
		if ($pk === null)
		{
			$e = new JException(JText::_('JLIB_DATABASE_ERROR_NULL_PRIMARY_KEY'));
			$this->setError($e);
			return false;
		}
		// Delete the row by primary key.
		$query = $this->_db->getQuery(true);
		$query->delete();
		$query->from($this->_tbl);
		$query->where($this->_tbl_key . ' = ' . $this->_db->quote($pk));
		$this->_db->setQuery($query);
		// Check for a db error.
		if (!$this->_db->query())
		{
			$e = new JException(JText::sprintf('JLIB_DATABASE_ERROR_DELETE_FAILED', get_class($this), $this->_db->getErrorMsg()));
			$this->setError($e);
			return false;
		}
		return true;
	}
}
?>