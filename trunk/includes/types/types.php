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
defined('JPATH_BASE') or die;

/**
 * JRestfulTypes class interface
 *
 * @package     Joomla.Platform
 * @subpackage  Restful
 * @since       12.3
 */
interface JRestfulTypes
{
	/**
	 * @var    array  An object containing meta-information.
	 * @since  12.3
	 */
	public $_meta;

	/**
	 * @var    array  An object which gathers together all the link relations associated with the current resource.
	 * @since  12.3
	 */
	public $_links;

	/**
	 * @var    array  (optional) An object whose property names are link relation types as defined by [RFC5988] and 
	 * 								whose values are either a resource object or an array of resource objects.
	 * @since  12.3
	 */
	public $_embedded;
}
