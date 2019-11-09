<?php
/*
*/

// No direct access
defined('_JEXEC') or die;

/**
 * @param	array	A named array
 * @return	array
 */
function tourismtourBuildRoute(&$query){
	$view = JRequest::getVar('view');
	if(isset($query['view'])){
	$app	= JFactory::getApplication();
	$menu	= $app->getMenu();
	$menuItem = $menu->getItems('link',"index.php?option=com_tourismtour&view=".$query['view']);
	if(count($menuItem)){
		$query['Itemid'] = $menuItem[0]->id;
		unset($query['view']);
	}
	}
	$segments = array();
    if(isset($query['limitstart'])){
		$query['start'] = $query['limitstart'];
		unset($query['limitstart']);
		}
	if (isset($query['view'])) {
		if(!stristr($view,$query['view']))
		$segments[] = $query['view'];
		unset($query['view']);
		unset($query['Itemid']);
	}
	if (isset($query['start'])) {
		$segments[] = 'start';
		$segments[] = $query['start'];
		unset($query['start']);
	}
	if (isset($query['type'])) {
		$segments[] = 'type';
		$segments[] = $query['type'];
		unset($query['type']);
	}
	if (isset($query['format'])) {
		$segments[] = 'format';
		$segments[] = $query['format'];
		unset($query['format']);
	}
	if (isset($query['tmpl'])) {
		$segments[] = 'tmpl';
		$segments[] = $query['tmpl'];
		unset($query['tmpl']);
	}
	if (isset($query['tpl'])) {
		$segments[] = 'tpl';
		$segments[] = $query['tpl'];
		unset($query['tpl']);
	}
	if (isset($query['id'])) {
		$segments[] = str_replace(array("."," "),array("~","_"),$query['id']);
		unset($query['id']);
	}
	if (isset($query['layout'])) {
		$segments[] = 'layout';
		$segments[] = $query['layout'];
		unset($query['layout']);
	}
	
	return $segments;
	}

/*
*/
function tourismtourParseRoute($segments){
	$app	= JFactory::getApplication();
	$menu	= $app->getMenu();
	$menuItem = $menu->getActive();
	$view = @$menuItem->query['view'];
	$vars = array();
	$count = count($segments);
	// view is always the first element of the array
	if($count==1){
		$segment = array_shift($segments) ;
		$vars['id'] = str_replace(array("~","_"),array("."," "),$segment);
	}
	else
	{
		while($count > 0)
		{
			$count--;
			$segment = array_shift($segments) ;
			if($segment=="start"){
				$count--;
				$segment = array_shift($segments) ;
				$vars['limitstart'] = $segment;
			}
			elseif($segment=="type"){
				$count--;
				$segment = array_shift($segments) ;
				$vars['type'] = $segment;
			}
			elseif($segment=="format"){
				$count--;
				$segment = array_shift($segments) ;
				$vars['format'] = $segment;
			}
			elseif($segment=="tmpl"){
				$count--;
				$segment = array_shift($segments) ;
				$vars['tmpl'] = $segment;
			}
			elseif($segment=="tpl"){
				$count--;
				$segment = array_shift($segments) ;
				$vars['tpl'] = $segment;
			}
			
			else{
				$vars['id'] = $segment;
			}
		}
	}
		$vars['view'] = $view;
		//============================= SQL Injection Attack
		$forbidden = array("'",'"'," OR "," AND ");
		foreach($vars as $k=>$v){
			$X = strtoupper($v);
			foreach($forbidden as $k1=>$v1){
				if(is_numeric(strpos($X,$v1)))
					$vars[$k] = str_replace($v1,"",$vars[$k]);
			}
		}
		//=============================
	return $vars;
	}
?>