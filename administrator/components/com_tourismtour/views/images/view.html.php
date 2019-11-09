<?php
// No direct access
defined('_JEXEC') or die;
class tourismtourViewimages extends JViewLegacy
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
		
		//==========================================
		require_once JPATH_COMPONENT.'/helpers/tourismtour.php';
		JToolBarHelper::title(JText::_('images'), 'images.png');
		JToolBarHelper::addNew('image.add');
		JToolBarHelper::editList('image.edit');
		JToolBarHelper::publish('images.publish', 'JTOOLBAR_PUBLISH', true);
		JToolBarHelper::unpublish('images.unpublish', 'JTOOLBAR_UNPUBLISH', true);
		$published = $this->state->get( 'filter.published');
		if($published==-2)
		JToolBarHelper::deleteList('', 'images.delete', 'JTOOLBAR_EMPTY_TRASH');
		else
		JToolBarHelper::trash('images.trash');
	}
}
?>