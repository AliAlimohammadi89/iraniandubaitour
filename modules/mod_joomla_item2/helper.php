<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_joomla_item2
 *
 * @copyright   Copyright (C) 2005 - 2013 Dima Group, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
defined('_JEXEC') or die;
$document = JFactory::getDocument();


/**
 * Helper for mod_joomla_item2
 * 
 * @package     Joomla.Site
 * @subpackage  mod_joomla_item2
 * @since       1.5
 */
class Modjoomlaitem2Helper
{
	/*
	 * @since  1.5
	 */

    public static function getLista2(&$params)
    {
        //get database
        $db = JFactory::getDbo();
        $query = $db->getQuery(true);
        //$featured = $params->get('featured','0');
        //$catid = $params->get('catid','0');
        //$catid = is_array($catid)?implode(',',$catid):(int)$catid;
        $query->select('*')
            ->from('#__tourismtour_tour')
            ->where('`published` = 1')
            ->where('`fld_star` = 1')
            ->order('id','DESC');
        $db->setQuery($query, 0, (int) $params->get('count'));
        $rows = (array) $db->loadObjectList();
        return $rows;
    }
    public static function getLista22($table,$filde,$value)
    {

        $db = JFactory::getDbo();
        $query = $db->getQuery(true);
        $query->select('*')
            ->from($table)
            ->where('`published` = 1')
            ->where("`$filde` in  ($value)")
            ->order('id','DESC');
        $db->setQuery($query);
        $rows = (array) $db->loadObjectList();
         return $rows;
    }

}
$logo='';