<?php
defined('_JEXEC') or die;

class tourismtourModeltours extends JModelList{
	//==========================================
	public function __construct($config = array()){
		if (empty($config['filter_fields'])) {
			$config['filter_fields'] = array(
				'a.id',
				'alias',
				'fld_title',
				'a.fld_title',
				'fld_price',
				'a.fld_price',
				'fld_metadata',
				'a.fld_metadata',
				'fld_start_time',
				'a.fld_start_time',
				'fld_start_address',
				'a.fld_start_address',
				'fld_locationstart',
				'a.fld_locationstart',
				'fld_startdate',
				'a.fld_startdate',
				'fld_enddate',
				'a.fld_enddate',
				'fld_weekday',
				'a.fld_weekday',
				'fld_create_time',
				'a.fld_create_time',
				'fld_info',
				'a.fld_info',
				'fld_points',
				'a.fld_points',
				'fld_tourfeature',
				'a.fld_tourfeature', 
				'published',
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
		$query->from("#__tourismtour_tour AS a");
		$query->select("tourfeature.fld_title AS fld_tourfeature");
		$query->join("LEFT", "#__tourismtour_tourfeature AS tourfeature ON tourfeature.id = a.fld_tourfeature");
		// Filter by Category
		$fld_tourfeature = $this->state->get("filter.fld_tourfeature");
		if (intval($fld_tourfeature)){
        	$query->where("a.fld_tourfeature = $fld_tourfeature");
		}
$query->select("turningpoint.fld_name AS fld_points");
		$query->join("LEFT", "#__tourismtour_turningpoint AS turningpoint ON turningpoint.id = a.fld_points");
		// Filter by Category
		$fld_points = $this->state->get("filter.fld_points");
		if (intval($fld_points)){
        	$query->where("a.fld_points = $fld_points");
		}

		// Filter by published published
		$published = $this->getState('filter.published');
		if (is_numeric($published)) {
			$query->where('a.published = '.(int) $published);
		}
		else
			$query->where('a.published >= 0');
		// Filter by search in title
		$search = $this->getState('filter.search');
		if (!empty($search)) {
			if (stripos($search, 'id:') === 0) {
				$query->where('a.id = '.(int) substr($search, 3));
			} else {
				$search = $db->Quote('%'.$db->escape($search, true).'%');
				$query->where("(a.`fld_title` LIKE $search OR a.`fld_price` LIKE $search OR a.`fld_metadata` LIKE $search OR a.`fld_start_time` LIKE $search OR a.`fld_start_address` LIKE $search OR a.`fld_locationstart` LIKE $search OR a.`fld_startdate` LIKE $search OR a.`fld_enddate` LIKE $search OR a.`fld_weekday` LIKE $search OR a.`fld_create_time` LIKE $search OR a.`fld_info` LIKE $search)");
			}
		}
		$ordering_o = $this->getState('list.ordering', 'a.ordering');
		$query->order($db->escape($ordering_o).' '.$db->escape($this->getState('list.direction', 'ASC')));
		//echo "<P>".$db->replacePrefix( $query )."</P>";
		return $query;
	}
}
?>