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
// Check to ensure this file is within the rest of the framework
defined('JPATH_BASE') or die();

/**
 * JHttpResponseRestful Class
 *
 * @package     Joomla.Platform
 * @subpackage  HTTP
 * @since       11.3
 */
class JRestfulResponse extends JHttpResponse
{
	/**
	 * @var    array  The array of instantiated types adapters.
	 * @since  12.1
	 */
	protected static $types = array();

	/**
	 * Get a file compression adapter.
	 *
	 * @param   string  $type  The type of adapter (bzip2|gzip|tar|zip).
	 *
	 * @return  object  JArchiveExtractable
	 *
	 * @since   11.1
	 * @throws  UnexpectedValueException
	 */
	public static function getAdapter($type)
	{
		if (!isset(self::$types[$type]))
		{
			// Try to load the adapter object
			$class = 'JRestfulTypes' . ucfirst($type);
			if (!class_exists($class))
			{
				throw new UnexpectedValueException('Unable to load type', 500);
			}

			self::$types[$type] = new $class;
		}

		return self::$types[$type];
	}
}
