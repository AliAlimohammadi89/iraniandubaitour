<?php
// No direct access
defined('_JEXEC') or die;
class tourismtourViewturningpoints extends JViewLegacy
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
		// Check for errors.
		if (count($errors = $this->get('Errors'))) {
			JError::raiseError(500, implode("\n", $errors));
			return false;
		}
		$id = JRequest::getVar('id');
        if(count($this->items)==1 && $id){
			$tpl = "detail";
		}
		$db = JFactory::getDBO();
		

		$menu = $app->getMenu()->getActive();
		$params = $menu->params;
		if ($params->get('menu-meta_description'))
		{
			$this->document->setDescription($params->get('menu-meta_description'));
		}

		if ($params->get('menu-meta_keywords'))
		{
			$this->document->setMetadata('keywords', $params->get('menu-meta_keywords'));
		}
		//==========================================
		parent::display($tpl);
	}
}
?>