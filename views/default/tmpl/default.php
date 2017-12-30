<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_helloworld
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access to this file
defined('_JEXEC') or die;

//JHtml::_('formbehavior.chosen', 'select');

// Import CSS
$document = JFactory::getDocument();
$isFront = JFactory::getApplication()->isSite() ? 'administrator/' : '';
$document->addStyleSheet($isFront.'components/com_dccpanel/assets/css/dccpanel.css');


?>


<div class="dccpanel_outer">

<?php
	$modposition = 'dccpanel';
	//
	jimport('joomla.application.module.helper');
	$modules = JModuleHelper::getModules($modposition);
	$html = '';
	foreach ($modules as $module) {
		$html .= '<div class="dccpanel_module">' . "\n";
		$html .=  '<h2>' . $module->title . '</h2>';
		$html .= JModuleHelper::renderModule($module);
		$html .= '</div><br/>' . "\n";
	}
	if (!empty($html)) {

		//print_r($module);
		echo $html;
	} else {
		echo '<p><strong>There are currently no modules set to display on this page.</strong> To add modules to this page, go to the modules you want to show and set their display position to be "' . $modposition . '".</p>';
	}
?>

</div>


<hr/>
<div>
	<i>This page shows any admin modules set to display in the "<?php echo $modposition;?>" position.</i>
</div>
