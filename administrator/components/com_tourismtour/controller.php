<?php
defined('_JEXEC') or die;
class tourismtourController extends JControllerLegacy
{
	//==========================================
	protected $default_view = 'tourismtour';
	//==========================================
	public function display($cachable = false, $urlparams = false){
		require_once JPATH_COMPONENT_ADMINISTRATOR.'/helpers/tourismtour.php';
		// Load the submenu.
		tourismtourHelper::addSubmenu(JRequest::getCmd('view', 'tourismtour'));

		parent::display();

		return $this;
	}
	//========================================== }
	static function LoadMessageConfirmRemove($msg = ''){
		$alert = sprintf(JText::_("MYPN_DELETE"),$msg);
		return $alert;
	}
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
}
?>