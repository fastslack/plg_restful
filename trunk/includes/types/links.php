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
 * JRestfulTypesLinks class 
 *
 * @package     Joomla.Platform
 * @subpackage  Restful
 * @since       12.3
 */
class JRestfulTypesLinks
{
	/**
	 * @var    array  
	 * @since  12.3
	 */
	public $self;

	/**
	 * @var    array  
	 * @since  12.3
	 */
	public $curie;

	/**
	 * @var    array  
	 * 								
	 * @since  12.3
	 */
	public $base;
}

class JRestfulTypesLinksCurie
{
	/**
	 * @var    array  
	 * @since  12.3
	 */
	public $name = '';

	/**
	 * @var    array  
	 * @since  12.3
	 */
	public $href = '';

	/**
	 * @var    array  
	 * 								
	 * @since  12.3
	 */
	public $templated = false;
}
