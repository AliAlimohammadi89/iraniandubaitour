<?php
defined('_JEXEC') or die;

class tourismtourModeltourorders extends JModelList{
	//==========================================
	public function __construct($config = array()){
		if (empty($config['filter_fields'])) {
			$config['filter_fields'] = array(
				'a.id',
				'fld_id_user',
				'a.fld_id_user',
				'fld_id_tour',
				'a.fld_id_tour',
				'fld_datetor',
				'a.fld_datetor',
				'fld_countofpersons',
				'a.fld_countofpersons',
				'fld_phonenumber2',
				'a.fld_phonenumber2',
				'fld_price_aed',
				'a.fld_price_aed',
				'fld_price_irr',
				'a.fld_price_irr',
				'fld_price_date',
				'a.fld_price_date',
				'fld_payment_number',
				'a.fld_payment_number',
				'fld_payment_price',
				'a.fld_payment_price',
				'fld_payment_status',
				'a.fld_payment_status', 
				'a.published',
				'a.ordering'
			);
		}
		parent::__construct($config);
	}
	//==========================================
	protected function populateState($ordering = null, $direction = null){
		// Initialise variables.
		$app = JFactory::getApplication('administrator');
		// Load the filter published.
		$search = $this->getUserStateFromRequest($this->context.'.filter.search', 'filter_search');
		$this->setState('filter.search', $search);
		$published = $this->getUserStateFromRequest($this->context.'.filter.published', 'filter_published', '', 'string');
		$this->setState('filter.published', $published);
		// Load the parameters.
		$params = JComponentHelper::getParams('com_tourismtour');
		$this->setState('params', $params);
		// List published information.
		parent::populateState('a.id', 'asc');
	}
	//==========================================
	protected function getStoreId($id = ''){
		// Compile the store id.
		$id	.= ':'.$this->getState('filter.search');
		$id	.= ':'.$this->getState('filter.access');
		$id	.= ':'.$this->getState('filter.published');
		return parent::getStoreId($id);
	}
	//==========================================
	protected function getListQuery(){
		global $option;
		// Create a new query object.
		$db = $this->getDbo();
		$query = $db->getQuery(true);
		// Select the required fields from the table.
		$query->select(
			$this->getState(
				'list.select',
				'a.*'
			)
		);
		$query->from("#__tourismtour_tourorder AS a");
		$query->select("tour.fld_title AS fld_id_tour");
		$query->join("LEFT", "#__tourismtour_tour AS tour ON tour.id = a.fld_id_tour");
		// Filter by Category
		$fld_id_tour = $this->state->get("filter.fld_id_tour");
		if (intval($fld_id_tour)){
        	$query->where("a.fld_id_tour = $fld_id_tour");
		}
        $query->where("a.fld_payment_status = 1");

		// Filter by published published
		$id = JRequest::getVar('id');
		if (is_numeric($id)) {
			$query->where('a.id = '.(int) $id);
		}
        $user = JFactory::getUser();
		$query->where('a.fld_id_user = '.$user->id);
		// Filter by search in title
		$search = $this->getState('filter.search');
		if (!empty($search)) {
			if (stripos($search, 'id:') === 0) {
				$query->where('a.id = '.(int) substr($search, 3));
			} else {
				$search = $db->Quote('%'.$db->escape($search, true).'%');
				$query->where("(a.`fld_id_user` LIKE $search OR a.`fld_datetor` LIKE $search OR a.`fld_countofpersons` LIKE $search OR a.`fld_phonenumber2` LIKE $search OR a.`fld_price_aed` LIKE $search OR a.`fld_price_irr` LIKE $search OR a.`fld_price_date` LIKE $search OR a.`fld_payment_number` LIKE $search OR a.`fld_payment_price` LIKE $search OR a.`fld_payment_status` LIKE $search)");
			}
		}
		$ordering_o = $this->getState('list.ordering', 'a.ordering');
		$query->order($db->escape($ordering_o).' '.$db->escape($this->getState('list.direction', 'ASC')));
	//	 echo "<P>".$db->replacePrefix( $query )."</P>";
		return $query;
	}
}
?>