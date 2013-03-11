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
 * This media type is one of a series of media types intended for use in web services provided by the Joomla Content Management System.
 *
 * @package     Joomla.Platform
 * @subpackage  Restful
 * @since       12.3
 */
class JRestfulTypesBase implements JRestfulTypes
{
	/**
	 * @var    array  An object containing meta-information.
	 * @since  12.3
	 */
	public $_meta = array();

	/**
	 * @var    array  An object which gathers together all the link relations associated with the current resource.
	 * @since  12.3
	 */
	public $_links = array();

	/**
	 * 
	 * 
	 * @since  12.3
	 */
	public function __construct()
	{
		$this->_meta = new JRestfulTypesMeta;
		$this->_links = new JRestfulTypesLinks;
	}
}
