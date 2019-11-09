<?php
// No direct access
defined('_JEXEC') or die;
class tourismtourViewtours extends JViewLegacy
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



         // Initialiase variables.
        $this->form		= $this->get('Form');
        $this->item		= $this->get('Item');

		// Check for errors.
		if (count($errors = $this->get('Errors'))) {
			JError::raiseError(500, implode("\n", $errors));
			return false;
		}
		$id = JRequest::getVar('id');
        $pay = JRequest::getVar('pay');
        $ajax = JRequest::getVar('ajax');
        if(isset($ajax)){
            $tpl = "ajax";
    }
        elseif(count($this->items)==1 && $id){
			$tpl = "detail";
		}
        if(isset($pay)){
            $tpl = "pay";
            if($pay==2)
                $tpl="pay2";
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