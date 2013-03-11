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

defined('_JEXEC') or die;

/**
 * REST Request Dispatcher class 
 *
 * @package     Joomla.Platform
 * @subpackage  REST
 * @since       12.3
 */
class JRESTDispatcher
{
	/**
	 * Constructor.
	 *
	 * @param   JRESTMessage        $rest      JRESTMessage object
	 *
	 * @since   12.3
	 */
	public function __construct(JRESTMessage $rest = null)
	{
		$this->_rest = isset($rest) ? $rest : new JRESTMessage;
		$this->_db = JFactory::getDbo();
	}
	
	/**
	 * 
	 *
	 * @return  boolean
	 *
	 * @since   12.3
	 */
	public function execute()
	{
		// Getting the path
		$resourcepath = $this->_rest->_uri->resource_path();

		// Getting the table
		JRestfulTable::addIncludePath(JPATH_PLUGINS .'/system/restful/includes/resources');
		$table = JRestfulTable::getInstance($resourcepath, 'JRestfulTable');

		$method = strtolower($this->_rest->_method).ucfirst($resourcepath);

		// Getting the items
		$items = $table->$method($this->_rest->_uri);

		return $items;
	}
}
