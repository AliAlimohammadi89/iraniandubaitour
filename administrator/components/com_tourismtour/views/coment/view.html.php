<?php
// No direct access
defined('_JEXEC') or die;
/**
 * View to edit a coment.
 *
 * @since		1.5
 */
class tourismtourViewcoment extends JViewLegacy
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
		JToolBarHelper::title($isNew ? JText::_('ADD_coment') : JText::_('EDIT_coment'), 'coment.png');
		JToolBarHelper::apply('coment.apply');
		JToolBarHelper::save('coment.save');
		JToolBarHelper::save2new('coment.save2new');
		// If an existing item, can save to a copy.
		if (empty($this->item->id))  {
			JToolBarHelper::cancel('coment.cancel');
		}
		else {
			JToolBarHelper::cancel('coment.cancel', 'JTOOLBAR_CLOSE');
		}
	}
}
?>