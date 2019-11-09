<?php
defined('_JEXEC') or die;

class tourismtourModelcoments extends JModelList{
	//==========================================
	public function __construct($config = array()){
		if (empty($config['filter_fields'])) {
			$config['filter_fields'] = array(
				'a.id',
				'fld_title',
				'a.fld_title',
				'fld_text',
				'a.fld_text',
				'fld_tour_id',
				'a.fld_tour_id',
				'fld_user_id',
				'a.fld_user_id', 
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
		$query->from("#__tourismtour_coment AS a");
		$query->select("tour.fld_title AS fld_tour_id");
		$query->join("LEFT", "#__tourismtour_tour AS tour ON tour.id = a.fld_tour_id");
		// Filter by Category
		$fld_tour_id = $this->state->get("filter.fld_tour_id");
		if (intval($fld_tour_id)){
        	$query->where("a.fld_tour_id = $fld_tour_id");
		}

		// Filter by published published
		$id = JRequest::getVar('id');
		if (is_numeric($id)) {
			$query->where('a.id = '.(int) $id);
		}

		$query->where('a.published = 1');
		// Filter by search in title
		$search = $this->getState('filter.search');
		if (!empty($search)) {
			if (stripos($search, 'id:') === 0) {
				$query->where('a.id = '.(int) substr($search, 3));
			} else {
				$search = $db->Quote('%'.$db->escape($search, true).'%');
				$query->where("(a.`fld_title` LIKE $search OR a.`fld_text` LIKE $search OR a.`fld_user_id` LIKE $search)");
			}
		}
		$ordering_o = $this->getState('list.ordering', 'a.ordering');
		$query->order($db->escape($ordering_o).' '.$db->escape($this->getState('list.direction', 'ASC')));
		//echo "<P>".$db->replacePrefix( $query )."</P>";
		return $query;
	}
}
?>