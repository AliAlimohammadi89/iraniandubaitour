<?php
// No direct access
defined('_JEXEC') or die;
class tourismtourViewcoments extends JViewLegacy
{
	protected $items;
	protected $pagination;
	protected $published;
	/**
	 * Display the view
	 */
	public function display($tpl = null){
		global $compconfig,$view,$option,$app;
		// Initialise variables.
		$this->items		= $this->get('Items');
		$this->pagination	= $this->get('Pagination');
		$this->state	= $this->get('State');
		$this->filterForm    = $this->get('FilterForm');
		$this->activeFilters = $this->get('ActiveFilters');
		// Check for errors.
		if (count($errors = $this->get('Errors'))) {
			JError::raiseError(500, implode("\n", $errors));
			return false;
		}
		$this->addToolbar();
 		$this->sidebar = JHtmlSidebar::render();
		parent::display($tpl);
	}
	/**
	 * Add the page title and toolbar.
	 */
	protected function addToolbar(){
		global $option;
		$db = JFactory::getDBO();
		
		//=========================================================
		$IDS = array(0);
		foreach($this->items as $k=>$v){
			$IDS[] = $v->fld_user_id;
		}
		$query = "SELECT `id`, `username` FROM `#__users` WHERE `id` IN(".implode(",",$IDS).")";
		$db->setQuery($query);
		$O = $db->loadObjectList();
		$userid = array();
		foreach($O as $v)
			$userid[$v->id] = $v->username;
		$this->userid = $userid;
									
		//==========================================
		require_once JPATH_COMPONENT.'/helpers/tourismtour.php';
		JToolBarHelper::title(JText::_('coments'), 'coments.png');
		JToolBarHelper::addNew('coment.add');
		JToolBarHelper::editList('coment.edit');
		JToolBarHelper::publish('coments.publish', 'JTOOLBAR_PUBLISH', true);
		JToolBarHelper::unpublish('coments.unpublish', 'JTOOLBAR_UNPUBLISH', true);
		$published = $this->state->get( 'filter.published');
		if($published==-2)
		JToolBarHelper::deleteList('', 'coments.delete', 'JTOOLBAR_EMPTY_TRASH');
		else
		JToolBarHelper::trash('coments.trash');
	}
}
?>