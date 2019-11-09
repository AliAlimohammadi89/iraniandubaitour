<?php
// No direct access
defined('_JEXEC') or die;
/**
 * View to edit a tourfeature.
 *
 * @since		1.5
 */
class tourismtourViewtourfeature extends JViewLegacy
{
	protected $form;
	protected $item;
	protected $published;
	/**
	 * Display the view
	 */
	public function display($tpl = null){
		global $compconfig,$view,$option,$app;
		// Initialiase variables.
		$this->form		= $this->get('Form');
		$this->item		= $this->get('Item');
		$this->state	= $this->get('State');
		// Check for errors.
		if (count($errors = $this->get('Errors'))) {
			JError::raiseError(500, implode("\n", $errors));
			return false;
		}
		$this->addToolbar();
		parent::display($tpl);
	}
	/**
	 * Add the page title and toolbar.
	 */
	protected function addToolbar(){
		JRequest::setVar('hidemainmenu', true);
		$isNew		= ($this->item->id == 0);
		JToolBarHelper::title($isNew ? JText::_('ADD_tourfeature') : JText::_('EDIT_tourfeature'), 'tourfeature.png');
		JToolBarHelper::apply('tourfeature.apply');
		JToolBarHelper::save('tourfeature.save');
		JToolBarHelper::save2new('tourfeature.save2new');
		// If an existing item, can save to a copy.
		if (empty($this->item->id))  {
			JToolBarHelper::cancel('tourfeature.cancel');
		}
		else {
			JToolBarHelper::cancel('tourfeature.cancel', 'JTOOLBAR_CLOSE');
		}
	}
}
?>