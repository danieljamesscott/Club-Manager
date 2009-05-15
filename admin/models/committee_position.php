<?php
/**
 * @version		$Id: committee_position.php 9147 2007-10-04 15:26:39Z nurainir $
 * @package		Joomla
 * @subpackage	Content
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
 * Committee_Position Component Committee_Position Model
 *
 * @author Johan Janssens <johan.janssens@joomla.org>
 * @package		Joomla
 * @subpackage	Committee_Position
 * @since 1.5
 */
class MembersModelCommittee_Position extends JModel
{
	/**
	 * Committee_Position id
	 *
	 * @var int
	 */
	var $_id = null;

	/**
	 * Committee_Position data
	 *
	 * @var array
	 */
	var $_data = null;

	/**
	 * Constructor
	 *
	 * @since 1.5
	 */
	function __construct()
	{
		parent::__construct();

		$array = JRequest::getVar('cid', array(0), '', 'array');
		$edit	= JRequest::getVar('edit',true);
		if($edit)
			$this->setId((int)$array[0]);
	}

	/**
	 * Method to set the committee_position identifier
	 *
	 * @access	public
	 * @param	int Committee_Position identifier
	 */
	function setId($id)
	{
		// Set committee_position id and wipe data
		$this->_id		= $id;
		$this->_data	= null;
	}

	/**
	 * Method to get a committee_position
	 *
	 * @since 1.5
	 */
	function &getData()
	{
		// Load the committee_position data
		if ($this->_loadData())
		{
			// Initialize some variables
			$user = &JFactory::getUser();

// 			// Check to see if the category is published
// 			if (!$this->_data->cat_pub) {
// 				JError::raiseError( 404, JText::_("Resource Not Found") );
// 				return;
// 			}

// 			// Check whether category access level allows access
// 			if ($this->_data->cat_access > $user->get('aid', 0)) {
// 				JError::raiseError( 403, JText::_('ALERTNOTAUTH') );
// 				return;
// 			}
		}
		else  $this->_initData();

		return $this->_data;
	}

	/**
	 * Tests if committee_position is checked out
	 *
	 * @access	public
	 * @param	int	A user id
	 * @return	boolean	True if checked out
	 * @since	1.5
	 */
	function isCheckedOut( $uid=0 )
	{
		if ($this->_loadData())
		{
			if ($uid) {
				return ($this->_data->checked_out && $this->_data->checked_out != $uid);
			} else {
				return $this->_data->checked_out;
			}
		}
	}

	/**
	 * Method to checkin/unlock the committee_position
	 *
	 * @access	public
	 * @return	boolean	True on success
	 * @since	1.5
	 */
	function checkin()
	{
		if ($this->_id)
		{
			$committee_position = & $this->getTable();
			if(! $committee_position->checkin($this->_id)) {
				$this->setError($this->_db->getErrorMsg());
				return false;
			}
		}
		return false;
	}

	/**
	 * Method to checkout/lock the committee_position
	 *
	 * @access	public
	 * @param	int	$uid	User ID of the user checking the article out
	 * @return	boolean	True on success
	 * @since	1.5
	 */
	function checkout($uid = null)
	{
		if ($this->_id)
		{
			// Make sure we have a user id to checkout the article with
			if (is_null($uid)) {
				$user	=& JFactory::getUser();
				$uid	= $user->get('id');
			}
			// Lets get to it and checkout the thing...
			$committee_position = & $this->getTable();
			if(!$committee_position->checkout($uid, $this->_id)) {
				$this->setError($this->_db->getErrorMsg());
				return false;
			}

			return true;
		}
		return false;
	}

	/**
	 * Method to store the committee_position
	 *
	 * @access	public
	 * @return	boolean	True on success
	 * @since	1.5
	 */
	function store($data)
	{
		$row =& $this->getTable();

		// Bind the form fields to the web link table
		if (!$row->bind($data)) {
			$this->setError($this->_db->getErrorMsg());
			return false;
		}

		// Create the timestamp for the date
		//		$row->date = gmdate('Y-m-d H:i:s');

		// if new item, order last in appropriate group
		if (!$row->id) {
		  //			$where = 'catid = ' . (int) $row->catid ;
			$where = '';
			$row->ordering = $row->getNextOrder( $where );
		}

		// Make sure the web link table is valid
		if (!$row->check()) {
			$this->setError($this->_db->getErrorMsg());
			return false;
		}

		// Store the web link table to the database
		if (!$row->store()) {
			$this->setError($this->_db->getErrorMsg());
			return false;
		}

		return true;
	}

	/**
	 * Method to remove a committee_position
	 *
	 * @access	public
	 * @return	boolean	True on success
	 * @since	1.5
	 */
	function delete($cid = array())
	{
		$result = false;

		if (count( $cid ))
		{
			JArrayHelper::toInteger($cid);
			$cids = implode( ',', $cid );
			$query = 'DELETE FROM #__committee_position'
				. ' WHERE id IN ( '.$cids.' )';
			$this->_db->setQuery( $query );
			if(!$this->_db->query()) {
				$this->setError($this->_db->getErrorMsg());
				return false;
			}
		}

		return true;
	}

	/**
	 * Method to (un)publish a committee_position
	 *
	 * @access	public
	 * @return	boolean	True on success
	 * @since	1.5
	 */
	function publish($cid = array(), $publish = 1)
	{
		$user 	=& JFactory::getUser();

		if (count( $cid ))
		{
			JArrayHelper::toInteger($cid);
			$cids = implode( ',', $cid );

			$query = 'UPDATE #__committee_position'
				. ' SET published = '.(int) $publish
				. ' WHERE id IN ( '.$cids.' )'
				. ' AND ( checked_out = 0 OR ( checked_out = '.(int) $user->get('id').' ) )'
			;
			$this->_db->setQuery( $query );
			if (!$this->_db->query()) {
				$this->setError($this->_db->getErrorMsg());
				return false;
			}
		}

		return true;
	}

	/**
	 * Method to move a committee_position
	 *
	 * @access	public
	 * @return	boolean	True on success
	 * @since	1.5
	 */
	function move($direction)
	{
		$row =& $this->getTable();
		if (!$row->load($this->_id)) {
			$this->setError($this->_db->getErrorMsg());
			return false;
		}

		//		if (!$row->move( $direction, ' catid = '.(int) $row->catid.' AND published >= 0 ' )) {
		if (!$row->move( $direction, ' AND published >= 0 ' )) {
			$this->setError($this->_db->getErrorMsg());
			return false;
		}

		return true;
	}

	/**
	 * Method to move a committee_position
	 *
	 * @access	public
	 * @return	boolean	True on success
	 * @since	1.5
	 */
	function saveorder($cid = array(), $order)
	{
		$row =& $this->getTable();
		$groupings = array();

		// update ordering values
		for( $i=0; $i < count($cid); $i++ )
		{
			$row->load( (int) $cid[$i] );
			// track categories
			//			$groupings[] = $row->catid;

			if ($row->ordering != $order[$i])
			{
				$row->ordering = $order[$i];
				if (!$row->store()) {
					$this->setError($this->_db->getErrorMsg());
					return false;
				}
			}
		}

		// execute updateOrder for each parent group
// 		$groupings = array_unique( $groupings );
// 		foreach ($groupings as $group){
// 			$row->reorder('catid = '.(int) $group);
// 		}

		return true;
	}

	/**
	 * Method to load content committee_position data
	 *
	 * @access	private
	 * @return	boolean	True on success
	 * @since	1.5
	 */
	function _loadData()
	{
		// Lets load the content if it doesn't already exist
		if (empty($this->_data))
		{
// 			$query = 'SELECT w.*, cc.title AS category,'.
// 					' cc.published AS cat_pub, cc.access AS cat_access'.
// 					' FROM #__committee_position AS w' .
// 					' LEFT JOIN #__categories AS cc ON cc.id = w.catid' .
// 					' WHERE w.id = '.(int) $this->_id;
			$query = 'SELECT w.*'.
					' FROM #__committee_position AS w' .
					' WHERE w.id = '.(int) $this->_id;
			$this->_db->setQuery($query);
			$this->_data = $this->_db->loadObject();
			print_r($data);
			return (boolean) $this->_data;
		}
		return true;
	}

	/**
	 * Method to initialise the committee_position data
	 *
	 * @access	private
	 * @return	boolean	True on success
	 * @since	1.5
	 */
	function _initData()
	{
		// Lets load the content if it doesn't already exist
		if (empty($this->_data))
		{
			$committee_position = new stdClass();
			$committee_position->id					= 0;
			//			$committee_position->catid				= 0;
			$committee_position->sid				= 0;
			$committee_position->position				= null;
			$committee_position->alias               = null;
			$committee_position->responsibilities				= null;
			//			$committee_position->description			= null;
			//			$committee_position->date				= null;
			//			$committee_position->hits				= 0;
			$committee_position->published			= 0;
			$committee_position->checked_out			= 0;
			$committee_position->checked_out_time	= 0;
			$committee_position->ordering			= 0;
			$committee_position->archived			= 0;
			//			$committee_position->approved			= 0;
			$committee_position->params				= null;
			//			$committee_position->category			= null;
			$this->_data					= $committee_position;
			return (boolean) $this->_data;
		}
		return true;
	}
}
?>
