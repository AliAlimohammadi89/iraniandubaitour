<?php
defined('_JEXEC') or die;

class tourismtourModelimages extends JModelList{
	//==========================================
	public function __construct($config = array()){
		if (empty($config['filter_fields'])) {
			$config['filter_fields'] = array(
				'a.id',
				'alias',
				'fld_src',
				'a.fld_src',
				'fld_type',
				'a.fld_type',
				'fld_title',
				'a.fld_title', 
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
		$query->from("#__tourismtour_image AS a");
		
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
				$query->where("(a.`fld_src` LIKE $search OR a.`fld_type` LIKE $search OR a.`fld_title` LIKE $search)");
			}
		}
		$ordering_o = $this->getState('list.ordering', 'a.ordering');
		$query->order($db->escape($ordering_o).' '.$db->escape($this->getState('list.direction', 'ASC')));
		//echo "<P>".$db->replacePrefix( $query )."</P>";
		return $query;
	}
}
?>