<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_dcadmin
 */

// No direct access to this file
defined('_JEXEC') or die;


class DcCpanelController extends JControllerLegacy
{
	// fall back on just displaying this view
	protected $default_view = 'default';


	public function display($cachable = false, $urlparams = array()) {

		// Access check: is this user allowed to access the backend of this component?
		if (!JFactory::getUser()->authorise('core.manage', 'com_dccpanel')) {
			throw new Exception(JText::_('JERROR_ALERTNOAUTHOR'));
		}

		if (!$this->setupcontroller())
			return false;
		//
		parent::display($cachable, $urlparams);
	}







	//---------------------------------------------------------------------------
	protected function setupcontroller() {
		$this->setupcontroller_addToolBar();
		if (!$this->setupcontroller_displayErrors())
			return false;
		return true;
	}


	protected function setupcontroller_displayErrors() {
		// Check for errors.
		if (count($errors = $this->get('Errors'))) {
			JError::raiseError(500, implode('<br />', $errors));
			return false;
		}
		return true;
	}
	

	protected function setupcontroller_addToolBar() {
		$title = 'DC Aux Cpnael';//JText::_('COM_DCCPANEL_MANAGER_DCCPANEL');
		JToolBarHelper::title($title, 'DcCpanel');
		JToolBarHelper::preferences('com_dccpanel');
		JToolbarHelper::help( 'COM_DCCPANEL_HELP_VIEW_TYPE1', true );
		return true;
	}


	protected function is_validform_available() {
		if (!JSession::checkToken())
			return false;
		return true;
	}
	//---------------------------------------------------------------------------










}
