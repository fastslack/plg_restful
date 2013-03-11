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

/*
 * Change the following path to suit where you have cloned or installed the Joomla Platform repository.
 * The default setting assumes you have the joomla platform and examples folder at the same level.
 */

// Setup the base path related constant.
define('JPATH_BASE', dirname(__FILE__));
define('JPATH_SITE', dirname(__FILE__));
define('JPATH_ROOT', dirname(__FILE__));
define('JPATH_PLUGINS', dirname(__FILE__).'/plugins');
define('JPATH_LIBRARIES', dirname(dirname(dirname(__FILE__))).'/joomla-cms.my/libraries'   );
define('JPATH_CACHE', dirname(dirname(dirname(__FILE__))).'/joomla-cms.my/cache'   );

// Import the Joomla! Platform
require JPATH_LIBRARIES.'/import.legacy.php';
// Import the JCli class from the platform.
jimport('joomla.application.cli');
// Require the files
jimport('joomla.filesystem.file');
jimport('joomla.database.database');
