<?php
	defined('_JEXEC') or die;
	defined('DS') or define('DS',DIRECTORY_SEPARATOR);
	global $option,$view,$compconfig;
	$option = JRequest::getVar("option");
	$compconfig = JComponentHelper::getParams($option);
	$view = JRequest::getVar("view");
	$controller = JControllerLegacy::getInstance('tourismtour');
	$controller->execute(JFactory::getApplication()->input->get('task'));
	$controller->redirect();

?>