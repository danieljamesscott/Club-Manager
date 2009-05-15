<?php
/**
 * @version		$Id: category.php 8178 2007-07-23 05:39:47Z eddieajau $
 * @package		Joomla
 * @subpackage	Member
 * @copyright	Copyright (C) 2005 - 2007 Open Source Matters. All rights reserved.
 * @license		GNU/GPL, see LICENSE.php
 * Joomla! is free software. This version may have been modified pursuant to the
 * GNU General Public License, and as distributed it includes or is derivative
 * of works licensed under the GNU General Public License or other free or open
 * source software licenses. See COPYRIGHT.php for copyright notices and
 * details.
 */

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die();

jimport('joomla.application.component.model');

/**
 * @package		Joomla
 * @subpackage	Member
 */
class ClubModelCommittee extends JModel
{
	/**
	 * Builds the query to select member categories
	 * @param array
	 * @return string
	 * @access protected
	 */
// 	function _getCatgoriesQuery( &$options )
// 	{
// 		// TODO: Cache on the fingerprint of the arguments
// 		$db		=& JFactory::getDBO();
// 		// aid?
// 		$aid	= @$options['aid'];

// 		// a. = member table
// 		$wheres[] = 'a.published = 1';
// 		$wheres[] = 'cc.section = ' . $db->Quote( 'com_member' );
// 		$wheres[] = 'cc.published = 1';

// 		if ($aid !== null)
// 		{
// 			$wheres[] = 'a.access <= ' . (int) $aid;
// 			$wheres[] = 'cc.access <= ' . (int) $aid;
// 		}

// 		$groupBy	= 'cc.id';
// 		$orderBy	= 'cc.ordering' ;

// 		/*
// 		 * Query to retrieve all categories that belong under the members
// 		 * section and that are published.
// 		 */
// 		$query = 'SELECT cc.*, COUNT( a.id ) AS numlinks, a.id as cid'.
// 				' FROM #__categories AS cc'.
// 				' LEFT JOIN #__member AS a ON a.catid = cc.id'.
// 				' WHERE ' . implode( ' AND ', $wheres ) .
// 				' GROUP BY ' . $groupBy .
// 				' ORDER BY ' . $orderBy;

// 		//echo $query;
// 		return $query;
// 	}

	/**
	 * Builds the query to select member items
	 * @param array
	 * @return string
	 * @access protected
	 */
	function _getCommitteePositionsQuery( &$options ) {
	  $query = 'SELECT cd.* FROM #__committee_members AS cd';
	  return $query;
	}

	function getCommitteeMembers( $options=array() ) {
	  $query = '';
	  return $this->_getList( $query, @$options['limitstart'], @$options['limit'] );
	}

}