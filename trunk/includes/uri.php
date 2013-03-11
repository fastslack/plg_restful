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
 * JURIRestful Class
 *
 * This class serves two purposes. First it parses a URI and provides a common interface
 * for the Joomla Platform to access and manipulate a URI.  Second it obtains the URI of
 * the current executing script from the server regardless of server.
 *
 * @package     Matware.Restful
 * @subpackage  Uri
 * @since       12.3
 */
class JUriRestful extends JUri
{
	/**
	 * Get the current path
	 *
	 * @return  string	The current path
	 *
	 * @since   12.3
	 */
	public function resource_path()
	{
		// Getting the path removing the subdirectories
		$path = @str_replace($this->base(true), "", $this->path);

		// Exploding the path
		$explode = explode("/", $path);
		$key = array_search('api', $explode);

		return $explode[$key+2];
	}

	/**
	 * Get the resource id if exists
	 *
	 * @return  mixed	 The resource id (int), (false) if not exists
	 *
	 * @since   12.3
	 */
	public function resource_id()
	{
		// Getting the path removing the subdirectories
		$path = @str_replace($this->base(true), "", $this->path);

		// Getting the path removing the subdirectories
		$resourcepath = $this->resource_path();

		// Exploding the path
		$explode = explode("/", $path);
		$key = array_search($resourcepath, $explode);

		return isset($explode[$key+1]) ? $explode[$key+1] : false;
	}
}
