<?php
/**
 * @package	Club
 * @copyright	Copyright (C) 2005 - 2007 Open Source Matters. All rights reserved.
 * @copyright   Copyright (C) 2009 Daniel Scott (http://danieljamesscott.org). All rights reserved. 
 * @license		GNU/GPL, see LICENSE.php
 * Joomla! is free software. This version may have been modified pursuant to the
 * GNU General Public License, and as distributed it includes or is derivative
 * of works licensed under the GNU General Public License or other free or open
 * source software licenses. See COPYRIGHT.php for copyright notices and
 * details.
 */

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die();

jimport( 'joomla.application.component.controller' );
/**
 * Club Member Controller
 *
 * @package		Joomla
 * @subpackage	Member
 * @since 1.5
 */

class ClubControllerMembers extends JController
{
	function __construct()
	{
		parent::__construct();

		// Register Extra tasks
		$this->registerTask( 'add', 'edit' );
	}

	function display()
  	{
	  JRequest::setVar( 'view'  , 'members');
	  parent::display();
	}

	function edit()
	{
		JRequest::setVar( 'view', 'member' );
		JRequest::setVar('hidemainmenu', 1);

		parent::display();

		// Checkin the member
		$model = $this->getModel('member');
		$model->checkout();
	}

	function save()
	{
		$post	= JRequest::get('post');
		$cid	= JRequest::getVar( 'cid', array(0), 'post', 'array' );
		$post['id'] = (int) $cid[0];

		$model = $this->getModel('member');

		if ($model->store($post)) {
			$msg = JText::_( 'Member Saved' );
		} else {
			$msg = JText::_( 'Error Saving Member' );
		}

		// Check the table in so it can be edited.... we are done with it anyway
		$model->checkin();
		$link = 'index.php?option=com_club';
		$this->setRedirect($link, $msg);
	}

	function remove()
	{
		global $mainframe;

		$cid = JRequest::getVar( 'cid', array(), 'post', 'array' );
		JArrayHelper::toInteger($cid);

		if (count( $cid ) < 1) {
			JError::raiseError(500, JText::_( 'Select an item to delete' ) );
		}

		$model = $this->getModel('member');
		if(!$model->delete($cid)) {
			echo "<script> alert('".$model->getError(true)."'); window.history.go(-1); </script>\n";
		}

		$this->setRedirect( 'index.php?option=com_club' );
	}


	function publish()
	{
		global $mainframe;

		$cid = JRequest::getVar( 'cid', array(), 'post', 'array' );
		JArrayHelper::toInteger($cid);

		if (count( $cid ) < 1) {
			JError::raiseError(500, JText::_( 'Select an item to publish' ) );
		}

		$model = $this->getModel('member');
		if(!$model->publish($cid, 1)) {
			echo "<script> alert('".$model->getError(true)."'); window.history.go(-1); </script>\n";
		}

		$this->setRedirect( 'index.php?option=com_club' );
	}


	function unpublish()
	{
		global $mainframe;

		$cid = JRequest::getVar( 'cid', array(), 'post', 'array' );
		JArrayHelper::toInteger($cid);

		if (count( $cid ) < 1) {
			JError::raiseError(500, JText::_( 'Select an item to unpublish' ) );
		}

		$model = $this->getModel('member');
		if(!$model->publish($cid, 0)) {
			echo "<script> alert('".$model->getError(true)."'); window.history.go(-1); </script>\n";
		}

		$this->setRedirect( 'index.php?option=com_club' );
	}

	function cancel()
	{
		// Checkin the member
		$model = $this->getModel('member');
		$model->checkin();

		$this->setRedirect( 'index.php?option=com_club' );
	}


	function orderup()
	{
		$model = $this->getModel('member');
		$model->move(-1);

		$this->setRedirect( 'index.php?option=com_club');
	}

	function orderdown()
	{
		$model = $this->getModel('member');
		$model->move(1);

		$this->setRedirect( 'index.php?option=com_club');
	}

	function saveorder()
	{
		$cid 	= JRequest::getVar( 'cid', array(), 'post', 'array' );
		$order 	= JRequest::getVar( 'order', array(), 'post', 'array' );
		JArrayHelper::toInteger($cid);
		JArrayHelper::toInteger($order);

		$model = $this->getModel('member');
		$model->saveorder($cid, $order);

		$msg = 'New ordering saved';
		$this->setRedirect( 'index.php?option=com_club', $msg );
	}
}
?>
