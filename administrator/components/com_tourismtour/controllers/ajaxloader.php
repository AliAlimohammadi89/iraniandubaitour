<?php
// No direct access.
defined('_JEXEC') or die;
/**
* tourismtour list controller class.
*/
class tourismtourControllerAjaxLoader extends JControllerAdmin{
	static function LoadRelated(){
		$db = JFactory::getDbo();
		$table = JRequest::getVar("table");
		$id = JRequest::getInt("id");
		$fielda = JRequest::getVar("fielda");
		$fieldb = JRequest::getVar("fieldb");
		$fieldc = JRequest::getVar("fieldc");

		$query = "SELECT `$fielda` AS value, `$fieldb` AS text FROM `#__tourismtour_$table` WHERE `$fieldc` = $id ORDER BY `$fieldb`";
		$db->setQuery((string) $query);
		//echo "<P>".$db->replacePrefix( $query )."</P>";
		$O = array();
		$O[] = '<option value="">'.JText::_("SELECT_$table").'</option>';
		$rows = $db->loadObjectList();
		foreach($rows as $v)
		$O[] = '<option value="'.$v->value.'">'.$v->text.'</option>';
		echo implode("\n",$O);
	die();
	}
}
?>