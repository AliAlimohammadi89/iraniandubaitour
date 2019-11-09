<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_joomla_item3
 *
 * @copyright   Copyright (C) 2005 - 2013 Dima Group, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
defined('_JEXEC') or die;
$document = JFactory::getDocument();


require_once JPATH_SITE.'/components/com_content/helpers/route.php';
JModelLegacy::addIncludePath(JPATH_SITE.'/components/com_content/models', 'ContentModel');
require_once JPATH_SITE . '/components/com_content/controller.php';
/**
 * Helper for mod_joomla_item3
 * 
 * @package     Joomla.Site
 * @subpackage  mod_joomla_item3
 * @since       1.5
 */
class Modjoomlaitem3Helper
{
	/*
	 * @since  1.5
	 */
    public static function getList(&$params)
    {
        //get database
        $db = JFactory::getDbo();
        $query = $db->getQuery(true);
        //$featured = $params->get('featured','0');
        //$catid = $params->get('catid','0');
        //$catid = is_array($catid)?implode(',',$catid):(int)$catid;
        $query->select('*')
            ->from('#__tourismtour_tourfeature')
            ->where('`published` = 1')
            ->order('id','DESC');
        $db->setQuery($query, 0, (int) $params->get('count'));
        $rows = (array) $db->loadObjectList();
        return $rows;
    }
    public static function getList2($table,$filde,$value)
    {
        // die;
        //get database
        $db = JFactory::getDbo();
        $query = $db->getQuery(true);
        //$featured = $params->get('featured','0');
        //$catid = $params->get('catid','0');
        //$catid = is_array($catid)?implode(',',$catid):(int)$catid;
        $query->select('*')
            ->from($table)
            ->where('`published` = 1')
            ->where("`$filde` in  ($value)")
            ->order('id','DESC');
        $db->setQuery($query);
        $rows = (array) $db->loadObjectList();
        return $rows;

        //print_r($rows);
        //  die;
    }}
$logo='';