<?php
// No direct access.
defined('_JEXEC') or die;
/**
* tourismtour list controller class.
*/
class tourismtourControllerturningpoints extends JControllerAdmin{
	protected $text_prefix = 'turningpoint';
	/**
	* Constructor.
	*
	* @param	array An optional associative array of configuration settings.
	* @see		JController
	* @since	1.6
	*/
	public function __construct($config = array())
	{
	parent::__construct($config);
	}
	/**
	* Proxy for getModel.
	* @since	1.6
	*/
	public function getModel($name = 'turningpoint', $prefix = 'tourismtourModel', $config = array('ignore_request' => true))
	{
	$model = parent::getModel($name, $prefix, $config);
	return $model;
	}
	/**
	 * Method to save the submitted ordering values for records via AJAX.
	 *
	 * @return  void
	 *
	 * @since   3.0
	 */
	public function saveOrderAjax()
	{
		// Get the input
		$pks = $this->input->post->get('cid', array(), 'array');
		$order = $this->input->post->get('order', array(), 'array');
		// Sanitize the input
		JArrayHelper::toInteger($pks);
		JArrayHelper::toInteger($order);
		// Get the model
		$model = $this->getModel();
		// Save the ordering
		$return = $model->saveorder($pks, $order);
		if ($return)
		{
			echo "1";
		}
		// Close the application
		JFactory::getApplication()->close();
	}
}
?>