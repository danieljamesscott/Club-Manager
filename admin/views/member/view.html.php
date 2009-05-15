<?php
/**
* @package	Club
* @copyright	Copyright (C) 2005 - 2007 Open Source Matters. All rights reserved.
* @copyright   Copyright (C) 2009 Daniel Scott (http://danieljamesscott.org). All rights reserved. 
* @license		GNU/GPL, see LICENSE.php
* Joomla! is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
*/

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die();

jimport( 'joomla.application.component.view');

/**
 * HTML View class for the Member component
 *
 * @static
 * @package		Joomla
 * @subpackage	Member
 * @since 1.0
 */
class ClubViewMember extends JView
{
	function display($tpl = null)
	{
		global $mainframe;

		if($this->getLayout() == 'default') {
			$this->_displayForm($tpl);
			return;
		}

		//get the member
		$member =& $this->get('data');

		if ($member->url) {
			// redirects to url if matching id found
			$mainframe->redirect($member->url);
		}

		parent::display($tpl);
	}

	function _displayForm($tpl)
	{
		global $mainframe, $option;

		$db		=& JFactory::getDBO();
		$uri 	=& JFactory::getURI();
		$user 	=& JFactory::getUser();
		$model	=& $this->getModel();


		$lists = array();

		//get the member
		$member	=& $this->get('data');
		$isNew		= ($member->id < 1);

		// fail if checked out not by 'me'
		if ($model->isCheckedOut( $user->get('id') )) {
			$msg = JText::sprintf( 'DESCBEINGEDITTED', JText::_( 'The member' ), $member->title );
			$mainframe->redirect( 'index.php?option='. $option, $msg );
		}

		// Edit or Create?
		if (!$isNew)
		{
			$model->checkout( $user->get('id') );
		}
		else
		{
			// initialise new record
			$member->published = 1;
			$member->approved 	= 1;
			$member->order 	= 0;
			$member->catid 	= JRequest::getVar( 'catid', 0, 'post', 'int' );
		}

		// build the html select list for ordering
		$query = 'SELECT ordering AS value, name AS text'
			. ' FROM #__member'
			. ' WHERE catid = ' . (int) $member->catid
			. ' ORDER BY ordering';

		$lists['ordering'] 			= JHTML::_('list.specificordering',  $member, $member->id, $query, 1 );

		// build list of categories
		$lists['catid'] 			= JHTML::_('list.category',  'catid', $option, intval( $member->catid ) );
		// build the html select list
		$lists['published'] 		= JHTML::_('select.booleanlist',  'published', 'class="inputbox"', $member->published );

		// build list of users
		$lists['user_id'] 			= JHTML::_('list.users',  'user_id', $member->user_id, 1, NULL, 'name', 0 );

		$lists['picture'] 			= JHTMLList::images('picture', $member->picture, '', 'images/members' );

		//clean member data
		jimport('joomla.filter.output');
		JFilterOutput::objectHTMLSafe( $member, ENT_QUOTES, 'description' );

		$file 	= JPATH_COMPONENT.DS.'models'.DS.'member.xml';
		$params = new JParameter( $member->params, $file );

		$this->assignRef('lists',		$lists);
		$this->assignRef('member',		$member);
		$this->assignRef('params',		$params);

		parent::display($tpl);
	}
}
?>
