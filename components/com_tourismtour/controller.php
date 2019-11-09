<?php
/**
 * @version     1.0.0
 * @package     com_tourismtour
 * @copyright   Copyright (C) 2013. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Alireza Balvardi <a.balvardi@gmail.com> - http://dima.ir
 */
 
// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.controller');

class tourismtourController extends JControllerLegacy
{
    protected $default_view = 'tourismtour';
//==========================================
	static function Comma($myVal) {
		if(is_numeric($myVal)){
			$count = 2;
		if(str_replace(".","",$myVal)==$myVal)
			$count = 0;
		$myVal = number_format($myVal,$count,'.',',');
		}
		return $myVal;
	}
//==========================================
	static function CountView($table,$id){
		$db = JFactory::getDBO();
		$query = "UPDATE `#__tourismtour_$table` SET `fldClick` = `fldClick` +1 WHERE `id` = $id";
		$db->setQuery( $query );
		//echo "<P>".$db->replacePrefix( $query )."</P>";
		$db->Query();

		$query = "SELECT `fldClick` FROM `#__tourismtour_$table` WHERE `id` = $id";
		$db->setQuery( $query );
		//echo "<P>".$db->replacePrefix( $query )."</P>";
		$I = $db->loadResult();
		return $I;
	}
//==========================================
}