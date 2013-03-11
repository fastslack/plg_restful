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
 * This object retrieved the lists of articles.
 *
 * @package     Matware.Restful
 * @since       12.3
 */
class RestfulTableArticles extends RestfulTable
{
	/**
	* @param database A database connector object
	*/
	function __construct( &$db ) {
		parent::__construct( '#__content', 'id', $db );
	}
}
