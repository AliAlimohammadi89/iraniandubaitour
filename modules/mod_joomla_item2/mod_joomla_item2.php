<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_joomla_item2
 *
 * @copyright   Copyright (C) 2005 - 2013 Dima Group, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
defined('_JEXEC') or die;
 
$count=$params->def('count', 5);
$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'));
$params->def('catid', 0);
$params->def('featured', 0);
$params->def('ordering', 'start');
$params->def('chinesh', 'DESC');
$width 			= $params->get('width', '145');
$height 		= $params->get('height', '145');
$mwidth 		= $params->get('mwidth', '100%');
$mheight 		= $params->get('mheight', '15');
$direction 		= $params->get('direction', 'right');
$scrollamount 	= (int)$params->get('scrollamount', '2');
$scrolldelay 	= (int)$params->get('scrolldelay', '0');
$nwidth			= $params->get('nwidth', '600');
$nheight		= $params->get('nheight', '250');
$nquality		= $params->get('nquality', '90');
$fauto			= $params->get('fauto', 'true');
$fdoration		= $params->get('fdoration', '5000');
$inpage			= $params->get('inpage', '5');
$layout			= str_replace('_:','',$params->get('layout'));
$item2readon		= $params->get('item2readon');
$item2cat		= $params->get('item2cat');
$item2date		= $params->get('item2date');
$item2hits		= $params->get('item2hits');
$newowner		= $params->get('newowner');
$newlead		= $params->get('newlead');
$description	= $params->get('description');
$dir="cache/dima";
if(file_exists($dir)){
}else{
	mkdir($dir, 0755);
}
$maxcontent		= $params->get('maxcontent', '200');
$animation		= $params->get('animation', 'fadeIn');
$document = JFactory::getDocument();
//$document->addScript('modules/mod_joomla_item2/assets/jquery.min.js');
$document = JFactory::getDocument();
// Include the syndicate functions only once
require_once dirname(__FILE__).'/helper.php';
$lista2 = Modjoomlaitem2Helper::getLista2($params);
require JModuleHelper::getLayoutPath('mod_joomla_item2', $params->get('layout', 'default'));

