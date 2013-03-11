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
 * RestfulTable class
 *
 * Parent classes to all tables.
 *
 * @abstract
 * @package 	Matware.Restful
 * @subpackage	Table
 * @since		12.3
 */
class JRestfulTable extends JTable
{
	/**
	 * Get the row
	 *
	 * @access	public
	 * @return	int	The total of rows
	 */
	public function loadItems( $uri )
	{
		$key = $this->getKeyName();
		$table = $this->getTableName();

		// Create a new query object.
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);

		// Getting the conditions
		$conditions = $this->getConditionsHook();

		$select = isset($conditions['select']) ? $conditions['select'] : '*';

		// Building the query
		$query->select($select);
		$query->from($table);

		// Setting the join[s] into the query
		if (isset($conditions['join'])) {
			$count = count($conditions['join']);

			for ($i=0;$i<$count;$i++) {
				$query->join($conditions['join'][$i]);
			}
		}

		// Setting the where[s] into the query
		if (isset($conditions['where'])) {
			$count = count($conditions['where']);

			for ($i=0;$i<$count;$i++) {
				$query->where($conditions['where'][$i]);
			}
		}

		// Check if id is into the resource path
		$resource_id = $uri->resource_id();

		if ($resource_id != false) {
			$query->where("{$key} = {$resource_id}");
		}

		// Ordering
		$order = isset($conditions['order']) ? $conditions['order'] : "{$key} ASC";
		$query->order($order);

		// Pagination
		$perPage = (int) $uri->getVar('perPage');
		$page = (int) $uri->getVar('page');

		if (is_int($perPage) && is_int($page)) {
			$query->setLimit($perPage, $page*$perPage);
		}

		// Setting the query and getting the result
		$db->setQuery($query);
		$items = $db->loadObjectList();

		return $items;
	}

	/**
	 * Get the mysql conditions hook
	 *
	 * @return  array  The basic conditions
	 *
	 * @since   3.0.0
	 */
	public function getConditionsHook()
	{
		$conditions = array();		
		$conditions['where'] = array();
		// Do customisation of the params field here for specific data.
		return $conditions;	
	}

	/**
	 * Export item list to json
	 *
	 * @access public
	 */
	public function toJSON ()
	{
		$array = array();

		foreach (get_object_vars( $this ) as $k => $v)
		{
			if (is_array($v) or is_object($v) or $v === NULL)
			{
				continue;
			}
			if ($k[0] == '_')
			{ // internal field
				continue;
			}
			
			$array[$k] = $v;
		}
		
		$json = json_encode($array);

		return $json;
	}
}
