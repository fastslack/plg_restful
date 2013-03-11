<?php
/**
* @version $Id:
* @package Matware.Restful
* @copyright Copyright (C) 2005 - 2013 Matware. All rights reserved.
* @author Matias Aguirre
* @email maguirre@matware.com.ar
* @link http://www.matware.com.ar/
* @license GNU General Public License version 2 or later; see LICENSE
*/

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport( 'joomla.plugin.plugin' );

/**
 * Joomla! System Restful Plugin
 *
 * @package		Joomla
 * @subpackage	System
 */
class plgSystemRestful extends JPlugin
{

	function onAfterInitialise()
	{
		jimport('joomla.user.helper');
		require_once JPATH_PLUGINS .'/system/restful/includes/rest.php';
		require_once JPATH_PLUGINS .'/system/restful/includes/uri.php';
		require_once JPATH_PLUGINS .'/system/restful/includes/authorizer.php';
		require_once JPATH_PLUGINS .'/system/restful/includes/dispatcher.php';
		require_once JPATH_PLUGINS .'/system/restful/includes/table.php';
	
		// Getting the database instance
		$db = JFactory::getDbo();

		$request = false;

		// Get the REST message from the current request.
		$rest = new JRESTMessage;
		
		if ($rest->loadFromRequest())
		{
			$request = true;
		}

		// Request was found
		if ($request == true) {
/*
			// Check the username and pass
			$auth = new JRESTAuthorizer;

			if (!$auth->authorize($db, $rest->_parameters))
			{
				JResponse::setHeader('status', 400);
				JResponse::setBody('Invalid password.');
				JResponse::sendHeaders();
				exit;
			}
*/
			// Check the username and pass
			$dispatcher = new JRESTDispatcher($rest);
			$return = $dispatcher->execute();

			if ($return !== false) {
				echo $return;
			}else{
				JResponse::setHeader('status', 401);
				JResponse::setBody('Dispatch error.');
				JResponse::sendHeaders();
				exit;		
			}

			exit; // Exit
		}
		
		//exit; // Exit test
		
	} // end method	
} // end class
