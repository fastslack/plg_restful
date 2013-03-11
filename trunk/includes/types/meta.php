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
 * JRestfulTypesMeta class
 *
 * @package     Joomla.Platform
 * @subpackage  Restful
 * @since       12.3
 */
class JRestfulTypesMeta
{
	/**
	 * @var    array  
	 * @since  12.3
	 */
	public $apiVersion = '';

	/**
	 * @var    array  
	 * @since  12.3
	 */
	public $contentLanguage = '';

	/**
	 * @var    array  
	 * 								
	 * @since  12.3
	 */
	public $contentType = '';

	/**
	 * @var    array  
	 * 								
	 * @since  12.3
	 */
	public $etag = '';

	/**
	 * @var    array  
	 * 								
	 * @since  12.3
	 */
	public $fields = array();

	/**
	 * @var    array  
	 * 								
	 * @since  12.3
	 */
	public $lastModified = '';

	/**
	 * @var    array  
	 * 								
	 * @since  12.3
	 */
	public $messageId = '';
}
