<?php
/**
 * @version		$Id: member.php 7873 2007-07-05 22:44:21Z friesengeist $
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

jimport( 'joomla.application.component.controller' );
/**
 * Member Member Controller
 *
 * @package		Joomla
 * @subpackage	Member
 * @since 1.5
 */
class MembersControllerCommittee_Positions extends JController
{
	function __construct()
	{
		parent::__construct();

		JRequest::setVar( 'view', 'committee_positions' );

		// Register Extra tasks
		$this->registerTask( 'add', 'edit' );
	}

	function edit()
	{
		JRequest::setVar( 'view', 'committee_position' );
		//		JRequest::setVar( 'layout', 'form'  );
		JRequest::setVar('hidemainmenu', 1);

		parent::display();

		// Checkin the member
		$model = $this->getModel('committee_position');
		$model->checkout();
	}

	function save()
	{
		$post	= JRequest::get('post');
		$cid	= JRequest::getVar( 'cid', array(0), 'post', 'array' );
		$post['id'] = (int) $cid[0];

		$model = $this->getModel('committee_position');

		if ($model->store($post)) {
			$msg = JText::_( 'Committee Position Saved' );
		} else {
			$msg = JText::_( 'Error Saving Committee Position' );
		}

		// Check the table in so it can be edited.... we are done with it anyway
		$model->checkin();
		$link = 'index.php?option=com_club&c=committee_positions';
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

		$model = $this->getModel('committee_position');
		if(!$model->delete($cid)) {
			echo "<script> alert('".$model->getError(true)."'); window.history.go(-1); </script>\n";
		}

		$this->setRedirect( 'index.php?option=com_club&c=committee_positions' );
	}


	function publish()
	{
		global $mainframe;

		$cid = JRequest::getVar( 'cid', array(), 'post', 'array' );
		JArrayHelper::toInteger($cid);

		if (count( $cid ) < 1) {
			JError::raiseError(500, JText::_( 'Select an item to publish' ) );
		}

		$model = $this->getModel('committee_position');
		if(!$model->publish($cid, 1)) {
			echo "<script> alert('".$model->getError(true)."'); window.history.go(-1); </script>\n";
		}

		$this->setRedirect( 'index.php?option=com_club&c=committee_positions' );
	}


	function unpublish()
	{
		global $mainframe;

		$cid = JRequest::getVar( 'cid', array(), 'post', 'array' );
		JArrayHelper::toInteger($cid);

		if (count( $cid ) < 1) {
			JError::raiseError(500, JText::_( 'Select an item to unpublish' ) );
		}

		$model = $this->getModel('committee_position');
		if(!$model->publish($cid, 0)) {
			echo "<script> alert('".$model->getError(true)."'); window.history.go(-1); </script>\n";
		}

		$this->setRedirect( 'index.php?option=com_club&c=committee_positions' );
	}

	function cancel()
	{
		// Checkin the member
		$model = $this->getModel('committee_position');
		$model->checkin();

		$this->setRedirect( 'index.php?option=com_club&c=committee_positions' );
	}


	function orderup()
	{
		$model = $this->getModel('committee_postion');
		$model->move(-1);

		$this->setRedirect( 'index.php?option=com_club&c=committee_positions');
	}

	function orderdown()
	{
		$model = $this->getModel('committee_postion');
		$model->move(1);

		$this->setRedirect( 'index.php?option=com_club&c=committee_positions');
	}

	function saveorder()
	{
		$cid 	= JRequest::getVar( 'cid', array(), 'post', 'array' );
		$order 	= JRequest::getVar( 'order', array(), 'post', 'array' );
		JArrayHelper::toInteger($cid);
		JArrayHelper::toInteger($order);

		$model = $this->getModel('committee_postion');
		$model->saveorder($cid, $order);

		$msg = 'New ordering saved';
		$this->setRedirect( 'index.php?option=com_club&c=committee_positions', $msg );
	}
}
?>
