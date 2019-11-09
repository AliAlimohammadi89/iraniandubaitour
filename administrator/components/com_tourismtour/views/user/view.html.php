<?php
// No direct access
defined('_JEXEC') or die;
/**
 * View to edit a user.
 *
 * @since		1.5
 */
class tourismtourViewuser extends JViewLegacy
{
	protected $form;
	protected $item;
    protected $published;
    protected $orderlist;
	/**
	 * Display the view
	 */
	public function display($tpl = null){
		global $compconfig,$view,$option,$app;
		// Initialiase variables.
		$this->form		= $this->get('Form');
		$this->item		= $this->get('Item');
		$this->state	= $this->get('State');
        $this->orderlist = $this->order_list($this->item->id);

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
		JToolBarHelper::title($isNew ? JText::_('ADD_user') : JText::_('EDIT_user'), 'user.png');
		JToolBarHelper::apply('user.apply');
		JToolBarHelper::save('user.save');
		JToolBarHelper::save2new('user.save2new');
		// If an existing item, can save to a copy.
		if (empty($this->item->id))  {
			JToolBarHelper::cancel('user.cancel');
		}
		else {
			JToolBarHelper::cancel('user.cancel', 'JTOOLBAR_CLOSE');
		}
	}
    protected function order_list($id)
    {
        if ($id) {
            $db = JFactory::getDbo();
            $query = $db->getQuery(true);
            //		$data=$ali->select('nl26a_coffee_order',"id,fldfinalprice,published,flddate "," fldcustomerid=? AND fldusertype",$wherev);
            $query
                ->select(array('tourorder.*','touristor.id AS touristorID ','touristor.fld_title AS touristorTitle ' ))
                -> from ($db->quoteName('#__tourismtour_tourorder', 'tourorder'))
                ->join('LEFT', $db->quoteName('#__tourismtour_tour', 'touristor') . ' ON (' . $db->quoteName('touristor.id') . ' = ' . $db->quoteName('tourorder.fld_id_tour') . ')')
                ->where($db->quoteName('tourorder.fld_id_user') . " LIKE  $id ")
                ->order($db->quoteName('tourorder.id') . ' DESC');
            // Reset the query using our newly populated query object.
            $db->setQuery($query);
            // Load the results as a list of stdClass objects (see later for more options on retrieving data).
            $results = $db->loadObjectList();
          //  print "<pre>  ";
           //  echo "<P>".$db->replacePrefix( $query )."</P>";
           // print_r($results);
           // print "</pre>";
          //  die;
            return $results;
        } else
            return 0;

    }

}
?>